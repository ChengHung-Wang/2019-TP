<?php $__env->startSection('content'); ?>
<div class="border-bottom mb-3 pt-3 pb-2 event-title">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h2"><?php echo e($event->name); ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?php echo e(url('/events/'.$event->slug.'/edit')); ?>" class="btn btn-sm btn-outline-secondary">Edit event</a>
            </div>
        </div>
    </div>
    <span class="h6"><?php echo e($event->getFormattedDate()); ?></span>
</div>

<!--.Tickets -->
<div id="tickets" class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Tickets</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?php echo e(url('/events/'.$event->slug.'/tickets/create' )); ?>" class="btn btn-sm btn-outline-secondary">
                    Create new ticket
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row tickets">
    <?php $__currentLoopData = $event->tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($ticket->name); ?></h5>
                <p class="card-text"><?php echo e($ticket->cost); ?>.-</p>
                <p class="card-text"><?php echo e($ticket->description); ?>&nbsp;</p>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Sessions -->
<div id="sessions" class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Sessions</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?php echo e(url('/events/'.$event->slug.'/sessions/create' )); ?>" class="btn btn-sm btn-outline-secondary">
                    Create new session
                </a>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive sessions">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Time</th>
            <th>Type</th>
            <th class="w-100">Title</th>
            <th>Speaker</th>
            <th>Channel</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $event->getSessions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-nowrap"><?php echo e($session->getFormattedStart()); ?> - <?php echo e($session->getFormattedEnd()); ?></td>
            <td><?php echo e(ucfirst($session->type)); ?></td>
            <td><a href="<?php echo e(url('/events/'.$event->slug.'/sessions/'.$session->id.'/edit')); ?>"><?php echo e($session->title); ?></a></td>
            <td class="text-nowrap"><?php echo e($session->speaker); ?></td>
            <td class="text-nowrap"><?php echo e($session->room->channel->name); ?> / <?php echo e($session->room->name); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<!-- Channels -->
<div id="channels" class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Channels</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?php echo e(url('/events/'.$event->slug.'/channels/create')); ?>" class="btn btn-sm btn-outline-secondary">
                    Create new channel
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row channels">
    <?php $__currentLoopData = $event->channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($channel->name); ?></h5>
                    <p class="card-text"><?php echo e(count($channel->sessions)); ?> session<?php echo e(count($channel->sessions) !== 1 ? 's' : ''); ?>, <?php echo e(count($channel->rooms)); ?> room<?php echo e(count($channel->rooms) !== 1 ? 's' : ''); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Rooms -->
<div id="rooms" class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Rooms</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?php echo e(url('/events/'.$event->slug.'/rooms/create')); ?>" class="btn btn-sm btn-outline-secondary">
                    Create new room
                </a>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive rooms">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Capacity</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $event->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($room->name); ?></td>
            <td><?php echo e($room->capacity); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>