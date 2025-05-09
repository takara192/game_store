<!doctype html>
<html lang="en">
<x-layout.head/>
<body class="w-full h-screen flex flex-col overflow-hidden font-motiva">
<x-partials.header/>
<div class="w-full flex grow relative">
    <div class="w-1/4 ">
        <img class="w-full h-full " src="{{ asset('storage/assets/register_bg.jpg') }}" alt="banner">
    </div>
    <div
        class="absolute h-full w-1/4 from-0% to-80% start-0 bg-[linear-gradient(to_right,_rgba(33,_36,_41,_0.3),_rgba(33,_36,_41,_1))]">

    </div>
    <div class="flex-1 h-full bg-[#212429] px-3 ">
        <form method="POST" class="h-full" action="{{ route('register.store') }}">
            @csrf
            <div class="h-full w-[500px] flex flex-col ms-15 justify-center text-white space-y-5">
                <div class="font-extralight text-4xl">
                    CREATE YOUR ACCOUNT
                </div>
                <div class="mt-2 mr-50">
                    <x-label-input class="mt-3" :id="'name'" name="name" label="Username" input-class="rounded-sm"
                                   value="{{ old('name') }}"
                                   label-color="#b8b6b4"/>
                    @error('name')
                    <x-error-text message="{{ $message }}"/>
                    @enderror
                    <x-label-input class="mt-3" :id="'email'" input-type="email" name="email" label="Email"
                                   value="{{ old('email') }}"
                                   input-class="rounded-sm"/>
                    @error('email')
                    <x-error-text message="{{ $message }}"/>
                    @enderror
                    <x-label-input class="mt-3" :id="'password'" input-type="password" name="password" label="Password"
                                   value="{{ old('password') }}"
                                   input-class="rounded-sm"/>
                    @error('password')
                    <x-error-text message="{{ $message }}"/>
                    @enderror
                    <x-label-input class="mt-3" :id="'password_confirmation'" input-type="password"
                                   name="password_confirmation" value="{{ old('password_confirmation') }}"
                                   label="Confirm Password" input-class="rounded-sm"/>
                    @error('password_confirmation')
                    <x-error-text message="{{ $message }}"/>
                    @enderror
                </div>
                <div>
                    <input type="checkbox" name="term" id="term"/>
                    <span> I am 13 years of age or older and agree to the terms of the Game Store Subscriber Agreement.</span>
                    @error('term')
                    <x-error-text message="{{ $message }}"/>
                    @enderror
                </div>
                <div class="mt-3">
                    <button
                        class="rounded-xs bg-gradient-to-r from-[#06BFFF] to-[#2D73FF] px-10 py-2 mt-3 cursor-pointer text-[#c3e1f8]">
                        Continue
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
