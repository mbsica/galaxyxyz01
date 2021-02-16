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
  </div>
</div>

@endsection
