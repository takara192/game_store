<div x-data="{
    games: {{ json_encode($games) }},

    currentgameIndex: 1,
    previous() {
        if (this.currentgameIndex > 1) {
            this.currentgameIndex = this.currentgameIndex - 1
        } else {
            // If it's the first game, go to the last game
            this.currentgameIndex = this.games.length
        }
    },
    next() {
        if (this.currentgameIndex < this.games.length) {
            this.currentgameIndex = this.currentgameIndex + 1
        } else {
            // If it's the last game, go to the first game
            this.currentgameIndex = 1
        }
    },
}" class="relative w-full h-[400px] mt-4">
    <!-- previous button -->
    <button type="button"
            class="absolute left-2 top-[150px] z-20 flex rounded-full -translate-y-1/2 -translate-x-15  items-center justify-center bg-white/40 cursor-pointer p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="previous game" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
             class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
        </svg>
    </button>

    <!-- next button -->
    <button type="button"
            class="absolute right-2 top-[150px] z-20 flex rounded-full -translate-y-1/2 translate-x-15 items-center justify-center bg-white/40 p-2  cursor-pointer text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="next game" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
             class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
        </svg>
    </button>

    <!-- games -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative min-h-[350px] w-full">
        <template x-for="(game, index) in games" :key="game.id">
            <div x-show="currentgameIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <div @click="window.location.href = '/game/' + game['id']" class="w-full h-[350px] flex cursor-pointer"
                     x-data="{
                         hoverState: 0,
                        setHoverState(index) {
                            this.hoverState = index;
                        },
                        resetHoverState() {
                            this.hoverState = 0;
                        },
                        getCoverImage() {
                            if (this.hoverState > 0) {
                                return JSON.parse(game['description_images'])[this.hoverState - 1];
                            }
                            return game['cover_image'];
                        }
                    }">
                    {{--    {{ var_dump($game) }}--}}
                    <div class="flex-2 h-full overflow-hidden">
                        <img class="w-full h-full" x-bind:src="getCoverImage()"
                             alt="">
                    </div>
                    <div class="flex-1 flex flex-col bg-[#0e1821] items-start justify-center px-2 py-2">
                        <p class="pb-2 text-2xl " x-text="game['title']">T</p>
                        <div class="grid w-full grid-cols-2 gap-2 pb-2">
                            <img class="w-full h-[80px] object-cover overflow-hidden cursor-pointer"
                                 x-bind:src="JSON.parse(game['description_images'])[0]"
                                 @mouseenter="setHoverState(1)"
                                 @mouseleave="resetHoverState()">
                            <img class="w-full h-[80px] object-cover overflow-hidden cursor-pointer"
                                 x-bind:src="JSON.parse(game['description_images'])[1]"
                                 @mouseenter="setHoverState(2)"
                                 @mouseleave="resetHoverState()">
                            <img class="w-full h-[80px] object-cover overflow-hidden cursor-pointer"
                                 x-bind:src="JSON.parse(game['description_images'])[2]"
                                 @mouseenter="setHoverState(3)"
                                 @mouseleave="resetHoverState()">
                            <img class="w-full h-[80px] object-cover overflow-hidden cursor-pointer"
                                 x-bind:src="JSON.parse(game['description_images'])[3]"
                                 @mouseenter="setHoverState(4)"
                                 @mouseleave="resetHoverState()">
                        </div>
                        <p class="pb-2 text-xl ">Now Available</p>
                        <div class="relative flex-1 w-full">
                            <p class="text-base font-light absolute top-1/2 -translate-y-1/2 px-2 py-1 bg-[#384147]" x-text="game['price'] > 0 ? new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(game['price']) : 'Free to play'"></p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- indicators -->
    <div
        class="absolute rounded-sm bottom-0 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-neutral-950/75"
        role="group" aria-label="games">
        <template x-for="(game, index) in games">
            <button class="size-2 cursor-pointer rounded-full transition bg-neutral-600 dark:bg-neutral-300"
                    x-on:click="currentgameIndex = index + 1"
                    x-bind:class="[currentgameIndex === index + 1 ? 'bg-neutral-600 dark:bg-neutral-300' : 'bg-neutral-600/50 dark:bg-neutral-300/50']"
                    x-bind:aria-label="'game ' + (index + 1)"></button>
        </template>
    </div>
</div>




