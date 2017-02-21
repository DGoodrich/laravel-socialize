

<?php $__env->startSection('content'); ?>

    <div class="container spark-screen panel">
        <div class="row bootstrap snippets">

            <?php echo $__env->make('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' => 'Users'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-offset-9 col-md-3 col-sm-5">
                <form method="get" role="form" class="search-form-full">
                    <div class="form-group">
                        <?php echo e(Form::text('s', null, [
                            'id' => 'search-input',
                            'placeholder' => 'Search...',
                            'class' => 'form-control',
                            'onkeyup' => "search_data(this.value, 'result');"
                            ])); ?>

                        <i class="entypo-search"></i>
                    </div>
                </form>
            </div>
        </div>

        <div id="table-results">
            <?php echo $__env->make('users.partials.users', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<script type="text/javascript">
    function search_data(search_value) {
        var search_url = (search_value != '') ? '/user/search/' + search_value : "/user/search/all";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: search_url,
            method: 'GET'
        }).done(function(response){
            $('#table-results').html(response);
        });
    }
</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>