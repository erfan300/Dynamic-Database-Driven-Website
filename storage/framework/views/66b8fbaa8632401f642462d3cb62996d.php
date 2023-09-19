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
        <h1>AProject</h1>
    </header>
    <nav>
    <?php if(session()->has('user_id')): ?>
        <a href="<?php echo e(url('/logout')); ?>">Logout</a>
    <?php endif; ?>
    </nav>
    <section id="home-forms">
        <div id="registration-containers">
            <div class="initial-forms">
                <a href="<?php echo e(route('register')); ?>">Register</a>
            </div>
            <div class="initial-forms">
                <a href="<?php echo e(route('login')); ?>">Log-in</a>
            </div>
            <div class="initial-forms">
                <a href="<?php echo e(route('redirect')); ?>">Dashboard</a>
            </div>

            
        </div>
    </section>
</body>
</html>
<?php /**PATH C:\xammp2\htdocs\portfolio_3\resources\views/home.blade.php ENDPATH**/ ?>