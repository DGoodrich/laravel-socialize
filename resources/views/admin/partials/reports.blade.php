<div class="panel panel-default">
    <div class="panel-heading"><h4>Reports</h4></div>
    <div class="panel-body">

        <small>Posts This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-placement="top"
                 title="{{ $postTotals['new'] }} new posts"
                 style="width: {{ percentage($postTotals['total'], $postTotals['new']) }}%">
            </div>
        </div>
        <small>New Users This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-placement="top"
                 title="{{ $usersTotals['new'] }} new users"
                 style="width: {{ percentage($usersTotals['total'], $usersTotals['new']) }}%">
            </div>
        </div>
        <small>Following Requests This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-placement="top"
                 title="{{ $followingRequestsTotals['currentMonthTotal'] }} Following Request Accepted"
                 style="width: {{ percentage($followingRequestsTotals['lastMonthTotal'], $followingRequestsTotals['currentMonthTotal']) }}%">
            </div>
        </div>
        <small>Users Banned This Month</small>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" data-toggle="tooltip" data-placement="top"
                 title="{{ $bannedTotals['currentMonthTotal'] }} users banned"
                 style="width: {{ percentage($bannedTotals['lastMonthTotal'], $bannedTotals['currentMonthTotal']) }}%">
            </div>
        </div>

    </div>
</div>