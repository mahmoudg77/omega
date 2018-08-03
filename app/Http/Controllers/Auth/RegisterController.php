<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Torann\GeoIP\Facades\GeoIP;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Mail;
use Socialite;
use Auth;

use App\Mail\EmailVerification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo= route('cp.dashboard');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $location=geoip()->getLocation(\Request::ip());
         return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'country'=>$location['country'],
            'city'=>$location['city'],
            'phone'=>$data['phone'],
            'email_token' => base64_encode($data['email'])
        ]);
    }


    /**
    * Handle a registration request for the application.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //dispatch(new SendVerificationEmail($user));

        $email = new EmailVerification($user);

        Mail::to($user->email)->send($email);
        return view('auth.verification');

    }

    /**
    * Handle a registration request for the application.
    *
    * @param $token
    * @return \Illuminate\Http\Response
    */
    public function verify($token)
    {
      $user = User::where('email_token',$token)->first();

      $user->verified = 1;

      if($user->save()){

          return view('auth.emailconfirm',['user'=>$user]);

      }

    }
    public function redirectToProvider($next='/'){
           // session()->set('req',$requset);
           return Socialite::driver('facebook')->redirect();
    }
     public function handleProviderCallback(){
         $user=Socialite::driver('facebook')->user();
         $data=['name'=>$user->name,'email'=>$user->email,'password'=>$user->token,'phone'=>(isset($user->phone)?$user->phone:'')];
         $userDB=User::where('email',$user->email)->first();

         if(!is_null($userDB)){
             Auth::login($userDB);
         }else{
           $location=geoip()->getLocation(\Request::ip());
           $data['country']=$location['country'];
           $data['city']=$location['city'];
           Auth::login($this->create($data));
         }


              return redirect($this->redirectTo);


     }
     public function redirectToProviderTwitter($next='/'){
            // session()->set('req',$requset);
            return Socialite::driver('twitter')->redirect();
     }
      public function handleProviderCallbackTwitter(){
          $user=Socialite::driver('twitter')->user();
          $data=['name'=>$user->name,'email'=>$user->email,'password'=>$user->token,'phone'=>(isset($user->phone)?$user->phone:'')];
          $userDB=User::where('email',$user->email)->first();

          if(!is_null($userDB)){
              Auth::login($userDB);
          }else{
            $location=geoip()->getLocation(\Request::ip());
            $data['country']=$location['country'];
            $data['city']=$location['city'];
            Auth::login($this->create($data));
          }

          /*if(session()->has('req')){
              $request=session()->get('req');
              session()->forget('req');
              return redirect($request);
          }else{*/
               return redirect($this->redirectTo);
          // }

      }

}
