@extends('layouts.app')

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row panel">

            <div class="col-md-2" style="background-color: #EEEEEE; margin-top: -20px; padding-top: 20px">
                @include('admin.partials.side-nav', ['user' => Auth::user()])
            </div>

            <div class="col-md-9 dashboard-content">
                <div class="card-box table-responsive">
                    <h4 class="header-title m-t-0 m-b-30">Admin Users</h4>

                    <table class="table table-hover data-table table-striped table-responsive" style="width:100%">
                        <thead>
                        <tr>
                            <th class="min-mobile">User</th>
                            <th class="min-mobile">Email</th>
                            <th class="min-mobile">Role</th>
                            <th class="min-mobile">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr role="row">
                                    <td class="sorting_1">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles()->pluck('name') as $role)
                                            {{ ucfirst($role) }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="/user/{{ $user->username }}/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <i data-toggle="modal" data-target="#removeModal" data-url="{{ route('user.destroy', ['user' => $user->id]) }}"
                                           class="fa fa-trash-o remove-row"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include ('modal-box.remove-modal', ['route' => 'user.destroy'])

        </div>
    </div>
@endsection

@section('javascript_bottom')
    <script src='{{ URL::asset('js/datatables/adminDataTable.js')}}'></script>
@endsection
