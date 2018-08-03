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
        return view('contactus');
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
           $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'cellphone' => 'required',
            'message' => 'required'
            ]);
            
            $user = $request->get('username');
            $mail = $request->get('email'); 
            $cell = $request->get('cellphone');
            $msg  = $request->get('message'); 
           // Creating Array of Errors
            $formErrors = array();
            if (strlen($user) <= 3) {
                $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> Characters';
            }
            if (strlen($msg) < 10) {
                $formErrors[] = 'Message Can\'t Be Less Than <strong>10</strong> Characters'; 
            }

            // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]

            $headers = 'From: ' . $mail . '\r\n';
            $myEmail = Setting::getIfExists('emails_noreplay');//'sfece@gmail.com';
            $subject = 'Contact Form';

            if (empty($formErrors)) {
               // dd ($user,$mail,$cell,$msg);

                    Mail::send('email.contactus', compact('user' ,'mail','msg','cell'), function ($m) use ($user,$mail,$myEmail,$subject) {
                        //$m->from($mail, $user);
                        $m->to($myEmail, 'SFECE.ORG')->subject($subject);
                    });
               // mail($myEmail, $subject, $msg, $headers);

//                $user = '';
//                $mail = '';
//                $cell = '';
//                $msg = '';

                $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';

            }

           //return back()->with('success', 'Thanks for contacting us!');
            return view('contactus',compact('success'));
       }
}
