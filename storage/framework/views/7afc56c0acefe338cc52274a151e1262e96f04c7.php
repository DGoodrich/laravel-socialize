<?php foreach($comments as $comment): ?>
    <div class="post-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-left">
                    <div class="comment">
                        <div class="avatar">
                            <div style="background-image: url('<?php echo e($comment->owner->profile_photo_path ? $comment->owner->ProfilePhotoBase64() :
                            URL::asset($comment->owner->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>');">
                            </div>
                        </div>
                    </div>
                </div>
                <h4>
                    <strong><?php echo link_to_route('user.show', $comment->owner->name, [$comment->owner->username]); ?></strong> –
                    <small><small>
                        <a href="#" style="text-decoration:none; color:grey;">
                            <i class="fa fa-clock-o" aria-hidden="true"> about <?php echo e(posted_date($comment->created_at)); ?></i>
                        </a>
                    </small></small>
                </h4>
                <hr>
                <div class="post-content">
                    <?php echo e($comment->body); ?>

                </div>

                <footer>
                    <a class="reply">Reply</a>

                    <div id="post" class="hidden">
                        <?php if(Auth::user()->username == $user->username || $is_following): ?>
                            <?php echo e(Form::model($post, ['route' => ['user.{user}.post.update', $user->username, $post->id, 'parent' => $comment->id], 'method' => 'PATCH'])); ?>

                            <?php echo e(Form::bsTextArea('comment', null, ['maxlength' => '255', 'rows' => '2', 'placeholder' => 'Leave a comment...'])); ?>

                            <div class="form-group text-right">
                                <?php echo e(Form::button(
                                    '<span class="glyphicon glyphicon-send"></span> Post',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default'
                                    ]
                                )); ?>


                                <?php echo e(Form::button('<span class="glyphicon glyphicon-remove"></span> Cancel', ['class' => 'btn btn-warning cancel'])); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        <?php endif; ?>
                    </div>
                </footer>

            </div>
        </div>
    </div>
    <hr>

    <?php if($comment->relationLoaded('allRepliesWithOwner')): ?>
        <ul>
            <?php echo $__env->make('post.comments', ['comments' => $comment->allRepliesWithOwner], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </ul>
    <?php endif; ?>
<?php endforeach; ?>