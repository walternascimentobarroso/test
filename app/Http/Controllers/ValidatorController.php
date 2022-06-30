<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class ValidatorController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '#',
                'name' => 'Validator'
            ]
        ];

        return view('validator.index', compact('breadcrumbs'));
    }

    public function check(Request $request)
    {
        $email = $request->input('email');

        $msg = "Success";
        $valid = true;

        // 1º validation - email is empty
        if (!isset($email)) {
            $msg = "Please, fill the input";
            $valid = false;
        }

        // 2º validation - email already exist
        $exist = Email::where('email', $email)->first();
        if (isset($exist)) {
            $msg = "email already exist";
            $valid = false;
        }

        Email::create([
            'email' => $email,
            'description' => $msg,
            'valid' => $valid
        ]);

        return redirect()->route('validator.index')
            ->with('info', $msg);
    }
}
