<div x-data="{
    games: {{ json_encode($games) }},
    currentSlideIndex: 1,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide
            this.currentSlideIndex = this.games.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.games.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide
            this.currentSlideIndex = 1
        }
    },
}" class="relative w-full mt-3">

    <!-- previous button -->
    <button type="button"
            class="absolute left-5 top-1/2 z-20 -translate-x-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
             class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
        </svg>
    </button>

    <!-- next button -->
    <button type="button"
            class="absolute right-5 top-1/2 z-20 flex translate-x-20 rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
             class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
        </svg>
    </button>

    <!-- games -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative  min-h-[480px] w-full">
        <template x-for="(listGame, index) in games">
            <div x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <div class="w-full h-[400px] grid grid-cols-3 gap-4">

                    <div @click="window.location.href='/game/' + game['id']" x-data="{ game: listGame[0] }" class="h-[200px] w-full flex flex-col cursor-pointer">
                        <img class="w-full h-10/12 bg-cover overflow-hidden object-cover" x-bind:src="game['cover_image']"
                             alt="banner">
                        <div class="relative w-full flex-1 overflow-hidden">
                            <img class="w-full h-full overflow-hidden"
                                 src="{{ asset('storage/assets/background_wishlist.jpg') }}" alt=""/>
                            <div class="px-3 py-1 absolute top-1/2 right-2 -translate-y-1/2  bg-[rgba(20,31,44,0.8)] ">
                                <div class="text-[#b8e73e] text-sm" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></div>
                            </div>
                        </div>
                    </div>

                    <div @click="window.location.href='/game/' + game['id']" x-data="{ game: listGame[1] }" class="h-[200px] w-full flex flex-col cursor-pointer">
                        <img class="w-full h-10/12 bg-cover overflow-hidden object-cover" x-bind:src="game['cover_image']"
                             alt="banner">
                        <div class="relative w-full flex-1 overflow-hidden">
                            <img class="w-full h-full overflow-hidden"
                                 src="{{ asset('storage/assets/background_wishlist.jpg') }}" alt=""/>
                            <div class="px-3 py-1 absolute top-1/2 right-2 -translate-y-1/2  bg-[rgba(20,31,44,0.8)] ">
                                <div class="text-[#b8e73e] text-sm" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></div>
                            </div>
                        </div>
                    </div>

                    <div @click="window.location.href='/game/' + game['id']" x-data="{ game: listGame[2] }" class="h-[200px] w-full flex flex-col cursor-pointer">
                        <img class="w-full h-10/12 bg-cover overflow-hidden object-cover" x-bind:src="game['cover_image']"
                             alt="banner">
                        <div class="relative w-full flex-1 overflow-hidden">
                            <img class="w-full h-full overflow-hidden"
                                 src="{{ asset('storage/assets/background_wishlist.jpg') }}" alt=""/>
                            <div class="px-3 py-1 absolute top-1/2 right-2 -translate-y-1/2  bg-[rgba(20,31,44,0.8)] ">
                                <div class="text-[#b8e73e] text-sm" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></div>
                            </div>
                        </div>
                    </div>

                    <div @click="window.location.href='/game/' + game['id']" x-data="{ game: listGame[3] }" class="h-[200px] w-full flex flex-col cursor-pointer">
                        <img class="w-full h-10/12 bg-cover overflow-hidden object-cover" x-bind:src="game['cover_image']"
                             alt="banner">
                        <div class="relative w-full flex-1 overflow-hidden">
                            <img class="w-full h-full overflow-hidden"
                                 src="{{ asset('storage/assets/background_wishlist.jpg') }}" alt=""/>
                            <div class="px-3 py-1 absolute top-1/2 right-2 -translate-y-1/2  bg-[rgba(20,31,44,0.8)] ">
                                <div class="text-[#b8e73e] text-sm" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></div>
                            </div>
                        </div>
                    </div>

                    <div @click="window.location.href='/game/' + game['id']" x-data="{ game: listGame[4] }" class="h-[200px] w-full flex flex-col cursor-pointer">
                        <img class="w-full h-10/12 bg-cover overflow-hidden object-cover" x-bind:src="game['cover_image']"
                             alt="banner">
                        <div class="relative w-full flex-1 overflow-hidden">
                            <img class="w-full h-full overflow-hidden"
                                 src="{{ asset('storage/assets/background_wishlist.jpg') }}" alt=""/>
                            <div class="px-3 py-1 absolute top-1/2 right-2 -translate-y-1/2  bg-[rgba(20,31,44,0.8)] ">
                                <div class="text-[#b8e73e] text-sm" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></div>
                            </div>
                        </div>
                    </div>

                    <div @click="window.location.href='/game/' + game['id']" x-data="{ game: listGame[5] }" class="h-[200px] w-full flex flex-col cursor-pointer">
                        <img class="w-full h-10/12 bg-cover overflow-hidden object-cover" x-bind:src="game['cover_image']"
                             alt="banner">
                        <div class="relative w-full flex-1 overflow-hidden">
                            <img class="w-full h-full overflow-hidden"
                                 src="{{ asset('storage/assets/background_wishlist.jpg') }}" alt=""/>
                            <div class="px-3 py-1 absolute top-1/2 right-2 -translate-y-1/2  bg-[rgba(20,31,44,0.8)] ">
                                <div class="text-[#b8e73e] text-sm" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </template>
    </div>

    <!-- indicators -->
    <div
        class="absolute bottom-0 rounded-sm  md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-neutral-950/75"
        role="group" aria-label="games">
        <template x-for="(slide, index) in games">
            <button class="size-2 cursor-pointer rounded-full transition bg-neutral-600 dark:bg-neutral-300"
                    x-on:click="currentSlideIndex = index + 1"
                    x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-600 dark:bg-neutral-300' : 'bg-neutral-600/50 dark:bg-neutral-300/50']"
                    x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>
