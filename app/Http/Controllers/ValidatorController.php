<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $msg = "";

        // 1º validation - email is empty
        if (!isset($email)) {
            $msg = "Please, fill the input";
        }


        return redirect()->route('validator.index')
            ->with('info', $msg);
    }
}
