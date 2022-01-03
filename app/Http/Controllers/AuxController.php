<?php

namespace App\Http\Controllers;

use App\Events\ContactUsEvent;
use Illuminate\Http\Request;

class AuxController extends Controller
{
    public function contactUs(Request $request): \Illuminate\Http\RedirectResponse
    {
//        dd($request);

        $data = request()->validate([
            'name' => 'required|string|min:2|max:60',
            'email' => 'required|email|max:60',
            'subject' => 'required|string|min:2|max:256',
            'message' => 'required'
        ]);

        event(new ContactUsEvent($data));

        return redirect()->back()->with('contacted', true);
    }
}
