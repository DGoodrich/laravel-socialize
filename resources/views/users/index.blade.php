@extends('layouts.app')

@section('content')

    <div class="container spark-screen panel">
        <div class="row bootstrap snippets">

            @include('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' => 'Users'])

            <div class="col-md-offset-9 col-md-3 col-sm-5">
                <form method="get" role="form" class="search-form-full">
                    <div class="form-group">
                        {{ Form::text('s', null, [
                            'id' => 'search-input',
                            'placeholder' => 'Search...',
                            'class' => 'form-control',
                            'onkeyup' => "search_data(this.value, 'result');"
                            ])
                        }}
                        <i class="entypo-search"></i>
                    </div>
                </form>
            </div>
        </div>

        <div id="table-results">
            @include('users.partials.users')
        </div>
    </div>

@stop

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