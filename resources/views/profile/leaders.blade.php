@extends('layouts.app')

@section('title', 'LeaderBoard | GalaxyNetwork')

@section('content')
@include('elements.serverinfo')

<div style="height: 15px"></div> 
<div class="container content pl-0 pr-0">
    <div class="row">
        <div class="col-md-4 pb-4">
            <div class="accordion" id="accordionExample">
                <div class="card"  style="border-bottom: 1px solid rgba(118, 118, 118, 0.405)">
                    <div class="card-header package-games" id="headFactions">
                      <img src="{{URL::asset('/assets/img/factions.png')}}" alt="">
                      <a class="btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFactions" aria-expanded="false" aria-controls="collapseFactions">
                          Factions
                      </a>
                    </div>
                  </div>
                  <div class="card"  style="border-bottom: 1px solid rgba(118, 118, 118, 0.405)">
                    <div class="card-header package-games" id="headSky">
                      <img src="{{URL::asset('/assets/img/skyblock1.png')}}" alt="">
                      <a class="btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseSky" aria-expanded="false" aria-controls="collapseSky">
                          Skyblock
                      </a>
                    </div>
                  </div>
                  <div class="card" style="border-bottom: 1px solid rgba(118, 118, 118, 0.405)">
                    <div class="card-header package-games" id="headingOne">
                      <img src="{{URL::asset('/assets/img/spawner3.png')}}" alt="">
                      <a class="btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Prison 
                        </a>
                      </div>
                  </div>
                <div class="card" style="border-bottom: 1px solid rgba(118, 118, 118, 0.405)">
                  <div class="card-header package-games" id="headingTwo">
                    <img src="{{URL::asset('/assets/img/grass-block.png')}}" alt="">
                    <a class="btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Survival
                    </a>
                    </div>
                </div>
                <div class="card" style="border-bottom: 1px solid rgba(118, 118, 118, 0.405)">
                  <div class="card-header package-games" id="headingThree">
                      <img src="{{URL::asset('/assets/img/omegatrainer.png')}}" alt="">
                      <a class="btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        PubG 
                      </a>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                here
            </div>
        </div>
    </div>
    </div>

@endsection
