<!-- TopNavBar -->
<nav
    class="fixed top-0 w-full z-50 rounded-none bg-transparent border-b border-outline-variant dark:border-outline-variant flex justify-between items-center px-margin-desktop py-6 max-w-full transition-all duration-300">
    <div class="flex items-center gap-12">
        <span
            class="text-body-lg font-bold tracking-tighter text-primary dark:text-on-surface uppercase cursor-pointer">KICKOFF</span>
    </div>

    <div class="hidden md:flex items-center gap-8">
        <a class="nav-link-underline font-medium text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="index.php">Home</a>
        <a class="nav-link-underline font-medium text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="trending.php">Trending</a>
        <div class="relative group py-2">
            <a class="nav-link-underline font-medium text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
                href="indexcategory.php">Categories</a>
            <div
                class="absolute top-full left-1/2 -translate-x-1/2 w-48 bg-background border border-outline-variant shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 flex flex-col z-50">
                <a href="indexcategory.php"
                    class="px-6 py-3 font-medium text-label-sm uppercase text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors">All
                    Categories</a>
                <a href="indexcategory.php?category=world%20cup"
                    class="px-6 py-3 font-medium text-label-sm uppercase text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors border-t border-outline-variant">World
                    Cup</a>
                <a href="indexcategory.php?category=europe"
                    class="px-6 py-3 font-medium text-label-sm uppercase text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors border-t border-outline-variant">Europe</a>
                <a href="indexcategory.php?category=asian"
                    class="px-6 py-3 font-medium text-label-sm uppercase text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors border-t border-outline-variant">Asian</a>
            </div>
        </div>
        <a class="nav-link-underline font-medium text-label-bold uppercase text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-colors duration-300"
            href="live-scores.php">Live Score</a>
    </div>
    <div class="flex items-center gap-6">
        <span
            class="material-symbols-outlined text-primary cursor-pointer hover:scale-110 transition-transform">search</span>
    </div>
</nav>