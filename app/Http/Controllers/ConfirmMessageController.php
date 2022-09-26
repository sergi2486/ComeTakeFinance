<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMessage;

class ConfirmMessageController extends Controller
{
    // Le formulaire du message
	public function formMessageGoogle () {
		return view("forms.message-google");
	}

    // Envoi du mail aux utilisateurs
	public function sendMessageGoogle (Request $request) {

		#1. Validation de la requête
		$this->validate($request, [ 'message' => 'bail|required' ]);

		#2. Récupération des utilisateurs
		$users = User::all();

		#3. Envoi du mail
		Mail::to($users)->bcc("sergino.mambou@gmail.com")
						->queue(new ConfirmMessage($request->all()));

		return back()->withText("Un message de confirmation à votre compte vous est envoyé");
	}
}
