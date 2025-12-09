
@extends('layouts.app')

@section('title','Daftar Menu')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6 mt-16">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Menu</h1>
        <a href="{{ route('menus.create') }}" class="px-4 py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500">+ Tambah Menu</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    @if($menus->isEmpty())
        <div class="text-center py-10 text-gray-500">
            <p class="mb-4">Belum ada menu.</p>
            <a href="{{ route('menus.create') }}" class="text-yellow-500 hover:underline font-medium">Buat menu baru</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($menus as $menu)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    <!-- Gambar -->
                    <img src="{{ $menu->image ? asset('storage/'.$menu->image) : 'https://via.placeholder.com/400x300?text=No+Image' }}" 
                         class="w-full h-48 object-cover">
                    
                    <!-- Info -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $menu->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $menu->description ?? '-' }}</p>
                        <div class="mt-3 text-xl font-bold text-yellow-600">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-4 pb-4 flex gap-2">
                        <a href="{{ route('menus.edit', $menu->id) }}" 
                           class="flex-1 px-3 py-2 text-center text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" 
                              style="flex: 1;" onsubmit="return confirm('Hapus menu ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-3 py-2 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection