<header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <div class="flex items-center justify-between">
        <div class="text-xl font-bold">
          <span class="text-yellow-400">Connect</span><span class="text-yellow-300">Friend</span>
        </div>
        <nav>
          <ul class="flex space-x-4">
            @if(auth()->check())
              <li><a href="#" class="hover:text-yellow-400">Home</a></li>
              <li><a href="#" class="hover:text-yellow-400">About</a></li>
              <li><a href="/logout" class="hover:text-yellow-400">Logout</a></li>
            @else
              <li><a href="/register" class="text-white">Register</a></li>
              <li><a href="/login" class="text-white">Login</a></li>
            @endif
            <!-- Add more navigation items as needed -->
          </ul>
        </nav>
      </div>
    </div>
</header>