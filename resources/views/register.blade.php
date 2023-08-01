@extends('layout.master')

@section('content')
<section class="bg-gray-100 flex items-center justify-center">
  <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
    <h2 class="text-2xl font-bold mb-6">Register</h2>
    <form action="/register" method="post" enctype="multipart/form-data">
      @csrf
          <div class="mb-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
              <input type="text" id="name" name="name" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
          </div>

          <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
              <div class="my-4">
                  <input type="radio" name="gender" id="L" value="L" required>
                  <label for="L">Male</label>
                  <input type="radio" name="gender" id="P" value="P" required>
                  <label for="P">Female</label>
              </div>
          </div>
          
          <div class="mb-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Hobbies</label>
              <input type="text" id="hobbies" name="hobbies" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
            </div>

          <div class="mb-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Instagram Username</label>
              <input type="text" placeholder="http://www.instagram.com/username" id="instagram" name="instagram" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
          </div>

          <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
          </div>

          <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" id="password" name="password" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" required>
          </div>

          <div class="mb-4">
            <label for="profile_photo" class="block text-gray-700 text-sm font-bold mb-2">Upload Hobbies</label>
            <input type="file" id="photo" name="photo" class="border border-gray-400 rounded w-full py-2 px-3 focus:outline-none focus:border-blue-500" accept="image/*" required>
          </div>

          <div class="mb-4">
            <h1>Price: {{ $price }}</h1>
            <input type="hidden" value="{{ $price }}" name="wallet">
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nominal">
                Enter Nominal (IDR):
            </label>
            <div class="relative rounded-md shadow-sm">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    IDR
                </span>
                <input type="number" id="nominal" name="nominal"
                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Enter the amount">
            </div>
        </div>

        <div class="flex items-center justify-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </div>
        <a href="/login" class="text-blue-500 hover:text-blue-600 text-sm">Log In</a>
          
      </div>
      </form>

      
      
  </div>
</section>
@endsection