<?php $__env->startSection('content'); ?>

    <div class="mainbody container-fluid">
        <div class="row">
            <?php echo $__env->make('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' => link_to('user', 'Users', ['style' => 'color:#4f9fcf']) . ' / ' . $user->username], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo e(Form::hidden('username', $user->username)); ?>


            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">

                            <div align="center">
                                <div style="background-image: url('<?php echo e($user->profile_photo_path ? $user->ProfilePhotoBase64() :
                                    URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>');"
                                     class="avatar picture">
                                </div>
                            </div>

                            <div class="media-body">
                                <hr>
                                <h3><strong>Bio</strong></h3>
                                <?php echo nl2br(e($user->bio)); ?>

                                <hr>

                                <h3><strong>Location</strong></h3>
                                <p>Earth</p>
                                <hr>

                                <h3><strong>Gender</strong></h3>
                                <p><?php echo e(ucfirst($user->gender)); ?></p>
                                <hr>

                                <h3><strong>Birthday</strong></h3>
                                <p><?php echo e($user->dob); ?></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <span>
                            <h1 class="panel-title pull-left" style="font-size:30px;"><?php echo e($user->name); ?></h1>
                            <div class="dropdown pull-right">

                                <?php if(Auth::user()->username != $user->username): ?>
                                    <?php if($is_following): ?>
                                        <?php echo delete_form(['user.{user}.requests.destroy', $user->username, encrypt($user->id)], 'Unfollow', 'btn btn-danger hidden-xs'); ?>

                                    <?php else: ?>
                                        <?php echo e(Form::open(['route' => ['user.{user}.requests.store', $user->username], 'name' => 'user_form', 'id' => 'user_form'])); ?>

                                        <?php echo e(Form::button('Follow',['type' => 'submit','class' => 'btn btn-success hidden-xs'])); ?>

                                        <?php echo e(Form::close()); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </span>

                        <br><br><hr>

                        <span class="pull-left">
                            <a href="#posts" class="btn btn-link" style="text-decoration:none;">
                                <i class="fa fa-weixin fa-lg" aria-hidden="true"></i> Posts <span class="badge"><?php echo e($postsCount); ?></span>
                            </a>

                            <a data-toggle='modal' data-target='#followingModal' onclick="setType('following');" class="btn btn-link" style="text-decoration:none;">
                                <i class="fa fa-fw fa-users" aria-hidden="true"></i> Following <span class="badge"><?php echo e($followingCount); ?></span>
                            </a>

                            <a data-toggle='modal' data-target='#followingModal' onclick="setType('followers');" class="btn btn-link" style="text-decoration:none;">
                                <i class="fa fa-pied-piper-alt" aria-hidden="true"></i> Followers <span class="badge"><?php echo e($followersCount); ?></span>
                            </a>

                        </span>
                        <?php /*<span class="pull-right">*/ ?>
                            <?php /*<a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Mention"></i></a>*/ ?>
                            <?php /*<a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Message"></i></a>*/ ?>
                            <?php /*<a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ignore"></i></a>*/ ?>
                        <?php /*</span>*/ ?>
                    </div>
                </div>
                <hr>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><strong>New Post</strong></h3>

                        <?php if(Auth::user()->username == $user->username || $is_following): ?>
                            <?php echo e(Form::open(['route' => ['user.{user}.post.store', $user->username, $user], 'name' => 'user_form', 'id' => 'user_form'])); ?>

                            <?php echo e(Form::bsTextArea('post', null, ['maxlength' => '255', 'rows' => '2', 'placeholder' => 'Leave a comment...'])); ?>

                            <?php echo e(Form::bsButtonRight('<span class="glyphicon glyphicon-send"></span> Post', ['type' => 'submit', 'class' => 'btn btn-default'])); ?>

                            <?php echo e(Form::close()); ?>

                        <?php endif; ?>
                    </div>
                </div>

                <div id="posts">
                    <?php echo $__env->make('post.single', ['user' => $user, 'posts' => $posts], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

            </div>
        </div>
    </div>

    <?php echo $__env->make('modal-box.followers-modal', ['username' => $user->username], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('modal-box.delete-modal', ['username' => $user->username], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript_bottom'); ?>
    <script src='<?php echo e(URL::asset('js/comments.js')); ?>'></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>