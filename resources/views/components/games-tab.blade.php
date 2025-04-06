<!-- Tabs -->
<!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
<!-- Alpine.js focus plugin is required, for more info http://pinemix.com/docs/getting-started -->
<div
    x-data="{
    active: 'newest',
    vertical: false,
    newestGame: {{ json_encode($newestGames) }},
    topSellerGame: {{ json_encode($topSellerGame) }},
    freeGame: {{ json_encode($freeGame) }},
  }"
    class="flex flex-col"
    x-bind:class="{
    'sm:flex-row': vertical
  }"
>
    <!-- Nav Tabs -->
    <div
        x-on:keydown.right.prevent.stop="$focus.wrap().next()"
        x-on:keydown.left.prevent.stop="$focus.wrap().previous()"
        x-on:keydown.home.prevent.stop="$focus.first()"
        x-on:keydown.end.prevent.stop="$focus.last()"
        x-bind:class="{
      'sm:w-36 sm:flex-none sm:flex-col sm:items-stretch': vertical
    }"
        class="flex items-center text-sm dark:border-zinc-700"
    >
        <button
            x-on:click="active = 'newest'"
            x-on:focus="active = 'newest'"
            type="button"
            id="newest-tab"
            role="tab"
            aria-controls="newest-tab-pane"
            x-bind:aria-selected="active === 'newest' ? 'true' : 'false'"
            x-bind:tabindex="active === 'newest' ? '0' : '-1'"
            x-bind:class="{
        'text-zinc-950 dark:text-zinc-50 border-zinc-200/75 dark:border-zinc-700/75 bg-white dark:bg-[#29475f]': active === 'newest',
        'text- border-transparent hover:text-zinc-950 dark:text-[#5687a8] dark:hover:text-zinc-50': active !== 'newest',
        'sm:border-e-0 sm:border-y sm:border-s sm:rounded-s-lg sm:rounded-e-none sm:-me-px': vertical,
      }"
            class="z-10 -mb-px flex items-center gap-2 rounded-t-lg border-x border-t px-5 py-3 font-medium"
        >
            Newest
        </button>
        <button
            x-on:click="active = 'top_seller'"
            x-on:focus="active = 'top_seller'"
            type="button"
            id="top_seller-tab"
            role="tab"
            aria-controls="top_seller-tab-pane"
            x-bind:aria-selected="active === 'top_seller' ? 'true' : 'false'"
            x-bind:tabindex="active === 'top_seller' ? '0' : '-1'"
            x-bind:class="{
        'text-zinc-950 dark:text-zinc-50 border-zinc-200/75 dark:border-zinc-700/75 bg-white dark:bg-[#29475f]': active === 'top_seller',
        'text-zinc-500 border-transparent hover:text-zinc-950 dark:text-[#5687a8] dark:hover:text-zinc-50': active !== 'top_seller',
        'sm:border-e-0 sm:border-y sm:border-s sm:rounded-s-lg sm:rounded-e-none sm:-me-px': vertical,
      }"
            class="z-10 -mb-px flex items-center gap-2 rounded-t-lg border-x border-t px-5 py-3 font-medium"
        >
            Top Sellers
        </button>
        <button
            x-on:click="active = 'free'"
            x-on:focus="active = 'free'"
            type="button"
            id="free-tab"
            role="tab"
            aria-controls="free-tab-pane"
            x-bind:aria-selected="active === 'free' ? 'true' : 'false'"
            x-bind:tabindex="active === 'free' ? '0' : '-1'"
            x-bind:class="{
        'text-zinc-950 dark:text-zinc-50 border-zinc-200/75 dark:border-zinc-700/75 bg-white dark:bg-[#29475f]': active === 'free',
        'text-zinc-500 border-transparent hover:text-zinc-950 dark:text-[#5687a8] dark:hover:text-zinc-50': active !== 'free',
        'sm:border-e-0 sm:border-y sm:border-s sm:rounded-s-lg sm:rounded-e-none sm:-me-px': vertical,
      }"
            class="z-10 -mb-px flex items-center gap-2 rounded-t-lg border-x border-t px-5 py-3 font-medium"
        >
            Free Games
        </button>
    </div>
    <!-- END Nav Tabs -->

    <!-- Tab Content -->
    <div
        class="rounded-b-lg rounded-tr-lg border border-zinc-200/75 bg-white p-5 dark:border-zinc-700/75 dark:bg-[#29475f] rtl:rounded-tl-lg rtl:rounded-tr-none"
    >
        <!-- Newest Tab -->
        <div
            x-show="active === 'newest'"
            id="newest-tab-pane"
            tab="tabpanel"
            aria-labelledby="newest-tab"
            tabindex="0"
        >
            <template x-for="game in newestGame">
                <div @click="window.location.href = '/game/' + game['id'] "
                     class="h-[75px] w-full flex justify-start items-center mb-2 bg-[#202d39] cursor-pointer">
                    <div class="h-full w-[185px] overflow-hidden">
                        <img class="w-full h-full object-cover" x-bind:src="game['cover_image']">
                    </div>
                    <div class="h-full flex flex-1 flex-col ms-3 justify-between py-2 text-ellipsis">
                        <p x-text="game['title']" class="text-[#c7d5e0] text-base"></p>
                        <p x-text="game['category']" class="text-[#5e6d7c] text-sm"></p>
                    </div>

                    <div class="h-full flex flex-col me-3 justify-between items-end py-2 text-ellipsis">
                        <p x-text="to_money(game['price'])" class="text-[#BEEE11] text-base"></p>
                        <p x-text="format_date(game['created_at'])" class="text-[#4c6c8c] text-xs"></p>
                    </div>
                </div>
            </template>
            <div class="w-full flex justify-end items-center pt-2">
                <p class="text-[#b7c3cf] text-sm">
                    See more:
                </p>
                <a href="#">
                    <div class="ms-1 py-1 px-2 border border-white text-sm">
                        Newest
                    </div>
                </a>
            </div>
        </div>
        <!-- END Newest Tab -->

        <!-- Best Seller Tab -->
        <div
            x-cloak
            x-show="active === 'top_seller'"
            id="top_seller-tab-pane"
            tab="tabpanel"
            aria-labelledby="top_seller-tab"
            tabindex="0"
        >
            <template x-for="game in topSellerGame">
                <div @click="window.location.href = '/game/' + game['id'] "
                     class="h-[75px] w-full flex justify-start items-center mb-2 bg-[#202d39] cursor-pointer">
                    <div class="h-full w-[185px] overflow-hidden">
                        <img class="w-full h-full object-cover" x-bind:src="game['cover_image']">
                    </div>
                    <div class="h-full flex flex-1 flex-col ms-3 justify-between py-2 text-ellipsis">
                        <p x-text="game['title']" class="text-[#c7d5e0] text-base"></p>
                        <p x-text="game['category']" class="text-[#5e6d7c] text-sm"></p>
                    </div>

                    <div class="h-full flex flex-col me-3 justify-between items-end py-2 text-ellipsis">
                        <p x-text="to_money(game['price'])" class="text-[#BEEE11] text-base"></p>
                        <p x-text="format_date(game['created_at'])" class="text-[#4c6c8c] text-xs"></p>
                    </div>
                </div>
            </template>
            <div class="w-full flex justify-end items-center  pt-2">
                <p class="text-[#b7c3cf] text-sm">
                    See more:
                </p>
                <a href="#">
                    <div class="ms-1 py-1 px-2 border border-white text-sm">
                        Top Seller
                    </div>
                </a>
            </div>
        </div>
        <!-- END Best seller Tab -->

        <!-- Free Tab -->
        <div
            x-cloak
            x-show="active === 'free'"
            id="free-tab-pane"
            tab="tabpanel"
            aria-labelledby="free-tab"
            tabindex="0"
        >
            <template x-for="game in freeGame">
                <div @click="window.location.href = '/game/' + game['id'] "
                     class="h-[75px] w-full flex justify-start items-center mb-2 bg-[#202d39] cursor-pointer">
                    <div class="h-full w-[185px] overflow-hidden">
                        <img class="w-full h-full object-cover" x-bind:src="game['cover_image']">
                    </div>
                    <div class="h-full flex flex-1 flex-col ms-3 justify-between py-2 text-ellipsis">
                        <p x-text="game['title']" class="text-[#c7d5e0] text-base"></p>
                        <p x-text="game['category']" class="text-[#5e6d7c] text-sm"></p>
                    </div>

                    <div class="h-full flex flex-col me-3 justify-between items-end py-2 text-ellipsis">
                        <p x-text="to_money(game['price'])" class="text-[#BEEE11] text-base"></p>
                        <p x-text="format_date(game['created_at'])" class="text-[#4c6c8c] text-xs"></p>
                    </div>
                </div>
            </template>
            <div class="w-full flex justify-end items-center pt-2">
                <p class="text-[#b7c3cf] text-sm">
                    See more:
                </p>
                <a href="#">
                    <div class="ms-1 py-1 px-2 border border-white text-sm">
                        Free
                    </div>
                </a>
            </div>
        </div>
        <!-- END Free Tab -->
    </div>
    <!-- END Tab Content -->
</div>
<!-- END Tabs -->
