@extends('layout.master')

@section('content')
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <body class="bg-gray-100">
            <div class="container mx-auto py-8">
                <!-- Add the search form -->
                <form action="/filter" method="post" class="mb-4">
                    @csrf
                    <div class="flex">
                        <div class="mr-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                Filter by Gender:
                            </label>
                            <select id="gender" name="gender"
                                class="block appearance-none w-full border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="ALL">All</option>
                                <option value="L">Male</option>
                                <option value="P">Female</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="search">
                                Search by Hobby/Job:
                            </label>
                            <input type="text" id="search" name="search"
                                class="block appearance-none w-full border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="Enter hobby or job">
                        </div>
                        <div>
                            <button
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-4"
                                type="submit">
                                Search/Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </body>
        <h1 class="text-3xl font-bold mb-4">Hello, {{ $auth->name }}</h1>

        <div class="grid grid-cols-2 gap-4">
            @foreach($users as $user)
            <div class="bg-white rounded-lg shadow-md p-4">
                <a href="/detail">
                    <img src="{{ asset('storage/'.$user->photo)}}" alt="{{ $user->name }}" class="w-full h-40 object-cover mb-4">
                </a>
                <p class="font-semibold">{{ $user->name }}</p>
                <p class="">Gender: {{ $user->gender }}</p>
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