<div class="row" style="margin-top: -20px">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <span class="fa fa-<?php echo e($icon); ?>"></span> <?php echo $breadcrumb; ?>

            </li>
        </ol>
    </div>
</div>

<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>