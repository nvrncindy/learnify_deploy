<?php $__env->startSection('content'); ?>
<div class="auth-container">
    <div class="auth-card">

        <h3>Create Your Account</h3>
        <p>Join us and start your journey today.</p>

        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            
            <div class="mb-3 text-left">
                <label class="form-label">Full Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control" 
                    value="<?php echo e(old('name')); ?>" 
                    placeholder="Enter your full name" 
                    required>
            </div>

            
            <div class="mb-3 text-left">
                <label class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    value="<?php echo e(old('email')); ?>" 
                    placeholder="Enter your email" 
                    required>
            </div>

            
            <div class="mb-3 text-left">
                <label class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Create a password" 
                    required>
            </div>

            
            <div class="mb-3 text-left">
                <label class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    placeholder="Re-enter your password" 
                    required>
            </div>

            
            <div class="mb-3">
                <label class="form-check-label">
                    <input type="checkbox" name="agreement" class="form-check-input" required>
                    I agree to the Terms and Conditions
                </label>
            </div>

            
            <button type="submit" class="auth-btn mt-3">Sign up</button>
        </form>

        <p class="bottom-text mt-4 mb-0">
            Already have an account?
            <a href="<?php echo e(route('login')); ?>">Sign in</a>
        </p>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/cindynoveiren/learnify2.0/resources/views/auth/register.blade.php ENDPATH**/ ?>