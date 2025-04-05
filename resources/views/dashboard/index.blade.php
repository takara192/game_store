<x-layout.app>
    <div class="w-full">
        <div class="w-1/2 h-full flex flex-col mx-auto">
            {{--Wishlist + Cart--}}
            <div class="flex justify-end gap-x-2.5 mt-3">
                @if(auth()->check())
                    <div class="px-[25px]  bg-cover bg-center text-sm"
                         style="background-image: url({{ asset('storage/assets/background_wishlist.jpg') }})">
                        Wishlist(6)
                    </div>
                    <div class="px-[25px]  bg-[#5c7e10] text-sm flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"/>
                        </svg>

                        <div>Cart(1)</div>
                    </div>
                @endif
            </div>
            {{--bar--}}
            <div
                class="w-full mt-2  flex text-[#e5e5e5] font-bold text-base justify-between items-center
                 bg-linear-to-r from-[#3E6796EA] via-[#3A78B1CC] to-[#0F216E] from-10% via-25% to-100%">
                <div class="flex space-x-2 items-center h-10 text-sm">
                    <a href="#"
                       class="h-full hover:bg-linear-to-r hover:from-[#21A2FF40] hover:via-[#21A2FF26] hover:to-[#32323300]">
                        <div class="flex h-full px-2 items-center space-x-3 ">
                            @if(auth()->check())
                                <div class="w-7 h-7">
                                    @if(auth()->user()->avatar !== null)
                                        <img src="{{ auth()->user()->avatar }}" alt="avatar">
                                    @else
                                        <img src="{{ asset('storage/assets/default_avatar.jpg') }}" alt="avatar">
                                    @endif
                                </div>
                            @endif
                            <p class="drop-shadow-lg">Your Store</p>
                        </div>
                    </a>
                    <a href="#"
                       class="px-2 h-full hover:bg-linear-to-r hover:from-[#21A2FF40] hover:via-[#21A2FF26] hover:to-[#32323300]">
                        <div class="flex h-full items-center">
                            <p class="drop-shadow-lg">Categories</p>
                        </div>
                    </a>

                </div>

                <div class="me-2">
                    <form method="GET">
                        @csrf
                        <div class="flex bg-[#316281]">
                            <input class=" p-1 ms-1 text-xs text-white hover:border-transparent focus:outline-none"
                                   placeholder="search">
                            <div class="rounded-xs m-1 w-[30px] bg-[#5799be] py-1">
                                <button class="w-full h-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--carousel--}}
            <div class="mt-5 flex flex-col items-start ">
                <div class="text-white font-normal text-base">FEATURED & RECOMMENDED</div>
                <x-hot-carousel/>
            </div>
            {{--Random--}}
            <div class="mt-5 flex flex-col items-start ">
                <div class="text-white font-normal text-base">RANDOM GAMES</div>
                <x-random-game-slider />
            </div>
            {{--CATEGORY--}}
            <div class="mt-5 flex flex-col items-start ">
                <div class="text-white font-normal text-base mb-2">BROWSE BY CATEGORY</div>
                <x-categories-slider/>
            </div>
            {{--Menu--}}
            <div class="my-5 w-full">
                <x-games-tab />
            </div>
        </div>
    </div>
</x-layout.app>
