<!-- Tabs -->
<!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
<!-- Alpine.js focus plugin is required, for more info http://pinemix.com/docs/getting-started -->
<div
    x-data="{
    active: 'newest',
    vertical: false,
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
        <!-- Home Tab -->
        <div
            x-show="active === 'home'"
            id="home-tab-pane"
            tab="tabpanel"
            aria-labelledby="home-tab"
            tabindex="0"
        >
            <h4 class="mb-2 text-lg font-bold">Welcome to your dashboard</h4>
            <p class="text-sm leading-relaxed text-zinc-700 dark:text-zinc-400">
                The Home tab serves as the primary landing page, providing an overview
                and quick access to the most essential features and information. It
                typically includes a welcome message, a summary of recent activity, and
                shortcuts to frequently used functions. Designed for convenience, the
                Home tab ensures users can easily find and navigate to all pages.
            </p>
        </div>
        <!-- END Home Tab -->

        <!-- Profile Tab -->
        <div
            x-cloak
            x-show="active === 'profile'"
            id="profile-tab-pane"
            tab="tabpanel"
            aria-labelledby="profile-tab"
            tabindex="0"
        >
            <h4 class="mb-2 text-lg font-bold">Manage your account</h4>
            <p class="text-sm leading-relaxed text-zinc-700 dark:text-zinc-400">
                The Profile tab allows users to view and manage their personal
                information and account settings. Here, users can update their contact
                details, change their password, and upload a profile picture. This tab
                ensures that users have complete control over their personal data and
                can customize their experience according to their preferences.
            </p>
        </div>
        <!-- END Profile Tab -->

        <!-- Settings Tab -->
        <div
            x-cloak
            x-show="active === 'settings'"
            id="settings-tab-pane"
            tab="tabpanel"
            aria-labelledby="settings-tab"
            tabindex="0"
        >
            <h4 class="mb-2 text-lg font-bold">Manage your application</h4>
            <p class="text-sm leading-relaxed text-zinc-700 dark:text-zinc-400">
                The Settings tab provides access to the application's configuration
                options, enabling users to customize their experience. It includes
                various controls and preferences such as notification settings, privacy
                options, and application themes. This tab empowers users to tailor the
                application to their specific needs and enhance their overall user
                experience.
            </p>
        </div>
        <!-- END Settings Tab -->
    </div>
    <!-- END Tab Content -->
</div>
<!-- END Tabs -->
