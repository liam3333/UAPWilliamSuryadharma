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

        <div class="d-flex justify-content-end align-items-center bg-secondary px-3 py-2 my-3 rounded-lg">
            <h1 class="text-md text-white mb-0 me-3">
                Your Wallet: {{ auth()->user()->wallet }}
            </h1>
            <button data-bs-target="#staticModal" data-bs-toggle="modal" class="btn btn-danger px-3 py-2">
                Top Up
            </button>
        </div>
        
        <!-- Main modal -->
        <div class="modal fade" id="staticModal" tabindex="-1" aria-hidden="true">
            <form action="/top-up" method="post">
                @csrf
                @method('put')
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal header -->
                        <div class="modal-header">
                            <h3 class="modal-title">Static modal</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="number" id="Qty" value="0" class="form-control" name="wallet">
                                <button onclick="addAmount()" class="btn btn-danger text-danger" type="button">+</button>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-primary">Top Up</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        

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

<script>
    function addAmount() {
        var amount = document.getElementById('Qty');
        amount.value = parseInt(amount.value) + 100;
    };
</script>
@endsection