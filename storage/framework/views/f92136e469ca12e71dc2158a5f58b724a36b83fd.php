<?php $__env->startSection('content'); ?>

    <div class="container-fluid spark-screen">
        <div class="row panel">

            <div class="col-md-2" style="background-color: #EEEEEE; margin-top: -20px; padding-top: 20px">
                <?php echo $__env->make('admin.partials.side-nav', ['user' => Auth::user()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="col-md-9 dashboard-content">
                <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
                <hr>

                <div class="row">
                    <?php echo $__env->make('admin.partials.notices', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="col-md-5">
                        <?php echo $__env->make('admin.partials.reports', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <hr>

                        <?php echo $__env->make('admin.partials.new-requests', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    </div>

                    <div class="col-md-5">
                        <?php /*Visitor Map Plugin*/ ?>
                        <a target="_blank">
                            <script type="text/javascript" id="clustrmaps" src="//cdn.clustrmaps.com/map_v2.js?d=rWb1HiapUB9IrDnJlt3cwRtjp5I-zZbCfuMO9dFHmuM&cl=ffffff&w=a"></script>
                        </a>
                        <hr>

                        <?php echo $__env->make('admin.partials.quick-post', ['user' => Auth::user()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>