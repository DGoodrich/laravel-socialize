<!-- Modal -->
<div class="modal fade" id="followingModal" role="dialog">
    <div class="modal-dialog modal-md">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">You Are Currently Following These Users.</h4>
            </div>
            <div class="modal-body">
                <form method="get" role="form" class="search-form-full">
                    <div class="form-group">
                        <?php echo e(Form::text('s', null, [
                            'id' => 'search-input',
                            'placeholder' => 'Search...',
                            'class' => 'form-control',
                            'onkeyup' => "getUsers('', this.value);"
                            ])); ?>

                        <i class="entypo-search"></i>
                    </div>
                </form>

                <section id="load">
                    <?php ($results = []); ?>
                    <?php echo $__env->make('users.partials.following', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </section>

            </div>
        </div>
    </div>
</div>