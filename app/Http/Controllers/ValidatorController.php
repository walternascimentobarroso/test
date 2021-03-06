<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\Email;
use App\Models\Blacklist;

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

        // 3º validation - domain is blacklist
        $domain = explode('@', $email);
        $existBlacklist = Blacklist::where('domain', $domain[1])->first();
        if (isset($existBlacklist)) {
            $msg = "domain is blacklist";
            $valid = false;
        }

        // 4º validation - regex validation
        $rules = Rule::whereNotNull('active')->get();
        $allRules = [];
        foreach ($rules as  $key => $rule) {
            $allRules[$key]['rule'] = $rule->rule;
            $allRules[$key]['description'] = $rule->description;
        }

        foreach ($allRules as $rule) {
            if (preg_match($rule['rule'], $email)) {
                $msg = $rule['description'];
                $valid = false;
            }
        }

        Email::create([
            'email' => $email,
            'description' => $msg,
            'valid' => $valid
        ]);

        return redirect()->route('validator.index')->with('info', $msg);
    }
}
