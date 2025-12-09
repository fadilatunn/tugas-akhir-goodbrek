<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|integer|min:0',
            'image'=>'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus','public');
        }

        Menu::create($data);
        return redirect()->route('home')->with('success','Menu dibuat.');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'price'=>'required|integer|min:0',
            'image'=>'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($menu->image && \Storage::disk('public')->exists($menu->image)) {
                \Storage::disk('public')->delete($menu->image);
            }
            $data['image'] = $request->file('image')->store('menus','public');
        }

        $menu->update($data);
        return redirect()->route('home')->with('success','Menu diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->image && \Storage::disk('public')->exists($menu->image)) {
            \Storage::disk('public')->delete($menu->image);
        }
        $menu->delete();
        return redirect()->route('home')->with('success','Menu dihapus.');
    }
}