@foreach($comments as $comment)
    <div class="post-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-left">
                    <div class="comment">
                        <div class="avatar">
                            <div style="background-image: url('{{ $comment->owner->profile_photo_path ? $comment->owner->ProfilePhotoBase64() :
                            URL::asset($comment->owner->gender == 'male' ? 'images/male.png' : 'images/female1.jpg') }}');">
                            </div>
                        </div>
                    </div>
                </div>
                <h4>
                    <strong>{!! link_to_route('user.show', $comment->owner->name, [$comment->owner->username]) !!}</strong> –
                    <small><small>
                        <a href="#" style="text-decoration:none; color:grey;">
                            <i class="fa fa-clock-o" aria-hidden="true"> about {{ posted_date($comment->created_at) }}</i>
                        </a>
                    </small></small>
                </h4>
                <hr>
                <div class="post-content">
                    {{ $comment->body }}
                </div>

                <footer>
                    <a class="reply">Reply</a>

                    <div id="post" class="hidden">
                        @if(Auth::user()->username == $user->username || $is_following)
                            {{ Form::model($post, ['route' => ['user.{user}.post.update', $user->username, $post->id, 'parent' => $comment->id], 'method' => 'PATCH']) }}
                            {{ Form::bsTextArea('comment', null, ['maxlength' => '255', 'rows' => '2', 'placeholder' => 'Leave a comment...']) }}
                            <div class="form-group text-right">
                                {{Form::button(
                                    '<span class="glyphicon glyphicon-send"></span> Post',
                                    [
                                        'type' => 'submit',
                                        'class' => 'btn btn-default'
                                    ]
                                )}}

                                {{Form::button('<span class="glyphicon glyphicon-remove"></span> Cancel', ['class' => 'btn btn-warning cancel'])}}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                </footer>

            </div>
        </div>
    </div>
    <hr>

    @if($comment->relationLoaded('allRepliesWithOwner'))
        <ul>
            @include('post.comments', ['comments' => $comment->allRepliesWithOwner])
        </ul>
    @endif
@endforeach