<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(ContactFormRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $emailContent = "De: $name <$email>\n\n Subject: $subject\n\n Message :$message";

        Mail::raw($emailContent, function ($message) use ($name, $email, $subject) {
            $message->from($email, $name)
                    ->to('cargoweentn1@gmail.com')
                    ->subject($subject);

        });

        return redirect('/contacter')->with('success', 'Your message has been sent successfully.');
    }
}
