<!DOCTYPE html>
<html lang="en">

<?php include 'components/head.php'; ?>

<body class="bg-white text-background selection:bg-background selection:text-white overflow-x-hidden pt-32">
    <?php include 'components/navbar.php'; ?>
    <style>
        nav { background-color: #131313 !important; }
    </style>
    
    <main class="min-h-screen px-margin-desktop py-stack-xl">
        <h1 class="font-display-hero text-[48px] md:text-[64px] uppercase mb-8">Contact Us</h1>
        <div class="max-w-3xl">
            <p class="font-body-md text-on-surface-variant mb-8 text-lg">Have a question or feedback? We'd love to hear from you. Fill out the form below and we'll get back to you as soon as possible.</p>
            
            <form class="flex flex-col gap-6" action="#" method="POST" onsubmit="event.preventDefault(); alert('Message sent successfully!');">
                <div class="flex flex-col gap-2">
                    <label for="name" class="font-label-bold uppercase text-background">Name</label>
                    <input type="text" id="name" name="name" required class="border border-outline-variant p-4 rounded-none bg-surface-container-lowest focus:outline-none focus:border-primary transition-colors">
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="email" class="font-label-bold uppercase text-background">Email Address</label>
                    <input type="email" id="email" name="email" required class="border border-outline-variant p-4 rounded-none bg-surface-container-lowest focus:outline-none focus:border-primary transition-colors">
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="subject" class="font-label-bold uppercase text-background">Subject</label>
                    <input type="text" id="subject" name="subject" required class="border border-outline-variant p-4 rounded-none bg-surface-container-lowest focus:outline-none focus:border-primary transition-colors">
                </div>
                
                <div class="flex flex-col gap-2">
                    <label for="message" class="font-label-bold uppercase text-background">Message</label>
                    <textarea id="message" name="message" rows="6" required class="border border-outline-variant p-4 rounded-none bg-surface-container-lowest focus:outline-none focus:border-primary transition-colors resize-y"></textarea>
                </div>
                
                <button type="submit" class="bg-background text-white font-label-bold uppercase py-4 px-8 hover:bg-gray-800 transition-colors w-fit">Send Message</button>
            </form>
        </div>
    </main>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>
