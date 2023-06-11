<!DOCTYPE html>
<html>
<head>
    <title>Blade Template Example</title>
</head>
<body>
    <h1>Hello, Blade!</h1>
    Hello f <?= htmlspecialchars($name ?? 'World', ENT_QUOTES, 'UTF-8') ?>
<h1>test </h1>
 <?php echo e($data->name); ?> 
</body>
</html><?php /**PATH /var/www/framework/src/views//example.blade.php ENDPATH**/ ?>