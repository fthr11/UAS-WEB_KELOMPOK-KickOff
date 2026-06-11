<?php
require_once 'data/loader.php';
$all_news = get_all_news();
$latest_news = array_slice($all_news, 0, 5);
?>
<!-- Latest News -->
<section class="reveal py-stack-xl bg-white text-background active" id="latest-feed">
    <div class="px-margin-desktop">
        <div class="mb-16 flex items-baseline justify-between gap-8 border-b border-gray-300 pb-8">
            <h2 class="font-display-hero text-[48px] md:text-[40px] leading-none uppercase text-background">Latest Feed</h2>
            <div class="hidden md:block h-[2px] flex-grow bg-gray-300"></div>
            <div class="font-label-bold text-label-sm uppercase opacity-70">SCROLL TO DISCOVER</div>
        </div>
        <div class="space-y-stack-md">
            <?php foreach ($latest_news as $index => $news): 
                $num = sprintf("%02d", $index + 1);
                $isEven = ($index % 2 === 0);
            ?>
            <!-- Entry -->
            <a href="news-detail.php?id=<?= $news['id'] ?>" class="grid grid-cols-12 gap-gutter group cursor-pointer py-4 block text-background hover:no-underline">
                <div class="col-span-4 md:col-span-2 text-[48px] font-black opacity-10 group-hover:opacity-100 transition-opacity text-background">
                    <?= $num ?>
                </div>
                
                <?php if ($isEven): ?>
                <!-- Text on Left, Image on Right -->
                <div class="col-span-8 md:col-span-6 flex flex-col justify-center">
                    <span class="opacity-70 font-label-bold text-label-sm uppercase mb-2"><?= htmlspecialchars($news['category']) ?></span>
                    <h3 class="font-headline-md text-headline-md group-hover:text-[#4CAF50] transition-colors">
                        <?= htmlspecialchars($news['title']) ?></h3>
                    <p class="font-body-md opacity-70 mt-4 hidden md:block line-clamp-2"><?= htmlspecialchars($news['isi']) ?></p>
                </div>
                <div class="hidden md:block md:col-span-4 aspect-video bg-gray-100 relative overflow-hidden shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                </div>
                <?php else: ?>
                <!-- Image on Left, Text on Right -->
                <div class="hidden md:block md:col-span-4 aspect-video bg-gray-100 relative overflow-hidden shadow-sm">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                </div>
                <div class="col-span-8 md:col-span-6 flex flex-col justify-center md:pl-8">
                    <span class="opacity-70 font-label-bold text-label-sm uppercase mb-2"><?= htmlspecialchars($news['category']) ?></span>
                    <h3 class="font-headline-md text-headline-md group-hover:text-[#4CAF50] transition-colors">
                        <?= htmlspecialchars($news['title']) ?></h3>
                    <p class="font-body-md opacity-70 mt-4 hidden md:block line-clamp-2"><?= htmlspecialchars($news['isi']) ?></p>
                </div>
                <?php endif; ?>
                
                <div class="col-span-12 h-[1px] bg-gray-300 mt-stack-md"></div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>