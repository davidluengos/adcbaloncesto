<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        $title = 'Contacto';
        return view('front.contacto', compact('title'));
    }

    public function send(Request $request)
    {
        // Honeypot
        if ($request->filled('website')) {
            return redirect()->back();
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'telefono' => 'nullable|string|max:20',
            'asunto' => 'required|string|max:255',
        ]);

        Mail::to('pedidos@adcbaloncesto.es')->send(new ContactoMail($data));

        return back()->with('success', '¡Mensaje enviado con éxito!');
    }
}
