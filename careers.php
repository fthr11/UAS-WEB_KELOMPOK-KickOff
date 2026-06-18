<!DOCTYPE html>
<html lang="en">

<?php include 'components/head.php'; ?>

<body class="bg-white text-background selection:bg-background selection:text-white overflow-x-hidden pt-32">
    <?php include 'components/navbar.php'; ?>
    <style>
        nav { background-color: #131313 !important; }
    </style>
    
    <main class="min-h-screen px-margin-desktop py-stack-xl">
        <h1 class="font-display-hero text-[48px] md:text-[64px] uppercase mb-8">Careers</h1>
        <div class="max-w-4xl">
            <p class="font-body-md text-on-surface-variant mb-12 text-lg">Join the KICKOFF team and help us build the best sports news platform in the world. We're always looking for passionate, talented individuals to join our growing company.</p>
            
            <h2 class="font-headline-md text-2xl uppercase text-background mb-6">Open Positions</h2>
            
            <div class="flex flex-col gap-4">
                <!-- Job Card 1 -->
                <div class="border border-outline-variant p-6 hover:border-primary transition-colors flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h3 class="font-headline-md text-xl uppercase mb-2">Senior Sports Writer</h3>
                        <div class="flex gap-4 font-label-sm uppercase text-on-surface-variant opacity-70">
                            <span>Full-time</span>
                            <span>•</span>
                            <span>Remote</span>
                        </div>
                    </div>
                    <button class="font-label-bold uppercase border-b-2 border-background pb-1 hover:text-primary hover:border-primary transition-colors">Apply Now</button>
                </div>
                
                <!-- Job Card 2 -->
                <div class="border border-outline-variant p-6 hover:border-primary transition-colors flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h3 class="font-headline-md text-xl uppercase mb-2">Social Media Manager</h3>
                        <div class="flex gap-4 font-label-sm uppercase text-on-surface-variant opacity-70">
                            <span>Full-time</span>
                            <span>•</span>
                            <span>London, UK</span>
                        </div>
                    </div>
                    <button class="font-label-bold uppercase border-b-2 border-background pb-1 hover:text-primary hover:border-primary transition-colors">Apply Now</button>
                </div>

                <!-- Job Card 3 -->
                <div class="border border-outline-variant p-6 hover:border-primary transition-colors flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h3 class="font-headline-md text-xl uppercase mb-2">Frontend Developer</h3>
                        <div class="flex gap-4 font-label-sm uppercase text-on-surface-variant opacity-70">
                            <span>Full-time</span>
                            <span>•</span>
                            <span>Remote</span>
                        </div>
                    </div>
                    <button class="font-label-bold uppercase border-b-2 border-background pb-1 hover:text-primary hover:border-primary transition-colors">Apply Now</button>
                </div>
            </div>
            
            <div class="mt-12 p-8 bg-surface-container-low border border-outline-variant text-center">
                <h3 class="font-headline-md text-xl uppercase mb-4">Don't see a fit?</h3>
                <p class="font-body-md text-on-surface-variant mb-6">Send us your resume anyway. We're always on the lookout for great talent.</p>
                <a href="mailto:careers@kickoff.com" class="inline-block bg-background text-white font-label-bold uppercase py-3 px-6 hover:bg-gray-800 transition-colors">Email Resume</a>
            </div>
        </div>
    </main>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>
