@extends('layouts.app')

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row panel">

            <div class="col-md-2" style="background-color: #EEEEEE; margin-top: -20px; padding-top: 20px">
                @include('admin.partials.side-nav', ['user' => Auth::user()])
            </div>

            <div class="col-md-9 dashboard-content">
                <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> My Dashboard</strong></a>
                <hr>

                <div class="row">
                    @include('admin.partials.notices')

                    <div class="col-md-5">
                        @include('admin.partials.reports')

                        <hr>

                        @include('admin.partials.new-requests')

                    </div>

                    <div class="col-md-5">
                        {{--Visitor Map Plugin--}}
                        <a target="_blank">
                            <script type="text/javascript" id="clustrmaps" src="//cdn.clustrmaps.com/map_v2.js?d=rWb1HiapUB9IrDnJlt3cwRtjp5I-zZbCfuMO9dFHmuM&cl=ffffff&w=a"></script>
                        </a>
                        <hr>

                        @include('admin.partials.quick-post', ['user' => Auth::user()])

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection