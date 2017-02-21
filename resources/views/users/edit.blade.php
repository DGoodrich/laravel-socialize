@extends('layouts.app')

@section('content')

    <div class="container spark-screen">
        @include('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' =>
            link_to_route('user.index', 'Users', [$user->username], ['style' => 'color:#4f9fcf']) . ' / ' .
            link_to_route('user.show', $user->username, [$user->username], ['style' => 'color:#4f9fcf']) . ' / settings'])

        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['user.update', $user->username], 'method' => 'PATCH', 'files' => true]) !!}

                            <div class="row">
                                <div class="col-md-3 profile-picture-box-container text-center">
                                    <legend>Profile Picture</legend>
                                    <div style="background-image: url('{{ $user->profile_photo_path ? $user->ProfilePhotoBase64() :
                                        URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg') }}');"
                                         class="profile-picture-box"></div>
                                    <hr>

                                    <div class="form-group">
                                        {{ Form::label('picture') }}
                                        {{ Form::file('picture', ['class'=> 'hidden-file-input', 'data-image-output' => '.profile-picture-box', 'data-image-crop' => 'true']) }}

                                        <div class="input-group">
                                            {{ Form::text(NULL, NULL, ['class' => 'form-control', 'placeholder' => 'Choose File...', 'disabled']) }}
                                            <span class="input-group-btn">
                                                {{ Form::button('Browse...', ['class' => 'btn btn-default call-upload', 'data-target' => '#picture']) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <legend class="text-center">Profile Info</legend>

                                    @include ('users.partials.form')


                                </div>
                            </div>

                            <hr>

                            <footer class="text-right">
                                {{Form::button(
                                    '<span class="glyphicon glyphicon-user"></span> Update User',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default']
                                 )}}

                                {{ Form::button(
                                    '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Account',
                                    [
                                        'class' => 'btn btn-danger',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#myModal'
                                    ]
                                 )}}
                            </footer>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Image Modal --}}
    <div id="pic-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <img id="crop" src=""/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="set-image" type="button" class="btn btn-default" data-dismiss="modal">Set Image</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    @include ('modal-box.delete-modal')

@endsection