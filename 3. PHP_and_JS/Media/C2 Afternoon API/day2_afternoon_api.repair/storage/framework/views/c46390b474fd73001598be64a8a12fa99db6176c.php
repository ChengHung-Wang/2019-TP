<?php $__env->startSection('content'); ?>
<div class="border-bottom mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h2"><?php echo e($event->name); ?></h1>
    </div>
    <span class="h6"><?php echo e($event->getFormattedDate()); ?></span>
</div>

<div class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Create new channel</h2>
    </div>
</div>

<form class="needs-validation" method="POST" action="<?php echo e(url('/events/'.$event->slug.'/channels')); ?>">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputName">Name</label>
            <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
            <input type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="inputName" name="name" placeholder="" value="<?php echo e(old('name')); ?>">
            <?php if($errors->has('name')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <hr class="mb-4">
    <button class="btn btn-primary" type="submit">Save channel</button>
    <a href="<?php echo e(url('/events/'.$event->slug)); ?>" class="btn btn-link">Cancel</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>