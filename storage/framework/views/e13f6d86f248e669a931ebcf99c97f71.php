<?php $__env->startSection('content'); ?>
    

<div class="auth-container">
    <div class="auth-card">
        <h3>Welcome Back!</h3>
        <p>We missed you! Please enter your details.</p>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            
            <div class="mb-3 text-left">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
            </div>

            
            <div class="mb-3 text-left">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <small class="text-muted">
                        <input type="checkbox" class="me-1"> Remember me
                    </small>

                    <?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>" class="text-primary" style="font-size: 0.85rem;">
                            Forgot password?
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            
            <button type="submit" class="auth-btn mt-3">Sign in</button>
        </form>

        <p class="bottom-text mt-4 mb-0">
            Don't have an account?
            <a href="<?php echo e(route('register')); ?>">Sign up</a>
        </p>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Rafael Sanyoto\Documents\learnify-main\learnify-main\learnify\resources\views/auth/login.blade.php ENDPATH**/ ?>