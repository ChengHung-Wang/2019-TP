<?php $__env->startSection('content'); ?>
<div class="border-bottom mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h2"><?php echo e($event->name); ?></h1>
    </div>
    <span class="h6"><?php echo e($event->getFormattedDate()); ?></span>
</div>

<div class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Create new ticket</h2>
    </div>
</div>

<form class="needs-validation" method="POST" action="<?php echo e(url('/events/'.$event->slug.'/tickets')); ?>">
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
        <div class="col-12 col-lg-4 mb-3">
            <label for="selectSpecialValidity">Special Validity</label>
            <select class="form-control<?php echo e($errors->has('special_validity') ? ' is-invalid' : ''); ?>" id="selectSpecialValidity" name="special_validity">
                <option value="">None</option>
                <option value="amount" <?php echo e(old('special_validity') === 'amount' ? 'selected' : ''); ?>>Limited amount</option>
                <option value="date" <?php echo e(old('special_validity') === 'date' ? 'selected' : ''); ?>>Purchaseable till date</option>
            </select>
            <?php if($errors->has('special_validity')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('special_validity')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row special-validity-amount" style="display:none">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputAmount">Maximum amount of tickets to be sold</label>
            <input type="number" class="form-control<?php echo e($errors->has('amount') ? ' is-invalid' : ''); ?>" id="inputAmount" name="amount" placeholder="" value="<?php echo e(old('amount')); ?>">
            <?php if($errors->has('amount')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('amount')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="row special-validity-date" style="display:none">
        <div class="col-12 col-lg-4 mb-3">
            <label for="inputValidTill">Tickets can be sold until</label>
            <input type="text"
                    class="form-control<?php echo e($errors->has('valid_until') ? ' is-invalid' : ''); ?>"
                    id="inputValidTill"
                    name="valid_until"
                    placeholder="yyyy-mm-dd HH:MM"
                    value="<?php echo e(old('valid_until')); ?>">
            <?php if($errors->has('valid_until')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('valid_until')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>

    <hr class="mb-4">
    <button class="btn btn-primary" type="submit">Save ticket</button>
    <a href="<?php echo e(url('/events/'.$event->slug)); ?>" class="btn btn-link">Cancel</a>
</form>
<script>
    const checkSpecialValidity = () => {
        const validity = document.querySelector('select[name="special_validity"]').value;
        document.querySelector('.special-validity-amount').style.display = validity === 'amount' ? 'block' : 'none';
        document.querySelector('.special-validity-date').style.display = validity === 'date' ? 'block' : 'none';
    };

    document.querySelector('select[name="special_validity"]').addEventListener('change', checkSpecialValidity);
    checkSpecialValidity();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>