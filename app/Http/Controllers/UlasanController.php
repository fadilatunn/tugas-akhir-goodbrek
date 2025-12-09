<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pesan' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Ulasan::create($request->all());

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }
}