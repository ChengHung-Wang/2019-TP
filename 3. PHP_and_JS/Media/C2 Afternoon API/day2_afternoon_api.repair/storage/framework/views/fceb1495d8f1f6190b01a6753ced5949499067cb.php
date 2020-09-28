<?php $__env->startSection('content'); ?>
<div class="border-bottom mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h2"><?php echo e($event->name); ?></h1>
    </div>
    <span class="h6"><?php echo e($event->getFormattedDate()); ?></span>
</div>

<div class="mb-3 pt-3 pb-2">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h2 class="h4">Room Capacity</h2>
    </div>
</div>

<canvas id="myChart" width="400" height="150"></canvas>
<script src="<?php echo e(asset('js/Chart.bundle.min.js')); ?>"></script>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php $__currentLoopData = $event->getSessions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                '<?php echo e($session->title); ?>',
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                label: 'Attendees',
                data: [
                    <?php $__currentLoopData = $event->getSessions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($session->getNumAttendees()); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                backgroundColor: [
                    <?php $__currentLoopData = $event->getSessions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($session->getNumAttendees() <= $session->room->capacity): ?>
                            'rgba(139,195,74,0.5)',
                        <?php else: ?>
                            'rgba(244,67,54,0.5)',
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
            },{
                label: 'Capacity',
                data: [
                    <?php $__currentLoopData = $event->getSessions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($session->room->capacity); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                backgroundColor: [
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                    'rgba(33,150,243,0.5)',
                ],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    gridLines: {
                        display: false,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Capacity',
                        fontSize: 16,
                        padding: 15,
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Sessions',
                        fontSize: 16,
                    },
                    barPercentage: 0.7,
                    gridLines: {
                        lineWidth: 3,
                    }
                }]
            },
            legend: {
                position: 'right',
                labels: {
                    fontSize: 16
                },
            },
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>