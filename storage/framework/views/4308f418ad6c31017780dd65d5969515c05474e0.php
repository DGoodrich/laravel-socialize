<?php if(count($users) > 0): ?>
    <?php foreach($users as $user): ?>
        <div class="member-entry">
            <a href="#" class="member-img">
                <img src="<?php echo e($user->profile_photo_path ? $user->ProfilePhotoBase64() :
                    URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>" class="img-rounded"/>
                <i class="fa fa-forward"></i>
            </a>
            <div class="member-details">
                <h4><?php echo link_to_route('user.show', $user->name, [$user->username]); ?></h4>
                <div class="row info-list">
                    <div class="col-sm-4">
                        <i class="fa fa-user"></i>
                        &#64;<?php echo e($user->username); ?>

                    </div>
                    <div class="col-sm-4">
                        <?php echo $user->gender == 'male'? '<i class="fa fa-mars"></i>' : '<i class="fa fa-venus"></i>'; ?>

                        <a href="#"><?php echo e(ucfirst($user->gender)); ?></a>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-calendar"></i>
                        <?php echo e($user->dob); ?>

                    </div>
                    <div class="clear"></div>
                    <div class="col-sm-4">
                        <i class="fa fa-globe"></i>
                        Test Physical Address
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo e($user->email); ?>" target="_top"><?php echo e($user->email); ?></a>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-phone"></i>
                        Test Phone No
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php echo $users->links(); ?>

<?php endif; ?>