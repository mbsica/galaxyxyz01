@extends('layouts.app')

@section('title', 'Staffs')

@section('content')
@include('elements.serverinfo')
<div class="h4 deco-h pt-3 pb-3"><span> <span class="text-red">Players</span> List</span></div>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header d-flex">
                <div class="before-icon"><i class="fas fa-users"></i></div>
                <div class="p3">Members</div>
            </div>
            <ul class="list-group">
                <a href="players"><li class="list-group-item">All Players <span class="badge badge-secondary">{{ $players->count() }}</span></li></a>
                <a href="staffs"><li class="list-group-item">Staffs <span class="badge badge-secondary">2</span></li></a>
                <a href="#"><li class="list-group-item">Donators <span class="badge badge-secondary">0</span></li></a>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Эзэд</div>
            <div class="card-body">
                <div class="d-flex">
                    @foreach ($owners as $owner)
                        <div class="d-flex staff-listmember">
                            <img class="member-icon pr-2" src="{{ $owner->getAvatar() }}" alt="">
                            <div class="pl-2" style="margin-top: -5px">
                                <a href="#">{{ $owner->name }}</a>
                                <span class="d-block" style="margin-top: -10px">{{ $owner->role->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="h-15"></div>
        <div class="card">
            <div class="card-header">Хөгжүүлэгчид</div>
            <div class="card-body">
                <div class="d-flex">
                    @foreach ($developers as $developer)
                        <div class="d-flex staff-listmember">
                            <img class="member-icon pr-2" src="{{ $developer->getAvatar() }}" alt="">
                            <div class="pl-2" style="margin-top: -5px">
                                <a href="#">{{ $developer->name }}</a>
                                <span class="d-block" style="margin-top: -10px">{{ $developer->role->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="h-15"></div>
        <div class="card">
            <div class="card-header">Ахлах модераторууд</div>
            <div class="card-body">
                <div class="d-flex">
                    @foreach ($srmods as $srmod)
                        <div class="d-flex staff-listmember">
                            <img class="member-icon pr-2" src="{{ $srmod->getAvatar() }}" alt="">
                            <div class="pl-2" style="margin-top: -5px">
                                <a href="#">{{ $srmod->name }}</a>
                                <span class="d-block" style="margin-top: -10px">{{ $srmod->role->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="h-15"></div>
        <div class="card">
            <div class="card-header">Модераторууд</div>
            <div class="card-body">
                <div class="d-flex">
                    @foreach ($mods as $mod)
                        <div class="d-flex staff-listmember">
                            <img class="member-icon pr-2" src="{{ $mod->getAvatar() }}" alt="">
                            <div class="pl-2" style="margin-top: -5px">
                                <a href="#">{{ $mod->name }}</a>
                                <span class="d-block" style="margin-top: -10px">{{ $mod->role->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="h-15"></div>
    </div>
</div>

@endsection
