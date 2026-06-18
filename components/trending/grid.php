<?php
require_once 'data/loader.php';
$trending_news = get_trending_news();
?>
<section class="reveal py-stack-xl bg-white text-background active">
    <div class="px-margin-desktop">
        <div class="mb-16 flex items-baseline justify-between gap-8 border-b border-gray-300 pb-8">
            <h1 class="font-display-hero text-[48px] md:text-[80px] leading-none uppercase text-background">Trending</h1>
            <div class="hidden md:block h-[2px] flex-grow bg-gray-300"></div>
            <div class="font-label-bold text-label-sm uppercase opacity-70">HOTTEST NEWS TODAY</div>
        </div>

        <div class="grid grid-cols-12 gap-gutter">
            <?php foreach ($trending_news as $news): ?>
            <!-- Trending Item -->
            <?php include 'components/card.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
