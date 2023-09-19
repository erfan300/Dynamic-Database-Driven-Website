<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title"><?php echo e($title ?? 'Register'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>"/>
</head>
<body>
    <header id="home-header">
        <h1>AProject</h1>
    </header>

    <nav>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <a href="<?php echo e(route('redirect')); ?>">Dashboard</a>
    <a href="<?php echo e(route('view')); ?>">View</a>
    

    </nav>

    <section id="register-section">
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
        <form id="register-form" method="POST" action="<?php echo e(route('register')); ?>" >
            <?php echo csrf_field(); ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />

            <input type="email" name="email"  placeholder="Email Address" />
            <input type="email" name="email_confirmation"  placeholder="Confirm Email Address"  />

            <input type="submit"value="Submit" id="submit"/>
            <a href="<?php echo e(route('login')); ?>">Already registered</a>

        </form>
    </section>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\portfolio_3\resources\views/register.blade.php ENDPATH**/ ?>