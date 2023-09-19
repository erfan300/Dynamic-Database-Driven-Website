<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="page-title"><?php echo e($title ?? 'Login'); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>"/>
    </head>

    <body>
        <header id="home-header">
            <h1>
                AProject
            </h1>
        </header>

        
        <nav>
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <a href="<?php echo e(route('redirect')); ?>">Dashboard</a>
            <a href="<?php echo e(route('view')); ?>">View</a>

        </nav>

        <section id="login-section">
            <form id="login-form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <input type="text" name="username" placeholder="Username" value="<?php echo e(old('username')); ?>">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" id="submit">Submit</button>
                <a href="<?php echo e(route('register')); ?>">Haven't registered before</a>
            </form>
        </section>
       

        
    </body>

</html>
<?php /**PATH C:\xammp2\htdocs\portfolio_3\resources\views/login.blade.php ENDPATH**/ ?>