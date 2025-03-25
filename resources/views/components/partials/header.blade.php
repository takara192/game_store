<header class="bg-[#161d25] text-slate-200">
    <div class="py-5 container flex justify-center items-center">
        <div class="flex items-center space-x-1">
            <img class="w-14" src="{{ asset('images/logo.png') }}" alt="Game Store Logo" >
            <p class="text-xl font-extrabold text-[#c5c2bc]">Game Store</p>
        </div>
        <nav class="mx-20">
            <ul  class="flex items-center space-x-8 font-medium text-md">
                <li><a href="#" class="hover:text-gray-400">STORE</a></li>
                <li><a href="#" class="hover:text-gray-400">COMMUNITY</a></li>
                <li><a href="#" class="hover:text-gray-400">CHAT</a></li>
                <li><a href="#" class="hover:text-gray-400">SUPPORT</a></li>
            </ul>
        </nav>
        <div class="flex items-center text-sm text-slate-400">
            @if(auth()->check())
                <div>
                    {{ auth()->user()-> name }}
                </div>
            @else
                <a class="hover:text-white text-blue-100" href="{{ route('login') }} " >Login</a>
            @endif
        </div>
    </div>
</header>
