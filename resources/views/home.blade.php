@extends('layout.master')

@section('content')
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Hello, {{ $auth->name }}</h1>

        <div class="grid grid-cols-2 gap-4">
            @foreach($users as $user)
            <div class="bg-white rounded-lg shadow-md p-4">
                <a href="/detail">
                    <img src="{{ asset('storage/'.$user->photo)}}" alt="{{ $user->name }}" class="w-full h-40 object-cover mb-4">
                </a>
                <p class="font-semibold">{{ $user->name }}</p>
                <p>Hobbies: {{ $user->hobbies }}</p>
                <form action="/thumb" method="post">
                    @csrf
                    <input type="hidden" name="randomID" value="{{$user->id}}">
                    <input type="hidden" name="randomGender" value="{{$user->gender}}">
                    <button class="mt-5 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 shadow-lg">
                        Thumb Up
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection