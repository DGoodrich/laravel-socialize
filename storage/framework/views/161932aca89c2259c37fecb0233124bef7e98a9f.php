<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>Socialize</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>

    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/jquery-ui.css')); ?>">
        <link href="<?php echo e(URL::asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('css/main.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('css/font-awesome-animation.min.css')); ?>" rel="stylesheet">
        <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>


        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/responsive.bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/dataTables.bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/comments.css')); ?>">
        <link href="<?php echo e(URL::asset('css/cropper.css')); ?>" rel="stylesheet">

        <?php echo $__env->yieldContent('stylesheets'); ?>

    <!-- Javascript -->
        <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-1.12.4.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery-ui.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/cropper.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/main.js')); ?>"></script>


        <!-- DataTables -->
        <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.dataTables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/dataTables.bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/dataTables.responsive.min.js')); ?>"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/buttons.dataTables.min.css')); ?>">
        <script type="text/javascript" src="<?php echo e(URL::asset('js/dataTables.buttons.min.js')); ?>"></script>

        <?php echo $__env->yieldContent('javascript_top'); ?>

        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
    </head>
    <body id="app-layout">

        <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->yieldContent('javascript_bottom'); ?>

        <!-- JavaScripts -->
        <?php /*<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>*/ ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
    </body>
</html>
