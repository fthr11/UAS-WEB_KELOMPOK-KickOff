<?php
// Expected variables:
// $match - an array containing 'status', 'time', 'league', 'team1', 'team2'
// $theme - 'light' or 'dark' (optional, defaults to 'dark')

$theme = isset($theme) ? $theme : 'dark';

// Theme mapping configurations
if ($theme === 'light') {
    $cardClass = 'bg-white border border-gray-300 shadow-sm';
    $textColorClass = 'text-background';
    $mutedColorClass = 'opacity-70';
    $emptyLogoClass = 'bg-gray-200';
} else {
    $cardClass = 'bg-background border border-outline-variant';
    $textColorClass = '';
    $mutedColorClass = 'text-on-surface-variant';
    $emptyLogoClass = 'bg-surface-container';
}

$statusColorClass = ($match['status'] === 'LIVE') ? 'text-[#4CAF50]' : $mutedColorClass;
$statusBgClass = ($match['status'] === 'LIVE') ? 'bg-[#4CAF50] shadow-[0_0_8px_#4CAF50]' : '';
$opacityClass = ($match['status'] === 'Coming Up') ? 'opacity-50' : '';
?>
<!-- Score Card -->
<div class="card min-w-[320px] <?php echo $cardClass; ?> p-0 rounded-none <?php echo $opacityClass; ?> trending-card border-0">
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
            <span class="<?php echo $mutedColorClass; ?> font-label-sm uppercase"><?php echo htmlspecialchars($match['league']); ?></span>
        </div>
        <div class="flex flex-col gap-5 <?php echo ($match['status'] === 'Coming Up') ? $mutedColorClass : ''; ?>">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <?php if (!empty($match['team1']['logo'])): ?>
                        <div class="w-8 h-8 flex items-center justify-center">
                            <img src="<?php echo htmlspecialchars($match['team1']['logo']); ?>" alt="" class="w-full h-full object-contain">
                        </div>
                    <?php else: ?>
                        <div class="w-8 h-8 <?php echo $emptyLogoClass; ?>"></div>
                    <?php endif; ?>
                    <span class="font-label-bold uppercase leading-none mt-1 <?php echo $textColorClass; ?>"><?php echo htmlspecialchars($match['team1']['name']); ?></span>
                </div>
                <span class="font-headline-md leading-none <?php echo $textColorClass; ?>"><?php echo htmlspecialchars($match['team1']['score']); ?></span>
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <?php if (!empty($match['team2']['logo'])): ?>
                        <div class="w-8 h-8 flex items-center justify-center">
                            <img src="<?php echo htmlspecialchars($match['team2']['logo']); ?>" alt="" class="w-full h-full object-contain">
                        </div>
                    <?php else: ?>
                        <div class="w-8 h-8 <?php echo $emptyLogoClass; ?>"></div>
                    <?php endif; ?>
                    <span class="font-label-bold uppercase leading-none mt-1 <?php echo $textColorClass; ?>"><?php echo htmlspecialchars($match['team2']['name']); ?></span>
                </div>
                <span class="font-headline-md leading-none <?php echo $textColorClass; ?>"><?php echo htmlspecialchars($match['team2']['score']); ?></span>
            </div>
        </div>
    </div>
</div>
