<!DOCTYPE html>
<html class="dark" lang="en">

<?php include 'components/head.php'; ?>

<body class="bg-background text-on-surface selection:bg-primary selection:text-background overflow-x-hidden">
    <?php include 'components/navbar.php'; ?>
    
    <style>
        nav { background-color: #131313 !important; }
    </style>

    <!-- Main Content Container with spacing for the fixed navbar -->
    <main class="pt-24 min-h-screen">
        <?php include 'components/home/categories.php'; ?>
    </main>

    <?php include 'components/footer.php'; ?>
    <?php include 'components/scripts.php'; ?>
</body>

</html>
