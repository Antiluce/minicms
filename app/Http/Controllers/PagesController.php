<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pages.create')
                ->withErrors($validator)
                ->withInput();
        }

        $page = new Page();
        $page->title = $request->input('title');
        $page->content = $request->input('content');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('page_images', 'public');
            $page->image = $imagePath;
        }

        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Validate image file if needed
        ]);

        if ($validator->fails()) {
            return redirect()->route('pages.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $page = Page::findOrFail($id);
        $page->title = $request->input('title');
        $page->content = $request->input('content');

        if ($request->hasFile('image')) {
            // Delete previous image if it exists
            if (!empty($page->image)) {
                Storage::disk('public')->delete($page->image);
            }

            $image = $request->file('image');
            $imagePath = $image->store('page_images', 'public'); // Store image in 'public' disk under 'page_images' directory
            $page->image = $imagePath;
        }

        $page->save();

        return redirect()->route('pages.index')->with('success', 'Page updated successfully');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        // Delete associated image if it exists
        if (!empty($page->image)) {
            Storage::disk('public')->delete($page->image);
        }

        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully');
    }
}
