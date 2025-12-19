<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <h1 class="mb-4 text-center"><?php echo e(__('messages.my_course')); ?></h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger text-center"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <div class="row g-4">

        <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-12">
                <div class="card shadow-sm flex-row align-items-center p-3">

                    <img src="<?php echo e(asset($course->image ?? 'webdev.png')); ?>"
                         class="card-img-left rounded"
                         style="width: 120px; height: auto;"
                         alt="<?php echo e($course->title); ?>"
                         onerror="this.src='<?php echo e(asset('webdev.png')); ?>'">

                    <div class="card-body flex-grow-1 ms-3">
                        <h5 class="card-title"><?php echo e($course->title); ?></h5>
                        <p class="card-text mb-1">
                            <small class="text-muted">
                                <?php echo e(__('messages.enrolled_at')); ?> <?php echo e($course->pivot->created_at?->format('d M Y') ?? 'N/A'); ?>

                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                <?php echo e(__('messages.last_updated')); ?> <?php echo e($course->updated_at?->diffForHumans() ?? 'N/A'); ?>

                            </small>
                        </p>
                    </div>

                    <div class="ms-auto text-center">
                        <a href="<?php echo e(route('mycourse.details', $course)); ?>" class="apply-btn">
                            <?php echo e(__('messages.continue')); ?>

                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center text-muted py-5">
                <?php echo e(__('messages.no_enrolled')); ?>

            </div>
        <?php endif; ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/cindynoveiren/learnify2.0/resources/views/MyCourse.blade.php ENDPATH**/ ?>