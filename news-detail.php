<?php
require_once 'data/loader.php';

// Get the article ID from the query parameter
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$article = get_news_by_id($id);
?>
<!DOCTYPE html>
<html class="dark" lang="en">

<?php include 'components/head.php'; ?>

<body class="bg-background text-on-surface selection:bg-primary selection:text-background overflow-x-hidden">
    <?php include 'components/navbar.php'; ?>

    <style>
        nav { background-color: #131313 !important; }
    </style>

    <main class="pt-32 pb-stack-xl min-h-screen">
        <div class="px-margin-desktop max-w-4xl mx-auto">
            
            <?php if ($article): ?>
                <!-- Breadcrumbs & Back Button -->
                <div class="mb-8 flex items-center justify-between">
                    <a href="javascript:history.back()" class="group flex items-center gap-2 font-label-bold text-label-sm uppercase text-on-surface-variant hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-sm transform group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        Back
                    </a>
                    <div class="text-label-sm font-label-bold uppercase tracking-wider text-on-surface-variant">
                        <a href="index.php" class="hover:text-primary transition-colors">Home</a>
                        <span class="mx-2">•</span>
                        <a href="indexcategory.php" class="hover:text-primary transition-colors">Categories</a>
                        <span class="mx-2">•</span>
                        <span class="text-primary"><?= htmlspecialchars($article['category']) ?></span>
                    </div>
                </div>

                <!-- Category Badge -->
                <span class="inline-block bg-primary text-on-primary px-3 py-1 font-label-bold text-label-sm uppercase mb-6">
                    <?= htmlspecialchars($article['category']) ?>
                </span>

                <!-- Article Title -->
                <h1 class="text-headline-lg-mobile md:text-headline-lg leading-tight font-black mb-6 text-primary">
                    <?= htmlspecialchars($article['title']) ?>
                </h1>

                <!-- Article Meta -->
                <div class="flex items-center gap-4 border-b border-outline-variant pb-8 mb-8 text-on-surface-variant font-label-bold text-label-sm uppercase">
                    <span>By SportNews Editorial Team</span>
                    <span>•</span>
                    <span>Published Today</span>
                    <span>•</span>
                    <span class="text-primary flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">schedule</span> 4 min read
                    </span>
                </div>

                <!-- Featured Image -->
                <div class="w-full aspect-video md:aspect-[21/9] bg-surface-container mb-12 overflow-hidden border border-outline-variant">
                    <img class="w-full h-full object-cover" src="<?= htmlspecialchars($article['img']) ?>" alt="<?= htmlspecialchars($article['title']) ?>">
                </div>

                <!-- Article Body -->
                <article class="font-body-lg text-body-lg text-on-surface-variant space-y-8 leading-relaxed max-w-none">
                    <!-- The actual text from JSON -->
                    <p class="text-primary font-medium text-xl border-l-4 border-primary pl-6 py-2">
                        <?= htmlspecialchars($article['isi']) ?>
                    </p>

                    <!-- Lorem Ipsum extensions for realistic layout -->
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <p>
                        Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, ut, gravida quis, arcu.
                    </p>

                    <p>
                        Sunt in culpa qui officia deserunt mollit anim id est laborum. Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </article>

            <?php else: ?>
                <!-- Not Found Template -->
                <div class="py-stack-lg text-center flex flex-col items-center justify-center gap-8">
                    <span class="material-symbols-outlined text-[64px] text-error">warning</span>
                    <h1 class="font-headline-lg text-primary leading-tight">Article Not Found</h1>
                    <p class="font-body-md text-on-surface-variant max-w-md">
                        We couldn't find the article you were looking for. It may have been moved, deleted, or the link might be incorrect.
                    </p>
                    <a href="index.php" class="btn-invert bg-primary text-on-primary px-8 py-4 font-label-bold text-label-bold uppercase">
                        Back to Home
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>
