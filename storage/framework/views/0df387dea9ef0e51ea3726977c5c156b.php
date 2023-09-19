<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body id="view-page">
<header id="home-header">
    <h1>View</h1>
    
</header>

    <nav>
    <a href="<?php echo e(route('home')); ?>">Home</a>
    <a href="<?php echo e(route('redirect')); ?>">Dashboard</a>
    <?php if(session()->has('user_id')): ?>
        <a href="<?php echo e(url('create')); ?>">Create</a>
        <a href="<?php echo e(url('/logout')); ?>">Logout</a>
    <?php endif; ?>
    <form class="search-form" action="<?php echo e(route('search')); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <input class="search-input" type="text" name="q" placeholder="Search projects by title or end date...">
        <button class="search-btn" type="submit">Search</button>
    </form>
    </nav>

<main class="view-main">
    <table class="project-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>Description</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(url('/project/'.$project->title)); ?>"><?php echo e($project->title); ?></a></td>
                <td><?php echo e($project->start_date); ?></td>
                <td><?php echo e($project->description); ?></td>
                <td>
                    <?php if($project->uid == session('user_id')): ?>
                        <a href="<?php echo e(route('update', $project->title)); ?>">Update</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="pagination-links">
        <?php echo e($projects->links()); ?>

    </div>
</main>

</body>
</html>
<?php /**PATH C:\xammp2\htdocs\portfolio_3\resources\views/view.blade.php ENDPATH**/ ?>