@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8 border border-yellow-200">

        <h2 class="text-3xl font-bold text-center text-yellow-600 mb-6">
            Login ke GoodBrek
        </h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center bg-red-100 p-2 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Email</label>
                <input type="email" name="email" required
                    class="w-full p-3 border border-yellow-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div>
                <label class="block font-semibold mb-1 text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="w-full p-3 border border-yellow-300 rounded-lg focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <button type="submit"
                class="w-full py-3 bg-yellow-400 hover:bg-yellow-500 text-black font-bold rounded-lg shadow-md transition">
                Login
            </button>
        </form>

        <p class="text-center text-sm mt-5 text-gray-600">
            Belum punya akun? <span class="font-bold text-yellow-600">Hubungi admin</span>.
        </p>
    </div>
</div>
@endsection