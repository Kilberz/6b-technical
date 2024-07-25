
<header>
    <nav class="bg-white border-gray-200 py-4">
    <div class="max-w-screen-xl flex flex-wrap items-center mx-auto p-4">
        <a href="#" class="flex items-center font-semibold space-x-3 rtl:space-x-reverse text-3xl mr-8">
            <?php 
            if (has_custom_logo()) :
                // Display the custom logo
                the_custom_logo();
            else :
                bloginfo('name');
            endif;
            ?>
        </a>
        <button id="navbar-button" data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center ms-auto p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex space-x-0 md:space-x-8 text-gray-500',
                'fallback_cb' => false,
                'items_wrap' => '<ul class="%2$s font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row space-y-3 md:space-y-0 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">%3$s</ul>',
                'depth' => 1,
                'walker' => new Tailwind_Nav_Walker(),
            ));
            ?>
        </ul>
        </div>
    </div>
    </nav>
</header>
