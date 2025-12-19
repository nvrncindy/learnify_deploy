<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Learnify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
</head>

<body>
  <?php echo $__env->make('layout.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <div class="container-custom">
      <?php echo $__env->yieldContent('content'); ?>
  </div>

  <?php echo $__env->make('layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH /Users/cindynoveiren/learnify2.0/resources/views/layout/app.blade.php ENDPATH**/ ?>