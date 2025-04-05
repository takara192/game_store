<div x-data="{
    categories: {{ json_encode($categories) }},
    category_img: {{ json_encode($categoriesImg)}},
    currentSlideIndex: 1,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide
            this.currentSlideIndex = this.categories.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.categories.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide
            this.currentSlideIndex = 1
        }
    },
}" class="relative w-full ">

    <!-- previous button -->
    <button type="button"
            class="absolute -translate-x-15 left-0 top-[115px] z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
             class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
        </svg>
    </button>

    <!-- next button -->
    <button type="button"
            class="absolute translate-x-15 right-0 top-[115px]  z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
             class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
        </svg>
    </button>

    <!-- categories -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative min-h-[300px] w-full">
        <template x-for="(categoryList, index) in categories">
            <div x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <div class="w-full h-full flex gap-x-2">
                    <div @click="window.location.href = '/category/' + category['id']" x-data="{category: categoryList[0], image: category_img[index * 4 + 0]}" class="h-[225px] w-full flex-1 relative rounded-2xl overflow-hidden cursor-pointer">
                        <img class="w-full h-full" x-bind:src="image"
                        />
                        <div class="w-full h-full absolute top-0"
                             style="background: radial-gradient(115% 120% at 0% 0%, transparent, #2880a6);"></div>
                        <div class="absolute bottom-[50px] left-1/2 px-3 py-2 -translate-x-1/2 bg-white rounded-lg">
                            <p class="text-[#2881a7] text-center font-bold text-base" x-text="category['category_name']"></p>
                        </div>
                    </div>

                    <div @click="window.location.href = '/category/' + category['id']" x-data="{category: categoryList[1], image: category_img[index * 4 + 1]}" class="h-[225px] w-full flex-1 relative rounded-2xl overflow-hidden cursor-pointer">
                        <img class="w-full h-full" x-bind:src="image"
                        />
                        <div class="w-full h-full absolute top-0"
                             style="background: radial-gradient(115% 120% at 0% 0%, transparent, #2880a6);"></div>
                        <div class="absolute bottom-[50px] left-1/2 px-3 py-2 -translate-x-1/2 bg-white rounded-lg">
                            <p class="text-[#2881a7] text-center font-bold text-base" x-text="category['category_name']"></p>
                        </div>
                    </div>

                    <div @click="window.location.href = '/category/' + category['id']" x-data="{category: categoryList[2], image: category_img[index * 4 + 2]}" class="h-[225px] w-full flex-1 relative rounded-2xl overflow-hidden cursor-pointer">
                        <img class="w-full h-full" x-bind:src="image"
                        />
                        <div class="w-full h-full absolute top-0"
                             style="background: radial-gradient(115% 120% at 0% 0%, transparent, #2880a6);"></div>
                        <div class="absolute bottom-[50px] left-1/2 px-3 py-2 -translate-x-1/2 bg-white rounded-lg">
                            <p class="text-[#2881a7] text-center font-bold text-base" x-text="category['category_name']"></p>
                        </div>
                    </div>

                    <div @click="window.location.href = '/category/' + category['id']" x-data="{category: categoryList[3], image: category_img[index * 4 + 3]}" class="h-[225px] w-full flex-1 relative rounded-2xl overflow-hidden cursor-pointer">
                        <img class="w-full h-full" x-bind:src="image"
                        />
                        <div class="w-full h-full absolute top-0"
                             style="background: radial-gradient(115% 120% at 0% 0%, transparent, #2880a6);"></div>
                        <div class="absolute bottom-[50px] left-1/2 px-3 py-2 -translate-x-1/2 bg-white rounded-lg">
                            <p class="text-[#2881a7] text-center font-bold text-base" x-text="category['category_name']"></p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- indicators -->
    <div
        class="absolute rounded-sm bottom-0 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-neutral-950/75"
        role="group" aria-label="categories">
        <template x-for="(slide, index) in categories">
            <button class="size-2 rounded-full transition bg-neutral-600 dark:bg-neutral-300"
                    x-on:click="currentSlideIndex = index + 1"
                    x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-600 dark:bg-neutral-300' : 'bg-neutral-600/50 dark:bg-neutral-300/50']"
                    x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>
