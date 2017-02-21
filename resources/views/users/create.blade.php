@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @include('partials.breadcrumbs', ['title' => 'Create New User',
                    'icon' => 'user', 'breadcrumb' => link_to('user', 'Users', ['style' => 'color:#4f9fcf']) . ' / ' . 'Create User'])

                <div class="panel panel-default">
                    <div class="panel-heading">Add A New User</div>
                    <div class="panel-body">
                        {{ Form::open(['route' => 'user.store', 'name' => 'user_form', 'id' => 'user_form']) }}

                            @include ('users.partials.form')

                            <footer class="text-right">
                                {{Form::button(
                                    '<span class="glyphicon glyphicon-user"></span> Create User',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default']
                                 )}}
                            </footer>

                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop