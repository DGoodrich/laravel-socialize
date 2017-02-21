<div class="col-lg-4 col-md-6">
    <div class="panel panel-<?php echo e($color); ?>">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <span class="fa fa-<?php echo e($icon); ?> fa-5x"></span>
                </div>
                <div class="col-xs-9 text-right">
                <div class="huge"><?php echo e($nbr['new']); ?></div>
                <div><?php echo e($name); ?></div>
                </div>
            </div>
        </div>
        <a href="<?php echo e($url); ?>">
        <div class="panel-links">
            <span class="pull-left"><?php echo e($nbr['total'] . ' ' . $total); ?></span>
            <span class="pull-right fa fa-arrow-circle-right"></span>
            <div class="clearfix"></div>
        </div>
        </a>
    </div>
</div>