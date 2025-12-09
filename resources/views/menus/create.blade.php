
@extends('layouts.app')

@section('title','Tambah Menu')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6 mt-16">
    <h1 class="text-2xl font-bold mb-4">Tambah Menu</h1>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block text-sm font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 border rounded bg-white" required>
            @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea name="description" class="w-full p-2 border rounded bg-white">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Harga (angka)</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full p-2 border rounded bg-white" required>
            @error('price') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Gambar (opsional)</label>
            <input type="file" name="image" accept="image/*" class="w-full">
            @error('image') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
            <a href="{{ route('home') }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection