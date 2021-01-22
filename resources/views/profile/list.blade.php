@extends('layouts.app')

@section('title', trans('messages.member'))

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
                <a href="donators"><li class="list-group-item">Donators <span class="badge badge-secondary">0</span></li></a>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Created</th>
                <th>Last Online</th>
                <th>Status</th>
              </tr>
            </thead>
            <input class="form-control" type="text" id="userInput1" onkeyup="searchUser()" placeholder="Search for names.." title="Type in a name">
            <tbody id="myTable11">
                @foreach ($players as $player)
                    <tr>
                        <td>
                            <img class="member-icon pr-2" src="{{ $player->getAvatar() }}" alt="">
                            {{ $player->name }}
                        </td>
                        <td>
                            <h2 class="h4 mb-0">
                                <span class="badge" style="{{ $player->role->getBadgeStyle() }}; vertical-align: middle">{{ $player->role->name }}</span>
                            </h2>
                        </td>
                        <td>{{ $player->created_at->format('Y M j') }}</td>
                        <td>{{ $player->last_login_at }}</td>
                        <td>
                            @if ($player->isOnline())
                                <div class="badge badge-success">Online</div> 
                            @else 
                            <div class="badge badge-danger">Offline</div> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
<script>
    function searchUser() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("userInput1");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable11");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>

@endsection
