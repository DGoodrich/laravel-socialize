<?php $__env->startSection('content'); ?>

    <div class="container-fluid spark-screen">
        <div class="row panel">

            <div class="col-md-2" style="background-color: #EEEEEE; margin-top: -20px; padding-top: 20px">
                <?php echo $__env->make('admin.partials.side-nav', ['user' => Auth::user()], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="col-md-9 dashboard-content">
                <div class="card-box table-responsive">
                    <h4 class="header-title m-t-0 m-b-30">Admin Users</h4>
                    <?php echo e(Form::open(['route' => $route, 'name' => 'user_form', 'id' => 'user_form'])); ?>

                    <?php echo e(Form::hidden('page', $page)); ?>


                    <table class="table table-hover data-table table-striped table-responsive" style="width:100%">
                        <thead>
                        <tr>
                            <th class="min-mobile" style="width:5%;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                            <th class="min-mobile">User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="min-mobile">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($users as $user): ?>
                            <tr role="row" class="odd">
                                <td><input type="checkbox" name="user[]" value="<?php echo e($user->id); ?>"></td>
                                <td class="sorting_1"><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php foreach($user->roles()->pluck('name') as $role): ?>
                                        <?php echo e(ucfirst($role)); ?>

                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <a href="/user/<?php echo e($user->username); ?>/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                    <i data-toggle="modal" data-target="#removeModal" data-url="<?php echo e(route('user.destroy', ['user' => $user->id])); ?>"
                                       class="fa fa-trash-o remove-row"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php echo e(Form::close()); ?>

                </div>
            </div>

        </div>
    </div>

    <?php echo $__env->make('modal-box.remove-modal', ['route' => 'user.destroy'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript_bottom'); ?>
    <script src='<?php echo e(URL::asset('js/datatables/userDataTables.js')); ?>'></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>