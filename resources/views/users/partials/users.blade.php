@if(count($users) > 0)
    @foreach($users as $user)
        <div class="member-entry">
            <a href="#" class="member-img">
                <img src="{{ $user->profile_photo_path ? $user->ProfilePhotoBase64() :
                    URL::asset($user->gender == 'male' ? 'images/male.png' : 'images/female1.jpg') }}" class="img-rounded"/>
                <i class="fa fa-forward"></i>
            </a>
            <div class="member-details">
                <h4>{!! link_to_route('user.show', $user->name, [$user->username]) !!}</h4>
                <div class="row info-list">
                    <div class="col-sm-4">
                        <i class="fa fa-user"></i>
                        &#64;{{ $user->username }}
                    </div>
                    <div class="col-sm-4">
                        {!! $user->gender == 'male'? '<i class="fa fa-mars"></i>' : '<i class="fa fa-venus"></i>' !!}
                        <a href="#">{{ ucfirst($user->gender) }}</a>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-calendar"></i>
                        {{ $user->dob }}
                    </div>
                    <div class="clear"></div>
                    <div class="col-sm-4">
                        <i class="fa fa-globe"></i>
                        Test Physical Address
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:{{ $user->email }}" target="_top">{{ $user->email }}</a>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-phone"></i>
                        Test Phone No
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {!! $users->links() !!}
@endif