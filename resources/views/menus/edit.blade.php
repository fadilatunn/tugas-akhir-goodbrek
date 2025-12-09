
@extends('layouts.app')

@section('title','Edit Menu')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-6 mt-16">
    <h1 class="text-2xl font-bold mb-4">Edit Menu</h1>

    <form action="{{ route('menus.update', $menu) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Judul</label>
            <input type="text" name="title" value="{{ old('title', $menu->title) }}" class="w-full p-2 border rounded bg-white" required>
            @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea name="description" class="w-full p-2 border rounded bg-white">{{ old('description', $menu->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Harga (angka)</label>
            <input type="number" name="price" value="{{ old('price', $menu->price) }}" class="w-full p-2 border rounded bg-white" required>
            @error('price') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Gambar (opsional — unggah untuk ganti)</label>
            <input type="file" name="image" accept="image/*" class="w-full p-2 border rounded">
            @if($menu->image)
                <img src="{{ asset('storage/'.$menu->image) }}" class="mt-2 w-32 h-20 object-cover rounded">
            @endif
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Perbarui</button>
            <a href="{{ route('home') }}" class="px-4 py-2 bg-gray-300 text-gray-900 rounded hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection