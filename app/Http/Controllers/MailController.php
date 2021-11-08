<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        if ($request->has('sendemail')) {
 
        $details = [
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'msg'=>$request->msg
        ];
        $mailsend = Mail::to('forjapanprepare@gmail.com')->send(new ContactMail($details));
        if ($mailsend) {
            return back()->with('success','Email send Successfully !!');
          }
          else{
            return back()->with('success','Email send Successfully !!');
          }
    }
    }
}
