<?php $__env->startSection('content'); ?>
<div class="border-bottom mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h2"><?php echo e($event->name); ?></h1>
    </div>
    <span class="h6"><?php echo e($event->getFormattedDate()); ?></span>
</div>

<div class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Create new session</h2>
    </div>
</div>

<form class="needs-validation" method="POST" action="<?php echo e(url('/events/'.$event->slug.'/sessions')); ?>">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="selectType">Type</label>
            <select class="form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" id="selectType" name="type">
                <option value="talk" <?php echo e(old('type', 'talk') === 'talk' ? 'selected' : ''); ?>>Talk</option>
                <option value="workshop" <?php echo e(old('type', 'talk') === 'workshop' ? 'selected' : ''); ?>>Workshop</option>
            </select>
            <?php if($errors->has('type')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('type')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputTitle">Title</label>
            <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
            <input type="text" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" id="inputTitle" name="title" placeholder="" value="<?php echo e(old('title')); ?>">
            <?php if($errors->has('title')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('title')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputSpeaker">Speaker</label>
            <input type="text" class="form-control<?php echo e($errors->has('speaker') ? ' is-invalid' : ''); ?>" id="inputSpeaker" name="speaker" placeholder="" value="<?php echo e(old('speaker')); ?>">
            <?php if($errors->has('speaker')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('speaker')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="selectRoom">Room</label>
            <select class="form-control<?php echo e($errors->has('room') ? ' is-invalid' : ''); ?>" id="selectRoom" name="room">
                <?php $__currentLoopData = $event->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($room->id); ?>" <?php echo e(old('room') == $room->id ? 'selected' : ''); ?>><?php echo e($room->name); ?> / <?php echo e($room->channel->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('room')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('room')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputCost">Cost</label>
            <input type="number" class="form-control<?php echo e($errors->has('cost') ? ' is-invalid' : ''); ?>" id="inputCost" name="cost" placeholder="" value="<?php echo e(old('cost')); ?>">
            <?php if($errors->has('cost')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('cost')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <label for="inputStart">Start</label>
            <input type="text"
                    class="form-control<?php echo e($errors->has('start') ? ' is-invalid' : ''); ?>"
                    id="inputStart"
                    name="start"
                    placeholder="yyyy-mm-dd HH:MM"
                    value="<?php echo e(old('start')); ?>">
            <?php if($errors->has('start')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('start')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="col-12 col-lg-6 mb-3">
            <label for="inputEnd">End</label>
            <input type="text"
                    class="form-control<?php echo e($errors->has('end') ? ' is-invalid' : ''); ?>"
                    id="inputEnd"
                    name="end"
                    placeholder="yyyy-mm-dd HH:MM"
                    value="<?php echo e(old('end')); ?>">
            <?php if($errors->has('end')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('end')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-3">
            <label for="textareaDescription">Description</label>
            <textarea class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" id="textareaDescription" name="description" placeholder="" rows="5"><?php echo e(old('description')); ?></textarea>
            <?php if($errors->has('description')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('description')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <hr class="mb-4">
    <button class="btn btn-primary" type="submit">Save session</button>
    <a href="<?php echo e(url('/events/'.$event->slug)); ?>" class="btn btn-link">Cancel</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>