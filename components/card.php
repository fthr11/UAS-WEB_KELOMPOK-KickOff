<a href="news-detail.php?id=<?= $news['id'] ?>"
    class="card col-span-12 md:col-span-4 group cursor-pointer trending-card block text-background hover:no-underline rounded-none border-0 bg-transparent">
    <div class="card-img-top aspect-video bg-surface-container-low mb-6 relative overflow-hidden shadow-sm rounded-none">
        <img class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500"
            src="<?= htmlspecialchars($news['img']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
    </div>
    <div class="card-body p-0">
        <span
            class="card-subtitle opacity-70 font-label-bold text-label-sm uppercase mb-2 block group-hover:scale-95 transition-transform duration-500">
            <?= htmlspecialchars($news['category']) ?>
        </span>
        <h3 class="card-title font-headline-md text-headline-md mb-4 group-hover:scale-95 transition-transform duration-500">
            <?= htmlspecialchars($news['title']) ?>
        </h3>
        <p
            class="card-text font-body-md text-body-md opacity-70 mb-6 line-clamp-3 group-hover:scale-95 transition-transform duration-500">
            <?= htmlspecialchars($news['isi']) ?>
        </p>
    </div>
</a>