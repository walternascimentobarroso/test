<?php

namespace App\Http\Controllers;

use App\Models\Blacklist;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{
    public function index()
    {
        // echo ('<pre>');
        // print_r(Blacklist::all()->toArray());
        // echo ('</pre>');
        $lists = Blacklist::orderBy('item')->paginate(2);

        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '#',
                'name' => 'Blacklist'
            ]
        ];
        return view('blacklist.index', compact('lists', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/blacklist',
                'name' => 'Blacklist'
            ],
            [
                'url' => '#',
                'name' => 'Add Item'
            ]
        ];
        return view('blacklist.form', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        Blacklist::create($request->all());

        return redirect()->route('blacklist.index')
            ->with('success', 'created successfully');
    }

    public function show(Blacklist $blacklist)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/blacklist',
                'name' => 'Blacklist'
            ],
            [
                'url' => '#',
                'name' => 'See Item'
            ]
        ];
        return view('blacklist.show', compact('blacklist', 'breadcrumbs'));
    }

    public function edit(Blacklist $blacklist)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/blacklist',
                'name' => 'Blacklist'
            ],
            [
                'url' => '#',
                'name' => 'Edit Item'
            ]
        ];
        return view('blacklist.edit', compact('blacklist', 'breadcrumbs'));
    }

    public function update(Blacklist $Blacklist, Request $request)
    {
        $input = (array_key_exists("active", $request->all()))
            ? $request->all()
            : array_merge($request->all(), ['active' => null]);
        $Blacklist->update($input);
        return redirect()->route('blacklist.index')
            ->with('success', 'List updated successfully');
    }


    public function destroy(Blacklist $Blacklist)
    {
        $Blacklist->delete();
        return redirect()->route('blacklist.index')
            ->with('success', 'Item removed successfully');
    }
}
