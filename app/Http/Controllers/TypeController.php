<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $lists = Type::orderBy('item')->paginate(2);

        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '#',
                'name' => 'Type'
            ]
        ];
        return view('type.index', compact('lists', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/Type',
                'name' => 'Type'
            ],
            [
                'url' => '#',
                'name' => 'Add Item'
            ]
        ];
        return view('type.form', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {

        Type::create($request->all());

        return redirect()->route('type.index')
            ->with('success', 'created successfully');
    }

    public function show(Type $type)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/type',
                'name' => 'Type'
            ],
            [
                'url' => '#',
                'name' => 'See Item'
            ]
        ];
        return view('type.show', compact('type', 'breadcrumbs'));
    }

    public function edit(Type $type)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/type',
                'name' => 'Type'
            ],
            [
                'url' => '#',
                'name' => 'Edit Item'
            ]
        ];
        return view('type.edit', compact('type', 'breadcrumbs'));
    }

    public function update(Type $Type, Request $request)
    {
        $input = (array_key_exists("active", $request->all()))
            ? $request->all()
            : array_merge($request->all(), ['active' => null]);
        $Type->update($input);
        return redirect()->route('type.index')
            ->with('success', 'List updated successfully');
    }


    public function destroy(Type $Type)
    {
        $Type->delete();
        return redirect()->route('type.index')
            ->with('success', 'Item removed successfully');
    }
}
