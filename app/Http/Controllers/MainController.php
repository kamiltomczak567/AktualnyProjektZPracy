<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Project;
use Mail;

class MainController extends Controller
{
	public function getIndex() {
		$ofirmie1 = Setting::where('name', 'ofirmie1')->first()->value;
		$ofirmie2 = explode("\n", Setting::where('name', 'ofirmie2')->first()->value);
		$ofirmie3 = Setting::where('name', 'ofirmie3')->first()->value;

		$oferta1 = explode("\n", Setting::where('name', 'oferta1')->first()->value);

		$kontakt1 = Setting::where('name', 'kontakt1')->first()->value;
		$kontakt2 = Setting::where('name', 'kontakt2')->first()->value;
		$kontakt3 = Setting::where('name', 'kontakt3')->first()->value;

		$dojazd1 = Setting::where('name', 'dojazd1')->first()->value;
		$dojazd2 = Setting::where('name', 'dojazd2')->first()->value;

		$projects = Project::all();

		$data = [
			'ofirmie1' => $ofirmie1,
			'ofirmie2' => $ofirmie2,
			'ofirmie3' => $ofirmie3,
			'oferta1' => $oferta1,
			'kontakt1' => $kontakt1,
			'kontakt2' => $kontakt2,
			'kontakt3' => $kontakt3,
			'dojazd1' => $dojazd1,
			'dojazd2' => $dojazd2,
			'projects' => $projects,
		];
		return view('master')->with($data);
	}

	public function postSendEmail(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required|max:255',
			'email' => 'required|email',
			'phone' => 'required',
			'subject' => 'required',
			'message' => 'required',
		]);

		$data = [
			'imie' => $request->name,
			'email' => $request->email,
			'numer' => $request->phone,
			'temat' => $request->subject,
			'wiadomosc' => $request->message
		];

		$to = Setting::where('name', 'email')->first()->value;

		Mail::send('mail', $data, function($message) use($to) {
			$message->from('noreply@e-u4u.pl', 'Formularz kontaktowy');
			$message->to($to);
			$message->subject('Formularz kontaktowy');
		});

		return redirect('/#contact')->with('message','Wiadomość została wysłana.');
	}
}
