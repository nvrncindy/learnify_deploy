<?php $__env->startSection('content'); ?>
<style>
    /* Hero section styling to match the professional look */
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 0; /* Reduced padding for simplicity */
        border-radius: 0 0 50px 50px;
        margin-top: -1.5rem; /* Pull up to touch navbar if needed */
        margin-bottom: 3rem;
    }
</style>

<!-- Simple Welcome Section -->
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Welcome to Learnify</h1>
        <p class="lead opacity-90">
            Simplify your learning journey.
        </p>
    </div>
</div>

<!-- Dashboard Logic (Required) -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold"><?php echo e(__('Dashboard')); ?></div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo e(__('You have logged in!')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Rafael Sanyoto\Documents\learnify-main\learnify-main\learnify\resources\views/home.blade.php ENDPATH**/ ?>