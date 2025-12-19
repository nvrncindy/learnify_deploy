<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <?php if(session('success')): ?>
            <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <h1 class="fw-bold"><?php echo e($course->title); ?></h1>
            </div>


             <div class="text-center mb-4">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="<?php echo e($course->links); ?>"
                        title="YouTube video"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <form action="<?php echo e(route('course.submit', $course->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo e(__('messages.question')); ?> 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1-option1" value="A">
                                    <label class="form-check-label" for="q1-option1">
                                        A
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1-option2" value="B">
                                    <label class="form-check-label" for="q1-option2">
                                        B
                                    </label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" id="q1-option3" value="C">
                                    <label class="form-check-label" for="q1-option3">
                                        C
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo e(__('messages.question')); ?> 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2-option1" value="A">
                                    <label class="form-check-label" for="q2-option1">A</label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2-option2" value="B">
                                    <label class="form-check-label" for="q2-option2">B</label>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" id="q2-option3" value="C">
                                    <label class="form-check-label" for="q2-option3">C</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5"><?php echo e(__('messages.submit_btn')); ?></button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Rafael Sanyoto\Documents\learnify2.0\learnify2.0\resources\views/Materials.blade.php ENDPATH**/ ?>