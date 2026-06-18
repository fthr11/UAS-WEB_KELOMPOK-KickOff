<?php
require_once 'data/loader.php';
$popular_news = get_popular_news();
$main_hero_news = !empty($popular_news) ? $popular_news[0] : null;
?>

<!-- Hero Section -->
<header class="relative min-h-screen pt-32 pb-stack-xl flex items-center bg-background hero-loaded" id="hero">
    <div class="grid grid-cols-12 gap-gutter px-margin-desktop w-full relative z-10">
        <!-- Left Text Content -->
        <div class="col-span-12 md:col-span-4 flex flex-col justify-center">
            <?php if ($main_hero_news): ?>
                <div class="mb-8 flex items-center gap-3 stagger-in" style="transition-delay: 100ms;">
                    <span class="bg-primary text-on-primary px-3 py-1 font-label-bold text-label-sm uppercase">NEW</span>
                    <span class="text-on-surface-variant font-label-sm uppercase tracking-widest">
                        <?php echo htmlspecialchars($main_hero_news['category']); ?>
                    </span>
                </div>
                <h1 class="text-headline-lg mb-8 leading-[0.95] text-primary stagger-in font-medium"
                    style="transition-delay: 300ms;">
                    <?php echo htmlspecialchars($main_hero_news['title']); ?>
                </h1>
                <p class="font-body-md text-body-md text-on-surface-variant mb-12 max-w-md stagger-in line-clamp-4"
                    style="transition-delay: 500ms;">
                    <?php echo htmlspecialchars($main_hero_news['isi']); ?>
                </p>
                <a href="news-detail.php?id=<?= $main_hero_news['id'] ?>"
                    class="group flex items-center gap-4 font-label-bold text-label-bold uppercase border-b-2 border-primary w-fit pb-1 transition-all hover:pr-4 stagger-in"
                    href="#" style="transition-delay: 700ms;">
                    CONTINUE READING
                    <span
                        class="material-symbols-outlined transform group-hover:translate-x-2 transition-transform">arrow_forward</span>
                </a>
            <?php else: ?>
                <div class="mb-8 flex items-center gap-3 stagger-in" style="transition-delay: 100ms;">
                    <span class="bg-primary text-on-primary px-3 py-1 font-label-bold text-label-sm uppercase">NEW</span>
                    <span class="text-on-surface-variant font-label-sm uppercase tracking-widest">High intensity
                        football update</span>
                </div>
                <h1 class="text-headline-lg mb-8 leading-[0.95] text-primary stagger-in font-medium"
                    style="transition-delay: 300ms;">Match<br>of the year<br>is coming</h1>
                <p class="font-body-md text-body-md text-on-surface-variant mb-12 max-w-md stagger-in"
                    style="transition-delay: 500ms;">
                    The wait is almost over. Europe's giants collide in a spectacle of tactical brilliance and raw
                    athletic power. Dive deep into our pre-match analysis and expert predictions.
                </p>
            <?php endif; ?>

        </div>
        <!-- Center Image -->
        <div class="col-span-12 md:col-span-4 relative stagger-in" style="transition-delay: 200ms;">
            <div class="w-full aspect-[3/4] bg-surface-container relative overflow-hidden">
                <img class="w-full h-full object-cover ambient-zoom"
                    alt="<?php echo htmlspecialchars($main_hero_news['title'] ?? 'Hero image'); ?>"
                    src="<?php echo htmlspecialchars($main_hero_news['img'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDlniUXXV_C49yTZZcJvqApRGvIeAvAmTo0gRZiTDY1s4GPdmUh5jCjHTaVwwxPLNBCPXBxz2H9emvSDbj_NNMpp33AkfhLMWfsHKP1-EE_ZAkbLCjAWpBtYFfz60GqD8ZaVWeLz0ICGAFAUpeb3B_s9hU-RjmTIE0VqOej35Xp_jHp8LOr6rCdpqkTwaNn0lq0cf5qcU74nFOvKku2Bhd7jDCgU27FwMkxT3j5P8Qgpnt71bo7AL4GDe3McGQy670yDQOMIgcjwTI'); ?>">
                <div class="absolute inset-0 bg-gradient-to-t from-background/40 to-transparent"></div>
            </div>
        </div>
        <!-- Right Sidebar: POPULAR NEWS -->
        <div
            class="col-span-12 md:col-span-4 flex flex-col justify-center pl-0 md:pl-12 border-t md:border-t-0 md:border-l border-outline-variant pt-12 md:pt-0">
            <h3 class="font-label-bold text-label-bold uppercase text-on-surface-variant mb-8 tracking-[0.2em] stagger-in"
                style="transition-delay: 400ms;">POPULAR NEWS</h3>
            <div class="space-y-12">
                <?php foreach (array_slice($popular_news, 1, 4) as $index => $news): ?>
                    <div class="group cursor-pointer stagger-in" style="transition-delay: 600ms;">
                        <div class="flex justify-between items-start mb-2">
                            <a href="news-detail.php?id=<?= $news['id'] ?>"
                                class="font-headline-md text-headline-md leading-tight group-hover:text-primary transition-colors">
                                <?php echo $news['title']; ?>
                            </a>
                            <span
                                class="material-symbols-outlined mt-2 opacity-0 group-hover:opacity-100 transition-opacity">arrow_forward</span>
                        </div>
                        <div class="h-[1px] bg-outline-variant mt-8"></div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- Subtle Grid Decoration -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-5">
        <div class="w-full h-full"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 40px 40px;">
        </div>
    </div>
</header>