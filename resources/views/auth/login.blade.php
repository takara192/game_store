<!doctype html>
<html lang="en">
<x-layout.head/>
<body class="flex flex-col w-full h-screen overflow-hidden text-white font-motiva">
<x-partials.header/>
<div class="flex justify-center grow w-full relative">
{{--    background--}}
    <div class="w-full h-full z-0">
        <div class="absolute inset-0 bg-cover bg-center filter z-0"
             style="background-image: url('{{ asset('storage/assets/login_bg.jpg') }}');">
        </div>
        <div class="absolute inset-0 bg-[#171a21]/70"></div>
        <div class="absolute inset-0 bg-[radial-gradient(rgba(24,26,33,0)_0%,rgb(24,26,33)_100%)]"></div>
    </div>
{{-- content --}}
    <div class="absolute z-10 flex flex-col space-y-6 items-start top-[100px]">
        <p class="text-white text-[28px] font-extrabold">Sign in</p>
        <div class=" w-[700px] bg-[#171a21] rounded-md py-8 px-8">
            <form class="flex flex-col  text-black" method="POST" action="{{ route('auth.store') }}">
                @csrf
                <label class="text-[#1999ff] text-sm font-medium " for="gmail">
                    SIGN IN WITH GMAIL
                </label>
                <input id="email" class="bg-[#e7f0ff] rounded-xs p-2 mt-1" type="text" name="email"/>

                <label class="text-[#afafaf] text-sm font-semibold mt-5" for="password">
                    PASSWORD
                </label>
                <input id="password" class="bg-[#e7f0ff] rounded-xs p-2 mt-1" type="password" name="password"/>

                <div class="flex items-center mt-3">
                    <input type="checkbox" id="remember_me" class="scale-130 checkbox-default">
                    <label for="remember_me" class="text-[#6d6c79] ml-2">Remember me</label>
                </div>

                <div class="mt-4 flex justify-center items-center">
                    <button class="py-3 px-30 bg-gradient-to-r from-[#06BFFF] to-[#2D73FF] rounded-xs  text-white font-medium cursor-pointer text-base">
                        Sign in
                    </button>
                </div>
                @if(session('error'))
                    <div class="my-4 text-sm text-red-400 font-medium text-sm ">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="flex flex-col items-center text-white mt-5">
                    <p class="text-xl font-extrabold">
                        New to Game Store?
                    </p>
                    <a href="{{ route('register') }}" class="rounded-xs bg-gradient-to-r from-[#06BFFF] to-[#2D73FF] px-4 py-1 mt-3 cursor-pointer">
                        Create an account
                    </a>
                </div>
            </form>
        </div>
    </div>


</div>
</body>
</html>



