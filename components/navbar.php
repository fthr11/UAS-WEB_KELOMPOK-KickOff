<!-- TopNavBar -->
<nav
    class="fixed top-0 w-full z-50 rounded-none bg-transparent border-b border-outline-variant dark:border-outline-variant flex justify-between items-center px-margin-desktop py-6 max-w-full transition-all duration-300">
    <div class="flex items-center gap-12">
        <span onclick="window.location.href='index.php'"
            class="text-body-lg font-bold tracking-tighter text-primary dark:text-on-surface uppercase cursor-pointer">SPORTNEWS</span>
    </div>

    <div class="hidden md:flex items-center gap-8">
        <a class="nav-link-underline font-label-bold text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="index.php">Home</a>
        <a class="nav-link-underline font-label-bold text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="trending.php">Trending</a>
        <a class="nav-link-underline font-label-bold text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="indexcategory.php">Categories</a>
        <a class="nav-link-underline font-label-bold text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="live-scores.php">Live Score</a>
    </div>
    <div class="flex items-center gap-6">
        <button id="search-trigger" class="focus:outline-none group" aria-label="Search">
            <span
                class="material-symbols-outlined text-primary cursor-pointer hover:scale-110 transition-transform">search</span>
        </button>
    </div>
</nav>

<!-- Search Overlay Modal -->
<div id="search-modal" class="fixed inset-0 z-[100] bg-background/95 backdrop-blur-xl flex flex-col justify-start px-margin-desktop py-12 transition-all duration-300 opacity-0 pointer-events-none">
    <!-- Close Button & Header -->
    <div class="flex justify-end mb-8">
        <button id="search-close" class="text-primary hover:text-error transition-colors focus:outline-none flex items-center gap-2 font-label-bold text-label-sm uppercase tracking-wider">
            Close
            <span class="material-symbols-outlined text-2xl">close</span>
        </button>
    </div>

    <!-- Search Box -->
    <div class="max-w-4xl mx-auto w-full">
        <div class="relative flex items-center border-b-2 border-outline-variant focus-within:border-primary transition-colors py-4">
            <span class="material-symbols-outlined text-primary text-4xl mr-4 select-none">search</span>
            <input id="search-input" type="text" placeholder="SEARCH ALL FOOTBALL NEWS..." class="w-full bg-transparent text-2xl md:text-4xl font-extrabold uppercase tracking-tight text-white placeholder-on-surface-variant/30 focus:outline-none focus:ring-0 p-0 border-none">
        </div>
        
        <!-- Search Results Info -->
        <div id="search-results-info" class="mt-6 font-label-bold text-label-sm uppercase text-on-surface-variant tracking-wider hidden">
            Found <span id="search-results-count" class="text-primary">0</span> articles
        </div>

        <!-- Search Results List -->
        <div id="search-results-container" class="mt-8 max-h-[60vh] overflow-y-auto space-y-6 pr-4 no-scrollbar">
            <!-- Results will be loaded here dynamically -->
        </div>
        
        <!-- Empty state template -->
        <div id="search-empty-state" class="mt-12 text-center py-12 hidden">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant/40 mb-4">search_off</span>
            <p class="font-headline-md text-headline-md text-on-surface-variant mb-2">No news matches your search</p>
            <p class="font-body-md text-on-surface-variant/60">Try searching for other terms like 'Man City', 'Yamal', or 'Leverkusen'.</p>
        </div>
    </div>
</div>