<div class="panel panel-default">
    <div class="panel-heading"><h4>Reports</h4></div>
    <div class="panel-body">

        <small>Posts This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-placement="top"
                 title="<?php echo e($postTotals['new']); ?> new posts"
                 style="width: <?php echo e(percentage($postTotals['total'], $postTotals['new'])); ?>%">
            </div>
        </div>
        <small>New Users This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-placement="top"
                 title="<?php echo e($usersTotals['new']); ?> new users"
                 style="width: <?php echo e(percentage($usersTotals['total'], $usersTotals['new'])); ?>%">
            </div>
        </div>
        <small>Following Requests This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-placement="top"
                 title="<?php echo e($followingRequestsTotals['currentMonthTotal']); ?> Following Request Accepted"
                 style="width: <?php echo e(percentage($followingRequestsTotals['lastMonthTotal'], $followingRequestsTotals['currentMonthTotal'])); ?>%">
            </div>
        </div>
        <small>Users Banned This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" data-toggle="tooltip" data-placement="top"
                 title="<?php echo e($bannedTotals['currentMonthTotal']); ?> users banned"
                 style="width: <?php echo e(percentage($bannedTotals['lastMonthTotal'], $bannedTotals['currentMonthTotal'])); ?>%">
            </div>
        </div>

    </div>
</div>