<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Events</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="<?php echo e(url('/events/create')); ?>" class="btn btn-sm btn-outline-secondary">Create new event</a>
        </div>
    </div>
</div>

<div class="row events">
    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <a href="<?php echo e(url('/events/'.$event->slug)); ?>" class="btn text-left event">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($event->name); ?></h5>
                        <p class="card-subtitle"><?php echo e($event->getFormattedDate()); ?></p>
                        <hr>
                        <p class="card-text"><?php echo e($event->getNumRegistrations()); ?> registrations</p>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>