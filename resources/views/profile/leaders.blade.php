@extends('layouts.app')

@section('title', 'LeaderBoard | GalaxyNetwork')

@section('content')
@include('elements.serverinfo')

<div style="height: 15px"></div> 
<div class="container content pl-0 pr-0">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Аллага</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Тоглосон Цаг</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Блок ухсан</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu3">Мөнгө</a></li>
    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu4">F Top</a></li>
  </ul>
  <div style="height: 15px"></div>
  <div class="tab-content">
    <div id="home" class="tab-pane fade active show">
      <?php $number = 1; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Нэр</th>
            <th scope="col">Үзүүлэлт</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kills as $kill)
          <tr>
            <th scope="row">{{ $number }}</th>
            <td>{{ $kill->name }}</td>
            <td>{{ $kill->stat_value }}</td>
          </tr>
          <?php $number++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="menu1" class="tab-pane fade">
      <?php $number = 1; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Нэр</th>
            <th scope="col">Үзүүлэлт</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($playedhours as $playedhour)
          <tr>
            <th scope="row">{{ $number }}</th>
            <td>{{ $playedhour->name }}</td>
            <td>{{ $playedhour->stat_value }}</td>
          </tr>
          <?php $number++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="menu2" class="tab-pane fade">
      <?php $number = 1; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Нэр</th>
            <th scope="col">Үзүүлэлт</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($blockmines as $blockmine)
          <tr>
            <th scope="row">{{ $number }}</th>
            <td>{{ $blockmine->name }}</td>
            <td>{{ $blockmine->stat_value }}</td>
          </tr>
          <?php $number++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="menu3" class="tab-pane fade">
      <?php $number = 1; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Нэр</th>
            <th scope="col">Үзүүлэлт</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($moneys as $money)
          <tr>
            <th scope="row">{{ $number }}</th>
            <td>{{ $money->name }}</td>
            <td>{{ $money->stat_value }}</td>
          </tr>
          <?php $number++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="menu4" class="tab-pane fade">
      <?php $number = 1; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">F name</th>
            <th scope="col">F Leader</th>
            <th scope="col">Total Worth</th>
            <th scope="col">Spawner Worth</th>
            <th scope="col">Item Worth</th>
            <th scope="col">Block Worth</th>
            <th scope="col">Richest Member</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ftops as $ftop)
          <tr>
            <th scope="row">{{ $number }}</th>
            <td>{{ $ftop->FactionName}}</td>
            <td>{{ $ftop->FactionLeader}}</td>
            <td>{{ $ftop->TotalWorthFormatted}}</td>
            <td>{{ $ftop->SpawnerWorthFormatted}}</td>
            <td>{{ $ftop->ItemWorthFormatted}}</td>
            <td>{{ $ftop->BlockWorthFormatted}}</td>
            <td data-toggle="tooltip" data-placement="top" title="{{ $ftop->RichestMemberBalanceFormatted}}">{{ $ftop->RichestMember}}</td>
          </tr>
          <?php $number++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
