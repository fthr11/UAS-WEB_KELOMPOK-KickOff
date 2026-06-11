<?php
require_once 'data/loader.php';
$trending_news = get_trending_news();
$trending_news_sliced = array_slice($trending_news, 0, 3);
?>
<!-- Trending News Section -->
<section class="bg-white text-background py-stack-xl">
    <div class="px-margin-desktop">
        <div class="mb-16 flex items-baseline justify-between gap-8">
            <h2 class="font-display-hero text-[48px] md:text-[40px] leading-none uppercase text-background">Trending News</h2>
            <div class="hidden md:block h-[2px] flex-grow bg-gray-300"></div>
            <div class="font-label-bold text-label-sm uppercase opacity-70">SCROLL TO DISCOVER</div>
        </div>
        <div class="grid grid-cols-12 gap-gutter">
            <?php foreach ($trending_news_sliced as $news): ?>
            <!-- Trending Item -->
            <a href="news-detail.php?id=<?= $news['id'] ?>" class="col-span-12 md:col-span-4 group cursor-pointer trending-card block text-background hover:no-underline">
                <div class="aspect-video bg-surface-container-low mb-6 relative overflow-hidden shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                </div>
                <span class="opacity-70 font-label-bold text-label-sm uppercase mb-2 block"><?= htmlspecialchars($news['category']) ?></span>
                <h3 class="font-headline-md text-headline-md mb-4 group-hover:underline"><?= htmlspecialchars($news['title']) ?></h3>
                <p class="font-body-md text-body-md opacity-70 mb-6 line-clamp-3"><?= htmlspecialchars($news['isi']) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>