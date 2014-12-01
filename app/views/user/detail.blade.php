@extends('layout.default')
@section('content')
<div class="alert alert-info    " role="alert">
    User's detail
</div>
<div class="row">
    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4 text-center">
                Id:
            </div>
            <div class="">
                {{ $user->id }}
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4 text-center">
                UserName:
            </div>
            <div class="">
                {{ $user->username }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4 text-center">
                Email:
            </div>
            <div class="">
                {{ $user->email }}
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="row">
            <div class="col-xs-4 text-center">
                Contact No:
            </div>
            <div class="">
                {{ $user->contact }}
            </div>
        </div>
    </div>
</div>
@stop

