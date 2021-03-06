<?php foreach($posts as $post): ?>
<div class="panel panel-default">
    <div class="panel-body">

        <div class="pull-left">
            <div class="comment">
                <div class="avatar">
                    <div style="background-image: url('<?php echo e($post->poster->profile_photo_path ? $post->poster->ProfilePhotoBase64() :
                            URL::asset($post->poster->gender == 'male' ? 'images/male.png' : 'images/female1.jpg')); ?>');">
                    </div>
                </div>
            </div>
        </div>

        <h4>
            <strong><?php echo link_to_route('user.show', $post->poster->name, [$post->poster->username]); ?></strong> –
            <small><small>
                <a href="#" style="text-decoration:none; color:grey;">
                    <i class="fa fa-clock-o" aria-hidden="true"> about <?php echo e(posted_date($post->created_at)); ?></i>
                </a>
            </small></small>
        </h4>

        <div class="navbar-right">
            <div class="dropdown">
                <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" style="float: right;">
                    <li><a href="#"><i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i> <del>Report</del></a></li>
                    <li><a href="#"><i class="fa fa-fw fa-ban" aria-hidden="true"></i> <del>Ignore</del></a></li>
                    <li><a href="#"><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i> <del>Hide</del></a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="#" data-toggle='modal' data-target='#myModal' data-id='<?php echo e($post->id); ?>' data-type='post'>
                            <i class="fa fa-fw fa-trash" aria-hidden="true"></i> Delete
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>

        <div class="post-content">
            <?php echo e($post->body); ?>

        </div>
        <hr>

        <?php if($post->comments->count() && $post->relationLoaded('parentComments')): ?>
            <?php echo $__env->make('post.comments', ['comments' => $post->parentComments], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <div>
            <div class="pull-right btn-group-xs">
                <a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Like</a>
                <a class="btn btn-default btn-xs"><i class="fa fa-retweet" aria-hidden="true"></i> Reshare</a>
                <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Comment</a>
            </div>
            <div class="pull-left">
                <p class="text-muted" style="margin-left:5px;"><i class="fa fa-globe" aria-hidden="true"></i> Public</p>
            </div>
            <br>
        </div>
        <hr>

        <footer>
            <a class="reply">Reply</a>

            <div id="post" class="hidden">
                <?php if(Auth::user()->username == $user->username || $is_following): ?>
                    <?php echo e(Form::model($post, ['route' => ['user.{user}.post.update', $user->username, $post->id, 'parent' => 0], 'method' => 'PATCH'])); ?>

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
<?php endforeach; ?>

<div id="post_links">
    <?php echo $posts->links(); ?>

</div>