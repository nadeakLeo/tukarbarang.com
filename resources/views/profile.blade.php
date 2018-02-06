@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="profile-panel" class="panel panel-default">
                <img src="{{ asset('img/no-profile.gif') }}" width="120">
                <div id="profile-heading" class="panel-heading">Nama si Anying</div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <td id="profile-info">
                                <h4>Profile Info</h4>
                                <table class="profile-info">
                                    <tr>
                                        <th>Full Name</th>
                                        <td>Still Dummy</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>Still Dummy</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>Still Dummy</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>Still Dummy</td>
                                    </tr>
                                </table>
                            </td>
                            <td class="content">
                                Content Goes here
                            </td>
                    </table>
                </div>
                
                <div id="profile-heading" class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Mee
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
