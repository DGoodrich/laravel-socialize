<?php if(count($results) > 0): ?>
    <div id="table-results">
        <div class="row" >
            <?php foreach($results as $user): ?>
                <div class="col-md-6">
                    <div class="member-entry">
                        <a class="member-img">
                            <img src="<?php echo e($user->profile_photo_path ? $user->ProfilePhotoBase64() :
                                URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>" class="avatar picture"/>
                        </a>
                        <div class="member-details">
                            <h4><?php echo link_to_route('user.show', $user->name, [$user->username]); ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="user_links">
        <?php echo $results->links(); ?>

    </div>
<?php endif; ?>
