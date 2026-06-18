<?php
require_once 'data/loader.php';

$europe_news = get_news_by_category('europe');
$world_cup_news = get_news_by_category('world cup');
$asian_news = get_news_by_category('asian');

function get_first_article($list, $default_title = "No news available")
{
    if (empty($list)) {
        return [
            'id' => 0,
            'title' => $default_title,
            'category' => '',
            'isi' => 'Check back later for more updates.',
            'img' => 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2?auto=format&fit=crop&w=800&q=80'
        ];
    }
    return $list[0];
}

$eu = get_first_article($europe_news, "European Football Update");
$wc = get_first_article($world_cup_news, "World Cup Qualifiers");
$as = get_first_article($asian_news, "Asian Football Coverage");
?>

<!-- Categories Section -->
<section class="reveal py-stack-xl bg-background border-t border-outline-variant active" id="categories">
    <div class="px-margin-desktop">
        <!-- Section Header -->
        <div class="mb-16 flex items-baseline justify-between gap-8 border-b border-outline-variant pb-8">
            <h2 class="font-display-hero text-[48px] md:text-[40px] leading-none uppercase text-primary">Leagues &
                Categories</h2>
            <div class="hidden md:block h-[1px] flex-grow bg-outline-variant"></div>
            <div class="font-label-bold text-label-sm uppercase opacity-70">EXPLORE WORLD FOOTBALL</div>
        </div>

        <div class="grid grid-cols-12 gap-gutter">
            <!-- Card 1: Europe (Featured - Large Layout) -->
            <a href="news-detail.php?id=<?= $eu['id'] ?>"
                class="col-span-12 lg:col-span-12 flex flex-col md:flex-row bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer overflow-hidden">
                <div class="flex-1 p-8 flex flex-col justify-between">
                    <div>
                        <span
                            class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">EUROPE</span>
                        <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight">
                            <?= htmlspecialchars($eu['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3">
                            <?= htmlspecialchars($eu['isi']) ?></p>
                    </div>
                    <div class="flex items-center gap-2 font-label-bold text-label-sm uppercase text-primary">
                        READ MORE <span
                            class="material-symbols-outlined text-sm transform group-hover:translate-x-1 transition-transform">arrow_outward</span>
                    </div>
                </div>
                <div class="w-full md:w-1/2 aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="<?= htmlspecialchars($eu['img']) ?>" alt="Europe News">
                </div>
            </a>

            <!-- Card 2: World Cup -->
            <a href="news-detail.php?id=<?= $wc['id'] ?>"
                class="col-span-12 md:col-span-6 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="<?= htmlspecialchars($wc['img']) ?>" alt="World Cup News">
                </div>
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <span
                            class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">WORLD
                            CUP</span>
                        <h3 class="font-headline-md text-[24px] leading-snug mb-4 text-primary">
                            <?= htmlspecialchars($wc['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant line-clamp-2"><?= htmlspecialchars($wc['isi']) ?>
                        </p>
                    </div>
                </div>
            </a>

            <!-- Card 3: Asian -->
            <a href="news-detail.php?id=<?= $as['id'] ?>"
                class="col-span-12 md:col-span-6 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="<?= htmlspecialchars($as['img']) ?>" alt="Asian News">
                </div>
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <span
                            class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">ASIAN</span>
                        <h3 class="font-headline-md text-[24px] leading-snug mb-4 text-primary">
                            <?= htmlspecialchars($as['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant line-clamp-2"><?= htmlspecialchars($as['isi']) ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>