@extends('layouts.app')

@section('title', trans('messages.games'))

@section('content')
@include('elements.serverinfo')
<div class="h4 deco-h pt-3 pb-3"><span> <span class="text-red">Avalaible</span> Games</span></div>

<div class="container pl-0 pr-0 ">
    <div class="row">
        @foreach($servers as $server)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <a href="">
                            <img src="" alt="">
                        </a>
                        <h6 class="text-center">{{ $server->name }}</h6>
                        @if($server->isOnline())
                            <p class="text-center">Online:{{ trans_choice('admin.servers.players', $server->getOnlinePlayers()) }}</p>
                        @else 
                            <p class="text-center">Сэрвэр унтарсан байна!!!</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
