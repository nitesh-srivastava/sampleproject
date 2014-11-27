@extends('layout.default')
@section('content')
<div class="alert alert-info    " role="alert">
    Users
</div>
<div>
    @foreach ($users as $user)
    <li>{{ link_to("/user/{$user->username }",$user->username) }}</li>
    @endforeach    
</div>
@stop

