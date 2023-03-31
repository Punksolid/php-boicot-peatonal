<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Services\BoicotPeatonalNameGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;
use Str;

class MagicLinkController extends Controller
{
    public function sendEmail(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            $user = $this->findSubscriberAndCreateUserIfExists($request->input('email'));
        }
        if (!$user) { // jajajaj en mi vida había hecho una cochinada como esto.
            return redirect()->back()->withErrors('No se ha encontrado ningún usuario con ese correo electrónico');
        }

        $urlToAutoLogin =  MagicLink::create(new LoginAction($user))->url;
        $mailable = new \App\Mail\MagicLink($urlToAutoLogin);
        Mail::to($user)->send($mailable);
        Session::flash('success', 'Se ha enviado un enlace de acceso a tu correo electrónico');
        return redirect()->back();
    }

    private function findSubscriberAndCreateUserIfExists(mixed $input)
    {
        $subscriber = Subscription::where('email', $input)->first();
        if (!$subscriber) {
            return null;
        }

        $user = new User();
        $user->name = (new BoicotPeatonalNameGenerator())->generate();
        $user->email = $subscriber->email;
        $user->password = bcrypt(Str::random(10));
        $user->save();

        return $user;
    }
}
