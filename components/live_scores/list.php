<section class="reveal py-stack-xl bg-white text-background active">
    <div class="px-margin-desktop">
        <div class="mb-16 flex items-baseline justify-between gap-8 border-b border-gray-300 pb-8">
            <h1 class="font-display-hero text-[48px] md:text-[80px] leading-none uppercase text-background">Live Scores</h1>
            <div class="hidden md:block h-[2px] flex-grow bg-gray-300"></div>
            <div class="font-label-bold text-label-sm uppercase opacity-70">REAL-TIME MATCH UPDATES</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            <?php
            $liveScoreJson = file_get_contents(__DIR__ . '/../../data/live_score.json');
            $liveScores = json_decode($liveScoreJson, true);

            if ($liveScores) {
                foreach ($liveScores as $match) {
                    $theme = 'light';
                    include __DIR__ . '/../live_score_card.php';
                }
            }
            ?>
        </div>
    </div>
</section>
