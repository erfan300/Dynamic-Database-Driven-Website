<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title"><?php echo e($title ?? 'AProject'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <header id="home-header">
        <h1>Dashboard</h1>
    </header>

    <nav>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <?php if(session()->has('user_id')): ?>
        <a href="<?php echo e(url('/logout')); ?>">Logout</a>
    <?php endif; ?>
    </nav>



    <section id="redirection">
        <div id="redirectionn-containers">
            <div class="initial-redirection">
                <a href="<?php echo e(route('view')); ?>">View</a>
            </div>
            <div class="initial-redirection">
                <a href="<?php echo e(route('create')); ?>">Create</a>
            </div>
            
        </div>
    </section>
</body>
</html><?php /**PATH C:\xammp2\htdocs\portfolio_3\resources\views/redirect.blade.php ENDPATH**/ ?>