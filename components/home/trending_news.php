<?php
require_once 'data/loader.php';
$trending_news = get_trending_news();
?>
<!-- Trending News Section -->
<section class="bg-white text-background py-stack-xl overflow-hidden">
    <div class="px-margin-desktop">
        <div class="mb-16 flex items-center justify-between gap-8">
            <h2 class="font-display-hero text-[48px] md:text-[40px] leading-none uppercase text-background">Trending
                News</h2>
            <div class="hidden md:block h-[2px] flex-grow bg-gray-300"></div>
            <div class="flex items-center gap-4">
                <button onclick="document.getElementById('trending-scroll').scrollBy({left: -432, behavior: 'smooth'})"
                    class="w-12 h-12 rounded-full border border-gray-300 flex items-center justify-center hover:bg-background hover:text-white transition-colors"
                    aria-label="Scroll Left">
                    <span class="material-symbols-outlined">arrow_back</span>
                </button>
                <button onclick="document.getElementById('trending-scroll').scrollBy({left: 432, behavior: 'smooth'})"
                    class="w-12 h-12 rounded-full bg-background text-white flex items-center justify-center hover:bg-gray-800 transition-colors"
                    aria-label="Scroll Right">
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
        <div id="trending-scroll" class="flex overflow-x-auto gap-8 pb-8 snap-x scroll-smooth cursor-grab select-none"
            style="scrollbar-width: none; -ms-overflow-style: none;">
            <style>
                #trending-scroll::-webkit-scrollbar {
                    display: none;
                }

                #trending-scroll:active {
                    cursor: grabbing;
                }

                #trending-scroll a,
                #trending-scroll img {
                    user-drag: none;
                    -webkit-user-drag: none;
                }
            </style>
            <?php foreach ($trending_news as $news): ?>
                <div class="w-[85vw] md:w-[400px] flex-shrink-0 snap-start">
                    <?php include 'components/card.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const slider = document.getElementById('trending-scroll');
        let isDown = false;
        let startX;
        let scrollLeft;
        let isDragging = false;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            isDragging = false;
            slider.style.scrollBehavior = 'auto'; // Disable smooth scroll while dragging
            slider.classList.remove('snap-x');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.style.scrollBehavior = 'smooth';
            slider.classList.add('snap-x');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.style.scrollBehavior = 'smooth';
            slider.classList.add('snap-x');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2; // Scroll-fast multiplier
            if (Math.abs(walk) > 5) isDragging = true;
            slider.scrollLeft = scrollLeft - walk;
        });

        // Prevent clicking links if dragging occurred
        const links = slider.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                if (isDragging) {
                    e.preventDefault();
                }
            });
        });
    });
</script>