<?php $__env->startSection('content'); ?>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php echo $__env->make('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' =>
                        link_to_route('user.index', 'Users', [$user->username], ['style' => 'color:#4f9fcf']) . ' / ' .
                        link_to_route('user.show', $user->username, [$user->username], ['style' => 'color:#4f9fcf']) . ' / requests'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if($results->count()): ?>

                        <?php foreach($results as $request): ?>

                            <table class="table table-hover table-striped">
                                <tbody>

                                    <tr>
                                        <td>
                                            <a href="#"><i class="-alt fa fa-2x fa-eye fa-fw"></i></a>
                                        </td>

                                        <td>
                                            <h4><b><?php echo e($request->created_at); ?></b></h4>
                                            <p>&#64;<?php echo e($request->username); ?></p>
                                        </td>

                                        <td>
                                            <img src="<?php echo e($request->profile_photo_path ? $request->ProfilePhotoBase64() :
                                                URL::asset($request->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>" class="img-circle" width="60" />
                                        </td>

                                        <td>
                                            <h4><b><?php echo e($request->name); ?></b></h4>
                                            <a href="mailto:<?php echo e($request->email); ?>"><?php echo e($request->email); ?></a>
                                        </td>

                                        <td>
                                            <?php echo e($request->followers()->count()); ?> Followers
                                        </td>

                                        <td>
                                            <?php echo e(Form::bsAcceptRejectButtons('user.{user}.requests.update', $request->username, encrypt($request->id))); ?>


                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        <?php endforeach; ?>

                        <?php echo $__env->make('modal-box.remove-modal', ['route' => 'user.{user}.requests.destroy'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php else: ?>
                        You currently do not have any following request available at this time.
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>