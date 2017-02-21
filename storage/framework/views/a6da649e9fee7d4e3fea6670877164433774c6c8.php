

<?php $__env->startSection('content'); ?>

    <div class="container spark-screen">
        <?php echo $__env->make('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' =>
            link_to_route('user.index', 'Users', [$user->username], ['style' => 'color:#4f9fcf']) . ' / ' .
            link_to_route('user.show', $user->username, [$user->username], ['style' => 'color:#4f9fcf']) . ' / settings'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <?php echo Form::model($user, ['route' => ['user.update', $user->username], 'method' => 'PATCH', 'files' => true]); ?>


                            <div class="row">
                                <div class="col-md-3 profile-picture-box-container text-center">
                                    <legend>Profile Picture</legend>
                                    <div style="background-image: url('<?php echo e($user->profile_photo_path ? $user->ProfilePhotoBase64() :
                                        URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>');"
                                         class="profile-picture-box"></div>
                                    <hr>

                                    <div class="form-group">
                                        <?php echo e(Form::label('picture')); ?>

                                        <?php echo e(Form::file('picture', ['class'=> 'hidden-file-input', 'data-image-output' => '.profile-picture-box', 'data-image-crop' => 'true'])); ?>


                                        <div class="input-group">
                                            <?php echo e(Form::text(NULL, NULL, ['class' => 'form-control', 'placeholder' => 'Choose File...', 'disabled'])); ?>

                                            <span class="input-group-btn">
                                                <?php echo e(Form::button('Browse...', ['class' => 'btn btn-default call-upload', 'data-target' => '#picture'])); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <legend class="text-center">Profile Info</legend>

                                    <?php echo $__env->make('users.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                                </div>
                            </div>

                            <hr>

                            <footer class="text-right">
                                <?php echo e(Form::button(
                                    '<span class="glyphicon glyphicon-user"></span> Update User',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default']
                                 )); ?>


                                <?php echo e(Form::button(
                                    '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Account',
                                    [
                                        'class' => 'btn btn-danger',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#myModal'
                                    ]
                                 )); ?>

                            </footer>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php /* Image Modal */ ?>
    <div id="pic-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <img id="crop" src=""/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="set-image" type="button" class="btn btn-default" data-dismiss="modal">Set Image</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <?php echo $__env->make('modal-box.delete-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>