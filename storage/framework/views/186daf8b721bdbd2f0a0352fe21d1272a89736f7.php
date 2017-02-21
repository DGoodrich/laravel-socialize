<?php if(count($errors) > 0): ?>
    <!-- Form Error List -->
    <div class="alert alert-danger col-md-12">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>
        <div class="form-group">
            <ul>
                <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
