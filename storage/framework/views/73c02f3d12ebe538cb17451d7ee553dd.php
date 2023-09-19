<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
	<header id="home-header">
	<h1>Update Project</h1>
	</header>
	<nav>
		<a href="<?php echo e(route('home')); ?>">Home</a>
        <a href="<?php echo e(route('redirect')); ?>">Dashboard</a>
        <a href="<?php echo e(route('view')); ?>">View</a>

	</nav>
	<section id="create-section">
    <form id="create-form"method="POST" action="<?php echo e(route('update', ['pid' => $data['pid']])); ?>">
		<?php echo csrf_field(); ?>
        <input type="hidden" name="pid" value="<?php echo e($data['pid']); ?>">
		<label for="title">Title(Required)</label>
		<input type="text" name="title" value="<?php echo e($data['title']); ?>"><br><br>

		<label for="start_date">Start Date</label>
		<input type="date" name="start_date" value="<?php echo e($data['start_date']); ?>"><br><br>

		<label for="end_date">End Date</label>
		<input type="date" name="end_date" value="<?php echo e($data['end_date']); ?>"><br><br>

		<label for="phase">Phase</label>
		<select name="phase">
                <option><?php echo e($data['phase']); ?></option>
				<option></option>
                <option>design</option>
                <option>development</option>
                <option>testing</option>
                <option>deployment</option>
                <option>complete</option>
            </select>
		<label for="description">Description</label><br>
        <textarea name="description" rows="5" cols="50"><?php echo e($data['description']); ?></textarea>

		<input type="submit" value="Update Project">
	</form>
	</section>
</body>
</html>
<?php /**PATH C:\xammp2\htdocs\portfolio_3\resources\views/update.blade.php ENDPATH**/ ?>