<?php $__env->startSection('stylesheets'); ?>
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('partials._breadcrumbs', ['title' => 'Dashboard', 'icon' => 'dashboard', 'breadcrumb' => 'Dashboard'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials/panel', ['color' => 'blue', 'icon' => 'user', 'nbr' => $users, 'name' => 'new-registers', 'url' => 'user', 'total' => 'users'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials/panel', ['color' => 'green', 'icon' => 'comment', 'nbr' => ['total' => 1, 'new' => 0], 'name' => 'new-comments', 'url' => 'comment', 'total' => 'comments'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials/panel', ['color' => 'yellow', 'icon' => 'pencil', 'nbr' => ['total' => 1, 'new' => 0], 'name' => 'new-posts', 'url' => 'blog', 'total' => 'posts'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="col-lg-4 col-md-6">
        <div class='widget widget--2x1'>
            <header class='widget-header'>
                <div class='widget-header-indicator'></div>
            </header>
            <div class='widget-content'>
                <canvas id='donut' width='200px'></canvas>
                <ul class='value-list'>
                    <li>
                        <div class='description'>
                            Issuance
                        </div>
                        <div class='value'>
                            <span>101,342</span>
                            <span class='positive small'>
                                10.8%
                            </span>
                        </div>
                    </li>
                    <li>
                        <div class='description'>
                            Redemption
                        </div>
                        <div class='value'>
                            <span>55,342</span>
                            <span class='negative small'>
                                2.8%
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <footer class='widget-footer'>
                <a class='fa fa-trash-o'></a>
                <a class='fa fa-cog'></a>
            </footer>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class='widget widget--2x1'>
            <header class='widget-header'>
                <div class='widget-header-indicator'></div>
            </header>
            <div class='widget-content'>
                <canvas height='160px' id='line' width='480px'></canvas>
            </div>
            <footer class='widget-footer'>
                <a class='fa fa-trash-o'></a>
                <a class='fa fa-cog'></a>
            </footer>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript_bottom'); ?>
    <script src='<?php echo e(URL::asset('js/Chart.min.js')); ?>'></script>

    <script src="<?php echo e(URL::asset('js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>