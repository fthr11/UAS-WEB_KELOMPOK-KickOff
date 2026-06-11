<?php
require_once 'data/loader.php';

$premier_league_news = get_news_by_category('premier league');
$laliga_news = get_news_by_category('laliga');
$bundesliga_news = get_news_by_category('bundesliga');
$serie_a_news = get_news_by_category('serie a');
$ligue_1_news = get_news_by_category('ligue 1');
$world_cup_news = get_news_by_category('world cup');
$ucl_news = get_news_by_category('uefa champions league');

function get_first_article($list, $default_title = "No news available") {
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

$pl = get_first_article($premier_league_news, "Premier League Update");
$la = get_first_article($laliga_news, "La Liga Action");
$bl = get_first_article($bundesliga_news, "Bundesliga Coverage");
$sa = get_first_article($serie_a_news, "Serie A Results");
$l1 = get_first_article($ligue_1_news, "Ligue 1 News");
$wc = get_first_article($world_cup_news, "World Cup Qualifiers");
$ucl = get_first_article($ucl_news, "UEFA Champions League Draw");
?>

<!-- Categories Section -->
<section class="reveal py-stack-xl bg-background border-t border-outline-variant active" id="categories">
    <div class="px-margin-desktop">
        <!-- Section Header -->
        <div class="mb-16 flex items-baseline justify-between gap-8 border-b border-outline-variant pb-8">
            <h2 class="font-display-hero text-[48px] md:text-[40px] leading-none uppercase text-primary">Leagues & Categories</h2>
            <div class="hidden md:block h-[1px] flex-grow bg-outline-variant"></div>
            <div class="font-label-bold text-label-sm uppercase opacity-70">EXPLORE WORLD FOOTBALL</div>
        </div>

        <div class="grid grid-cols-12 gap-gutter">
            <!-- Card 1: Premier League (Featured - Large Layout) -->
            <a href="news-detail.php?id=<?= $pl['id'] ?>" class="col-span-12 lg:col-span-8 flex flex-col md:flex-row bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer overflow-hidden">
                <div class="flex-1 p-8 flex flex-col justify-between">
                    <div>
                        <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">PREMIER LEAGUE • ENGLAND</span>
                        <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($pl['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3"><?= htmlspecialchars($pl['isi']) ?></p>
                    </div>
                    <div class="flex items-center gap-2 font-label-bold text-label-sm uppercase text-primary">
                        READ MORE <span class="material-symbols-outlined text-sm transform group-hover:translate-x-1 transition-transform">arrow_outward</span>
                    </div>
                </div>
                <div class="w-full md:w-2/5 aspect-video md:aspect-auto relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($pl['img']) ?>" alt="Premier League News">
                </div>
            </a>

            <!-- Card 2: La Liga (Overlay Layout) -->
            <a href="news-detail.php?id=<?= $la['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 relative group cursor-pointer overflow-hidden border border-outline-variant aspect-square md:aspect-auto lg:aspect-square">
                <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" src="<?= htmlspecialchars($la['img']) ?>" alt="La Liga News">
                <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent flex flex-col justify-end p-8">
                    <span class="bg-primary text-on-primary w-fit px-2 py-0.5 mb-4 font-label-bold text-label-sm uppercase">LA LIGA • SPAIN</span>
                    <h3 class="font-headline-md text-headline-md leading-tight uppercase text-primary"><?= htmlspecialchars($la['title']) ?></h3>
                </div>
            </a>

            <!-- Card 3: Bundesliga (Split Layout) -->
            <a href="news-detail.php?id=<?= $bl['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($bl['img']) ?>" alt="Bundesliga News">
                </div>
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">BUNDESLIGA • GERMANY</span>
                        <h3 class="font-headline-md text-[24px] leading-snug mb-4 text-primary"><?= htmlspecialchars($bl['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant line-clamp-2"><?= htmlspecialchars($bl['isi']) ?></p>
                    </div>
                </div>
            </a>

            <!-- Card 4: Serie A (Minimalist Text Card) -->
            <a href="news-detail.php?id=<?= $sa['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer p-8 flex flex-col justify-between">
                <div>
                    <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">SERIE A • ITALY</span>
                    <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($sa['title']) ?></h3>
                    <p class="font-body-md text-on-surface-variant line-clamp-3"><?= htmlspecialchars($sa['isi']) ?></p>
                </div>
                <div class="flex items-center gap-2 font-label-bold text-label-sm uppercase text-primary mt-8">
                    READ MORE <span class="material-symbols-outlined text-sm transform group-hover:translate-x-1 transition-transform">arrow_outward</span>
                </div>
            </a>

            <!-- Card 5: Ligue 1 (Split Layout) -->
            <a href="news-detail.php?id=<?= $l1['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col">
                <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($l1['img']) ?>" alt="Ligue 1 News">
                </div>
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">LIGUE 1 • FRANCE</span>
                        <h3 class="font-headline-md text-[24px] leading-snug mb-4 text-primary"><?= htmlspecialchars($l1['title']) ?></h3>
                        <p class="font-body-md text-on-surface-variant line-clamp-2"><?= htmlspecialchars($l1['isi']) ?></p>
                    </div>
                </div>
            </a>

            <!-- Card 6: UEFA Champions League (Featured Medium) -->
            <a href="news-detail.php?id=<?= $ucl['id'] ?>" class="col-span-12 md:col-span-6 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col justify-between">
                <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($ucl['img']) ?>" alt="UEFA Champions League News">
                </div>
                <div class="p-8">
                    <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">UEFA CHAMPIONS LEAGUE</span>
                    <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($ucl['title']) ?></h3>
                    <p class="font-body-md text-on-surface-variant line-clamp-3"><?= htmlspecialchars($ucl['isi']) ?></p>
                </div>
            </a>

            <!-- Card 7: World Cup (Featured Medium) -->
            <a href="news-detail.php?id=<?= $wc['id'] ?>" class="col-span-12 md:col-span-6 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col justify-between">
                <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($wc['img']) ?>" alt="World Cup News">
                </div>
                <div class="p-8">
                    <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors">WORLD CUP</span>
                    <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($wc['title']) ?></h3>
                    <p class="font-body-md text-on-surface-variant line-clamp-3"><?= htmlspecialchars($wc['isi']) ?></p>
                </div>
            </a>
        </div>
    </div>
</section>
