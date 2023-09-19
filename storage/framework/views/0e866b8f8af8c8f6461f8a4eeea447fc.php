<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title"><?php echo e($title ?? 'Create'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>"/>
</head>
<body>
    <header id="home-header">
        <h1>Create</h1>
    </header>

    <nav>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <a href="<?php echo e(route('redirect')); ?>">Dashboard</a>
    <a href="<?php echo e(route('view')); ?>">View</a>
    <?php if(session()->has('user_id')): ?>
        <a href="<?php echo e(url('/logout')); ?>">Logout</a>
    <?php endif; ?>
    </nav>

    <section id="create-section">
        <?php if($errors->any()): ?>
            <div class="alert">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form id="create-form" method="POST" action="<?php echo e(route('create')); ?>" >
            <?php echo csrf_field(); ?>
            <label for="title">Title(Required)</label>
            <input type="text" name="title" placeholder="Title">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" placeholder="Start Date">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" placeholder="End Date">
            <label for="phase">Phase</label>
            <select name="phase">
                <option></option>
                <option>design</option>
                <option>development</option>
                <option>testing</option>
                <option>deployment</option>
                <option>complete</option>
            </select>
            <label for="description">Description</label><br>
            <textarea name="description" placeholder="Description:" rows="4" cols="40"></textarea>
            <input type="submit"value="Submit" id="submit"/>
        </form>

    </section>
</body>
</html>
<?php /**PATH C:\xammp2\htdocs\portfolio_3\resources\views/create.blade.php ENDPATH**/ ?>