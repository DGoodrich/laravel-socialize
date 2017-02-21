<?php $__env->startSection('content'); ?>
    <div class='post'>
        <h2 class='post_title'><?php echo e($post->title); ?></h2>
        <p class='post_body'><?php echo e($post->body); ?></p>
    </div>

    <div class='comments'>
        <h3 class='comment_header'>
            <?php echo e($count = $post->comments->count()); ?> Comments
        </h3>

        <?php if($count && $post->relationLoaded('parentComments')): ?>
            <?php echo $__env->make('post.comments', ['comments' => $post->parentComments], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>