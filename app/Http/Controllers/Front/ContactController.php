<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Func;
use Setting;
use Mail;
class ContactController extends Controller
{
    public function index(){
        $page=Func::getPageBySlug('contact-us');
        if($page)
            \App\Models\Visit::log(\App\Models\Post::class,$page->id);
        return view('contact-us');
    }
    
//    public function send(Request $request){
//        // Check if User Coming From A Request
//            // Assign Variables
//            $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
//            $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//            $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
//            $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
//            
//            // Creating Array of Errors
//            $formErrors = array();
//            if (strlen($user) <= 3) {
//                $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> Characters';
//            }
//            if (strlen($msg) < 10) {
//                $formErrors[] = 'Message Can\'t Be Less Than <strong>10</strong> Characters'; 
//            }
//
//            // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]
//
//            $headers = 'From: ' . $mail . '\r\n';
//            $myEmail = Setting::getIfExists('linkedin');//'sfece@gmail.com';
//            $subject = 'Contact Form';
//
//            if (empty($formErrors)) {
//                alert ('OK');
////                mail($myEmail, $subject, $msg, $headers);
////
////                $user = '';
////                $mail = '';
////                $cell = '';
////                $msg = '';
////
////                $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
//
//            }
//        
//        return view('contactus.blade.php');
//    }
    
    public function send(Request $request)
       {

//          dd( $this->validate($request, [
//            'first_name' => 'required',
//            'last_name' => 'required',
//            'email' => 'required|email',
//            'cellphone' => 'required',
//            'message' => 'required'
//            ]));
            $first_name = $request->get('first_name');
            $last_name = $request->get('last_name');
            $subject = $request->get('subject');

            $email = $request->get('email');
            $cellphone = $request->get('cellphone');
            $message  = $request->get('message');
           // Creating Array of Errors
            $formErrors = array();
            if (strlen($first_name) <= 3) {
                $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> Characters';
            }
            if (strlen($message) < 10) {
                $formErrors[] = 'Message Can\'t Be Less Than <strong>10</strong> Characters'; 
            }

            // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]

            $headers = 'From: ' . $email . '\r\n';
            $myEmail = Setting::getIfExists('emails_noreplay');//'sfece@gmail.com';
            //$subject = 'Contact Form';

            if (count($formErrors)==0) {
               // dd ($user,$mail,$cell,$msg);

                    Mail::send('email.contactus', compact('first_name' ,'last_name','subject','email','message','cellphone'), function ($m) use ($first_name,$last_name,$email,$myEmail,$subject) {
                        //$m->from($mail, $user);
                        $m->to($myEmail, 'omegaegy.net')->subject($subject);
                    });
               // mail($myEmail, $subject, $msg, $headers);

//                $user = '';
//                $mail = '';
//                $cell = '';
//                $msg = '';

                $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
                return view('contact-us',compact('success'));

            }
           // return "asdasdasdas";
           //return back()->with('success', 'Thanks for contacting us!');
            return view('contact-us',compact('first_name' ,'last_name','subject','email','message','cellphone','formErrors'));
       }
}
