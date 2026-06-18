<?php
require_once 'data/loader.php';
$category = isset($_GET['category']) ? $_GET['category'] : '';

if ($category) {
    $news_list = get_news_by_category($category);
    $page_title = strtoupper($category) . " NEWS";
} else {
    $news_list = get_all_news();
    $page_title = "ALL CATEGORIES";
}
?>
<!DOCTYPE html>
<html class="light" lang="en">

<?php include 'components/head.php'; ?>

<body class="bg-background text-on-surface selection:bg-primary selection:text-background overflow-x-hidden">
    <?php include 'components/navbar.php'; ?>

    <!-- Main Content Container with spacing for the fixed navbar -->
    <main class="pt-32 pb-16 min-h-screen px-margin-desktop">
        <div class="mb-12 border-b border-outline-variant pb-6">
            <h1 class="text-headline-lg font-medium text-primary uppercase"><?php echo htmlspecialchars($page_title); ?></h1>
        </div>

        <?php if (empty($news_list)): ?>
            <p class="text-on-surface-variant font-body-md">No news found in this category.</p>
        <?php else: ?>
            <div class="grid grid-cols-12 gap-gutter">
                <?php foreach ($news_list as $index => $news): ?>
                    <?php $layout_type = $index % 7; ?>
                    
                    <?php if ($layout_type === 0): // Featured Large Layout ?>
                        <a href="news-detail.php?id=<?= $news['id'] ?>" class="col-span-12 lg:col-span-8 flex flex-col md:flex-row bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer overflow-hidden">
                            <div class="flex-1 p-8 flex flex-col justify-between">
                                <div>
                                    <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors"><?= htmlspecialchars($news['category']) ?></span>
                                    <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($news['title']) ?></h3>
                                    <p class="font-body-md text-on-surface-variant mb-6 line-clamp-3"><?= htmlspecialchars($news['isi']) ?></p>
                                </div>
                                <div class="flex items-center gap-2 font-label-bold text-label-sm uppercase text-primary">
                                    READ MORE <span class="material-symbols-outlined text-sm transform group-hover:translate-x-1 transition-transform">arrow_outward</span>
                                </div>
                            </div>
                            <div class="w-full md:w-2/5 aspect-video md:aspect-auto relative overflow-hidden bg-surface-container-high">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                            </div>
                        </a>

                    <?php elseif ($layout_type === 1): // Overlay Layout ?>
                        <a href="news-detail.php?id=<?= $news['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 relative group cursor-pointer overflow-hidden border border-outline-variant aspect-square md:aspect-auto lg:aspect-square">
                            <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                            <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent flex flex-col justify-end p-8">
                                <span class="bg-primary text-on-primary w-fit px-2 py-0.5 mb-4 font-label-bold text-label-sm uppercase"><?= htmlspecialchars($news['category']) ?></span>
                                <h3 class="font-headline-md text-headline-md leading-tight uppercase text-primary"><?= htmlspecialchars($news['title']) ?></h3>
                            </div>
                        </a>

                    <?php elseif ($layout_type === 2 || $layout_type === 4): // Split Layout ?>
                        <a href="news-detail.php?id=<?= $news['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col">
                            <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                            </div>
                            <div class="p-8 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors"><?= htmlspecialchars($news['category']) ?></span>
                                    <h3 class="font-headline-md text-[24px] leading-snug mb-4 text-primary"><?= htmlspecialchars($news['title']) ?></h3>
                                    <p class="font-body-md text-on-surface-variant line-clamp-2"><?= htmlspecialchars($news['isi']) ?></p>
                                </div>
                            </div>
                        </a>

                    <?php elseif ($layout_type === 3): // Minimalist Text Card ?>
                        <a href="news-detail.php?id=<?= $news['id'] ?>" class="col-span-12 md:col-span-6 lg:col-span-4 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer p-8 flex flex-col justify-between">
                            <div>
                                <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors"><?= htmlspecialchars($news['category']) ?></span>
                                <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($news['title']) ?></h3>
                                <p class="font-body-md text-on-surface-variant line-clamp-3"><?= htmlspecialchars($news['isi']) ?></p>
                            </div>
                            <div class="flex items-center gap-2 font-label-bold text-label-sm uppercase text-primary mt-8">
                                READ MORE <span class="material-symbols-outlined text-sm transform group-hover:translate-x-1 transition-transform">arrow_outward</span>
                            </div>
                        </a>

                    <?php else: // Featured Medium ?>
                        <a href="news-detail.php?id=<?= $news['id'] ?>" class="col-span-12 md:col-span-6 bg-surface-container-low border border-outline-variant hover:border-primary transition-all duration-300 group cursor-pointer flex flex-col justify-between">
                            <div class="aspect-video relative overflow-hidden bg-surface-container-high">
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                            </div>
                            <div class="p-8">
                                <span class="text-on-surface-variant font-label-bold text-label-sm uppercase mb-4 block group-hover:text-primary transition-colors"><?= htmlspecialchars($news['category']) ?></span>
                                <h3 class="font-headline-md text-headline-md mb-4 text-primary leading-tight"><?= htmlspecialchars($news['title']) ?></h3>
                                <p class="font-body-md text-on-surface-variant line-clamp-3"><?= htmlspecialchars($news['isi']) ?></p>
                            </div>
                        </a>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>
