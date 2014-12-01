@extends('layout.default')
@section('content')
<div class="alert alert-info    " role="alert">
    Users
</div>

<div class="row">
    <div class="col-xs-4">
        <div class="list-group">
            @forelse($users as $user)
            <li class='list-group-item'>{{ link_to("/user/{$user->username }",$user->username) }}<span class="pull-right"><a href="/user/{{$user->username }}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></span></li>
            @empty
            <p>No users</p>
            @endforelse
        </div>
    </div>
    <div class='col-xs-4'>
        {{ $data['sidebar1'] }}
    </div>
    <div class='col-xs-4'>
        <?php echo View::make('partials.sidebar2') ?>
    </div>
</div>
@stop

