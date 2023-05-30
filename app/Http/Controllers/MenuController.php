<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $pages = Page::all();

        return view('menus.create', compact('pages'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'page_id' => 'required|exists:pages,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('menus.create')
                ->withErrors($validator)
                ->withInput();
        }

        $menu = new Menu();
        $menu->title = $request->input('title');
        $menu->page_id = $request->input('page_id');
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu created successfully');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $pages = Page::all();

        return view('menus.edit', compact('menu', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'page_id' => [
                'required',
                Rule::exists('pages', 'id'),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('menus.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $menu = Menu::findOrFail($id);
        $menu->title = $request->input('title');
        $menu->page_id = $request->input('page_id');
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully');
    }
}
