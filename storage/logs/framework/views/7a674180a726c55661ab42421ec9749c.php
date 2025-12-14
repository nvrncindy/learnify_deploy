<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/coursecatalog.css')); ?>">
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-white text-gray-700 antialiased">

<div class="min-h-screen p-6">

    <header class="bg-gray-200 rounded-b px-6 py-4 mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-medium text-center w-full">
            <?php echo e(__('messages.course_catalogue')); ?>

        </h1>

        <a href="<?php echo e(route('courses.create')); ?>" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 text-sm font-bold whitespace-nowrap ml-4">
            + <?php echo e(__('messages.new_course')); ?>

        </a>

        <div class="w-6 h-6 bg-white border rounded shadow-sm ml-4"></div>
    </header>

    <?php if(session('success')): ?>
        <div class="alert alert-success" style="color: green; padding: 10px; background: #e6fffa; border: 1px solid green; margin-bottom: 10px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger" style="color: red; padding: 10px; background: #ffe6e6; border: 1px solid red; margin-bottom: 10px;">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="card-list">

        <?php $__empty_1 = true; $__currentLoopData = ($courses ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="course-card">
                <div class="thumb-wrapper">
                    <img
                        src="<?php echo e(asset($course->image ?? 'webdev.png')); ?>"
                        alt="<?php echo e($course->title); ?>"
                        class="thumb"
                        onerror="this.src='<?php echo e(asset('webdev.png')); ?>'">
                </div>

                <div class="content">

                    <div class="top-row">
                        <div>
                            <h3 class="title"><?php echo e($course->title); ?></h3>

                            <div class="rating-price">
                                <div class="rating">
                                    <span class="star">★</span>
                                    <span><?php echo e(number_format($course->rating ?? 0, 1)); ?></span>
                                </div>
                                <div class="price">Rp <?php echo e(number_format($course->price ?? 0, 0, ',', '.')); ?></div>
                            </div>
                        </div>

                        <div class="apply-wrapper">
                            
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(Auth::user()->courses->contains($course->id)): ?>
                                    
                                    <button type="button" class="apply-btn bg-green-600 hover:bg-green-700 text-white cursor-default" style="background-color: #16a34a !important; cursor: default;" disabled>
                                        Applied
                                    </button>
                                <?php else: ?>
                                    
                                    <form action="<?php echo e(route('courses.apply', $course->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="apply-btn">
                                            <?php echo e(__('messages.apply')); ?>

                                        </button>
                                    </form>
                                <?php endif; ?>
                            <?php else: ?>
                                
                                <form action="<?php echo e(route('courses.apply', $course->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="apply-btn">
                                        <?php echo e(__('messages.apply')); ?>

                                    </button>
                                </form>
                            <?php endif; ?>
                            
                        </div>
                    </div>

                    <div class="desc">
                        <?php echo nl2br(e($course->description ?? 'Course description not available.')); ?>

                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="text-xs font-bold text-gray-400 uppercase">
                            <?php echo e(__('messages.admin')); ?>

                        </span>
                        <div class="flex gap-2">
                            <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="text-xs bg-yellow-100 text-yellow-700 px-3 py-1 rounded hover:bg-yellow-200 transition">
                                <?php echo e(__('messages.edit')); ?>

                            </a>

                            <form action="<?php echo e(route('courses.destroy', $course->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('messages.confirm_delete')); ?>');" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 transition">
                                    <?php echo e(__('messages.delete')); ?>

                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center text-gray-500 w-full py-10">
                <?php echo e(__('messages.no_courses')); ?>

            </div>
        <?php endif; ?>

    </div>
</div>

</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Rafael Sanyoto\Documents\learnify-main\learnify-main\learnify\resources\views/coursecatalog.blade.php ENDPATH**/ ?>