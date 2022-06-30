<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $lists = Rule::orderBy('item')->paginate(2);

        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '#',
                'name' => 'Rule'
            ]
        ];
        return view('rule.index', compact('lists', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/Rule',
                'name' => 'Rule'
            ],
            [
                'url' => '#',
                'name' => 'Add Item'
            ]
        ];
        return view('rule.form', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {

        Rule::create($request->all());

        return redirect()->route('rule.index')
            ->with('success', 'created successfully');
    }

    public function show(Rule $rule)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/rule',
                'name' => 'Rule'
            ],
            [
                'url' => '#',
                'name' => 'See Item'
            ]
        ];
        return view('rule.show', compact('rule', 'breadcrumbs'));
    }

    public function edit(Rule $rule)
    {
        $breadcrumbs = [
            [
                'url' => '/',
                'name' => 'Home'
            ],
            [
                'url' => '/rule',
                'name' => 'Rule'
            ],
            [
                'url' => '#',
                'name' => 'Edit Item'
            ]
        ];
        return view('rule.edit', compact('rule', 'breadcrumbs'));
    }

    public function update(Rule $Rule, Request $request)
    {
        $input = (array_key_exists("active", $request->all()))
            ? $request->all()
            : array_merge($request->all(), ['active' => null]);
        $Rule->update($input);
        return redirect()->route('rule.index')
            ->with('success', 'List updated successfully');
    }


    public function destroy(Rule $Rule)
    {
        $Rule->delete();
        return redirect()->route('rule.index')
            ->with('success', 'Item removed successfully');
    }
}
