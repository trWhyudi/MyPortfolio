<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('triwahyudi5321@gmail.com')->send(new ContactFormMail($validated));
            
            return redirect()->route('website.contact')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            \Log::error('Mail error: ' . $e->getMessage());
            
            return back()->withInput()->withErrors(['email' => 'Failed to send message: ' . $e->getMessage()]);
        }
    }
}