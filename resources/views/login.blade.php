@extends('layout.master')

@section('content')
<section class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded shadow-md max-w-sm w-full">
        @if(session()->has('loginError'))
            <h3 class="text-red-500 text-xl">{{session()->get('loginError')}}</h3>
        @endif
        <h2 class="text-2xl font-bold mb-6">Login</h2>
        <form action="/login" method="post">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
                <a href="/register" class="text-blue-500 hover:text-blue-600 text-sm">Register Account</a>
            </div>
        </form>
    </div>

</section>
@endsection