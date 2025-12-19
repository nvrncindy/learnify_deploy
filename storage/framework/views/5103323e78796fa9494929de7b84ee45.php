<?php $__env->startSection('content'); ?>
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0;
        border-radius: 0 0 50px 50px;
        margin-top: -1.5rem;
        margin-bottom: 3rem;
    }
</style>

<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Welcome to Learnify</h1>
        <p class="lead opacity-90">
            Simplify your learning journey.
        </p>
    </div>
</div>

<div class="container">

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center mb-4" role="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zhang\Downloads\learnify2.0 2\learnify2.0 2\learnify2.0\resources\views/home.blade.php ENDPATH**/ ?>