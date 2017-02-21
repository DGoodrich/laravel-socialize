@extends('layouts.app')

@section('content')

    <div class="mainbody container-fluid">
        <div class="row">
            @include('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' => link_to('user', 'Users', ['style' => 'color:#4f9fcf']) . ' / ' . $user->username])
            {{Form::hidden('username', $user->username)}}

            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">

                            <div align="center">
                                <div style="background-image: url('{{ $user->profile_photo_path ? $user->ProfilePhotoBase64() :
                                    URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg') }}');"
                                     class="avatar picture">
                                </div>
                            </div>

                            <div class="media-body">
                                <hr>
                                <h3><strong>Bio</strong></h3>
                                {!! nl2br(e($user->bio)) !!}
                                <hr>

                                <h3><strong>Location</strong></h3>
                                <p>Earth</p>
                                <hr>

                                <h3><strong>Gender</strong></h3>
                                <p>{{ ucfirst($user->gender) }}</p>
                                <hr>

                                <h3><strong>Birthday</strong></h3>
                                <p>{{ $user->dob }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <span>
                            <h1 class="panel-title pull-left" style="font-size:30px;">{{ $user->name }}</h1>
                            <div class="dropdown pull-right">

                                @if(Auth::user()->username != $user->username)
                                    @if($is_following)
                                        {!! delete_form(['user.{user}.requests.destroy', $user->username, encrypt($user->id)], 'Unfollow', 'btn btn-danger hidden-xs') !!}
                                    @else
                                        {{ Form::open(['route' => ['user.{user}.requests.store', $user->username], 'name' => 'user_form', 'id' => 'user_form']) }}
                                        {{ Form::button('Follow',['type' => 'submit','class' => 'btn btn-success hidden-xs'])}}
                                        {{ Form::close() }}
                                    @endif
                                @endif
                            </div>
                        </span>

                        <br><br><hr>

                        <span class="pull-left">
                            <a href="#posts" class="btn btn-link" style="text-decoration:none;">
                                <i class="fa fa-weixin fa-lg" aria-hidden="true"></i> Posts <span class="badge">{{ $postsCount }}</span>
                            </a>

                            <a data-toggle='modal' data-target='#followingModal' onclick="setType('following');" class="btn btn-link" style="text-decoration:none;">
                                <i class="fa fa-fw fa-users" aria-hidden="true"></i> Following <span class="badge">{{ $followingCount }}</span>
                            </a>

                            <a data-toggle='modal' data-target='#followingModal' onclick="setType('followers');" class="btn btn-link" style="text-decoration:none;">
                                <i class="fa fa-pied-piper-alt" aria-hidden="true"></i> Followers <span class="badge">{{ $followersCount }}</span>
                            </a>

                        </span>
                        {{--<span class="pull-right">--}}
                            {{--<a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Mention"></i></a>--}}
                            {{--<a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Message"></i></a>--}}
                            {{--<a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Ignore"></i></a>--}}
                        {{--</span>--}}
                    </div>
                </div>
                <hr>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><strong>New Post</strong></h3>

                        @if(Auth::user()->username == $user->username || $is_following)
                            {{ Form::open(['route' => ['user.{user}.post.store', $user->username, $user], 'name' => 'user_form', 'id' => 'user_form']) }}
                            {{ Form::bsTextArea('post', null, ['maxlength' => '255', 'rows' => '2', 'placeholder' => 'Leave a comment...']) }}
                            {{ Form::bsButtonRight('<span class="glyphicon glyphicon-send"></span> Post', ['type' => 'submit', 'class' => 'btn btn-default']) }}
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>

                <div id="posts">
                    @include('post.single', ['user' => $user, 'posts' => $posts])
                </div>

            </div>
        </div>
    </div>

    @include ('modal-box.followers-modal', ['username' => $user->username])

    @include ('modal-box.delete-modal', ['username' => $user->username])

@endsection


@section('javascript_bottom')
    <script src='{{ URL::asset('js/comments.js')}}'></script>
@endsection
