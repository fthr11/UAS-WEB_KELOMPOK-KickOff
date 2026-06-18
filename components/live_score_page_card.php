<?php
// Expected variables:
// $match - an array containing 'status', 'time', 'league', 'team1', 'team2'

$statusColorClass = ($match['status'] === 'LIVE') ? 'text-[#4CAF50]' : 'opacity-70';
$statusBgClass = ($match['status'] === 'LIVE') ? 'bg-[#4CAF50] shadow-[0_0_8px_#4CAF50]' : '';
$opacityClass = ($match['status'] === 'Coming Up') ? 'opacity-50' : '';
?>
<!-- Score Card -->
<div
    class="card bg-white border border-gray-300 shadow-sm p-0 rounded-none <?php echo $opacityClass; ?> trending-card">
    <div class="card-body p-6 flex flex-col gap-4">
        <div class="flex justify-between items-center mb-2">
            <?php if ($match['status'] === 'LIVE'): ?>
                <span class="<?php echo $statusColorClass; ?> font-label-bold text-label-sm flex items-center gap-2">
                    <span class="w-2 h-2 <?php echo $statusBgClass; ?> rounded-full animate-pulse"></span>
                    <?php echo htmlspecialchars($match['status']); ?> • <?php echo htmlspecialchars($match['time']); ?>
                </span>
            <?php else: ?>
                <span class="<?php echo $statusColorClass; ?> font-label-bold text-label-sm uppercase">
                    <?php echo htmlspecialchars($match['status']); ?>
                </span>
            <?php endif; ?>
            <span class="opacity-70 font-label-sm uppercase"><?php echo htmlspecialchars($match['league']); ?></span>
        </div>
        <div class="flex flex-col gap-5 <?php echo ($match['status'] === 'Coming Up') ? 'opacity-70' : ''; ?>">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <?php if (!empty($match['team1']['logo'])): ?>
                        <div class="w-8 h-8 flex items-center justify-center">
                            <img src="<?php echo htmlspecialchars($match['team1']['logo']); ?>" alt="" class="w-full h-full object-contain">
                        </div>
                    <?php else: ?>
                        <div class="w-8 h-8 bg-gray-200"></div>
                    <?php endif; ?>
                    <span
                        class="font-label-bold uppercase text-background leading-none mt-1"><?php echo htmlspecialchars($match['team1']['name']); ?></span>
                </div>
                <span
                    class="font-headline-md text-background leading-none"><?php echo htmlspecialchars($match['team1']['score']); ?></span>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <?php if (!empty($match['team2']['logo'])): ?>
                        <div class="w-8 h-8 flex items-center justify-center">
                            <img src="<?php echo htmlspecialchars($match['team2']['logo']); ?>" alt="" class="w-full h-full object-contain">
                        </div>
                    <?php else: ?>
                        <div class="w-8 h-8 bg-gray-200"></div>
                    <?php endif; ?>
                    <span class="font-label-bold uppercase text-background leading-none mt-1">
                        <?php echo htmlspecialchars($match['team2']['name']); ?>
                    </span>
                </div>
                <span class="font-headline-md text-background leading-none">
                    <?php echo htmlspecialchars($match['team2']['score']); ?>
                </span>
            </div>
        </div>
    </div>
</div>