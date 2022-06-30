<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $lists = Email::orderBy('item')->paginate(2);

        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '#',
                'name' => 'Email'
            ]
        ];
        return view('email.index', compact('lists', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/Email',
                'name' => 'Email'
            ],
            [
                'url' => '#',
                'name' => 'Add Item'
            ]
        ];
        return view('email.form', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {

        Email::create($request->all());

        return redirect()->route('email.index')
            ->with('success', 'created successfully');
    }

    public function show(Email $email)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/email',
                'name' => 'Email'
            ],
            [
                'url' => '#',
                'name' => 'See Item'
            ]
        ];
        return view('email.show', compact('email', 'breadcrumbs'));
    }

    public function edit(Email $email)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/email',
                'name' => 'Email'
            ],
            [
                'url' => '#',
                'name' => 'Edit Item'
            ]
        ];
        return view('email.edit', compact('email', 'breadcrumbs'));
    }

    public function update(Email $email, Request $request)
    {
        $input = (array_key_exists("active", $request->all()))
            ? $request->all()
            : array_merge($request->all(), ['active' => null]);
        $email->update($input);
        return redirect()->route('email.index')
            ->with('success', 'List updated successfully');
    }


    public function destroy(Email $Email)
    {
        $Email->delete();
        return redirect()->route('email.index')
            ->with('success', 'Item removed successfully');
    }
}
