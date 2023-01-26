<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerifySubscriber;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscribtionsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->input('email');
        $subscription = new Subscription();
        $subscription->email = $email;
        $subscription->save();

        $mailer = app()->make('mailer');
        $email_verify_subscriber = new EmailVerifySubscriber($subscription);
        $email_verify_subscriber->to($email);
        $email_verify_subscriber->send($mailer);

        return redirect()->route('subscription.show')->with('message', 'Gracias, se ha enviado un email para verificar su suscripción.');
    }

    public function show(Request $request)
    {

        $message = $request->session()->get('message');
        return view('subscription.thank_you')->with('message', $message);
    }

    public function verify(Request $request)
    {
        if ($request->has('token')) {
            $token = $request->get('token');
            $subscription = Subscription::find($token);
            if ($subscription) {
                $subscription->verified_at = now();
                $subscription->save();
            }
        }

        return redirect()->route('subscription.show')->with('message', 'Gracias, su suscripción ha sido verificada.');
    }
}
