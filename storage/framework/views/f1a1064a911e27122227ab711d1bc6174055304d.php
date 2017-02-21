<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <h4 class="header-title m-t-0 m-b-30">Admin Users</h4>

                    <table class="table table-hover data-table table-striped table-responsive" style="width:100%">
                        <thead>
                        <tr>
                            <th class="min-mobile">User</th>
                            <th class="min-mobile">Email</th>
                            <th class="min-mobile">Role</th>
                            <th class="min-mobile">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($users as $user): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php foreach($user->roles()->pluck('name') as $role): ?>
                                        <?php echo e(ucfirst($role)); ?>

                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <a href="/user/<?php echo e($user->username); ?>/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $('.data-table').DataTable({
                "order": [[ 0, "asc" ]],
                responsive: true,
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, 100, -1 ],
                    [ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'
                ]
            });

            $(document.body).on('click', '.on-default', function () {
                window.document.location = $(this).data("href");
            });
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>