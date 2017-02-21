@extends('layouts.app')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @include('partials.breadcrumbs', ['icon' => 'user', 'breadcrumb' =>
                        link_to_route('user.index', 'Users', [$user->username], ['style' => 'color:#4f9fcf']) . ' / ' .
                        link_to_route('user.show', $user->username, [$user->username], ['style' => 'color:#4f9fcf']) . ' / requests'])

                    @if($results->count())

                        @foreach($results as $request)

                            <table class="table table-hover table-striped">
                                <tbody>

                                    <tr>
                                        <td>
                                            <a href="#"><i class="-alt fa fa-2x fa-eye fa-fw"></i></a>
                                        </td>

                                        <td>
                                            <h4><b>{{ $request->created_at }}</b></h4>
                                            <p>&#64;{{ $request->username }}</p>
                                        </td>

                                        <td>
                                            <img src="{{ $request->profile_photo_path ? $request->ProfilePhotoBase64() :
                                                URL::asset($request->gender == 'male' ? 'images/male.png' : 'images/female1.jpg') }}" class="img-circle" width="60" />
                                        </td>

                                        <td>
                                            <h4><b>{{ $request->name }}</b></h4>
                                            <a href="mailto:{{ $request->email }}">{{ $request->email }}</a>
                                        </td>

                                        <td>
                                            {{ $request->followers()->count() }} Followers
                                        </td>

                                        <td>
                                            {{ Form::bsAcceptRejectButtons('user.{user}.requests.update', $request->username, encrypt($request->id)) }}

                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        @endforeach

                        @include ('modal-box.remove-modal', ['route' => 'user.{user}.requests.destroy'])

                    @else
                        You currently do not have any following request available at this time.
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection