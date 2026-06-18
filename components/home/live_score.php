<!-- Live Score Section -->
<section class="bg-surface-container-lowest py-16 border-y border-outline-variant">
    <div class="px-margin-desktop mb-8 flex justify-between items-end">
        <h2 class="font-headline-md text-headline-md uppercase">Live Matches</h2>
        <div class="flex gap-4">
            <button
                class="p-2 border border-outline-variant hover:bg-primary hover:text-background transition-colors"><span
                    class="material-symbols-outlined">chevron_left</span></button>
            <button
                class="p-2 border border-outline-variant hover:bg-primary hover:text-background transition-colors"><span
                    class="material-symbols-outlined">chevron_right</span></button>
        </div>
    </div>
    <div class="flex gap-gutter overflow-x-auto no-scrollbar px-margin-desktop">
        <?php
        $liveScoreJson = file_get_contents(__DIR__ . '/../../data/live_score.json');
        $liveScores = json_decode($liveScoreJson, true);

        if ($liveScores) {
            foreach ($liveScores as $match) {
                include __DIR__ . '/../live_score_card.php';
            }
        }
        ?>
    </div>
</section>