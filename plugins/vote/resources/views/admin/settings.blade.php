@extends('admin.layouts.admin')

@section('title', trans('vote::admin.settings.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('vote.admin.settings') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="topPlayersCount">{{ trans('vote::admin.settings.count') }}</label>
                    <input type="number" class="form-control" id="topPlayersCount" name="top-players-count" min="5" max="100" value="{{ $topPlayersCount }}" required="required">
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="displayRewards" name="display-rewards" @if(display_rewards()) checked @endif>
                        <label class="custom-control-label" for="displayRewards">{{ trans('vote::admin.settings.display-rewards') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="ipCompatibility" name="ip-compatibility" @if($ipCompatibility) checked @endif aria-describedby="ipCompatibilityLabel">
                        <label class="custom-control-label" for="ipCompatibility">{{ trans('vote::admin.settings.ip-compatibility') }}</label>
                    </div>
                    <small id="ipCompatibilityLabel" class="form-text">{{ trans('vote::admin.settings.ip-compatibility-info') }}</small>
                </div>

                <div class="form-group">
                    <label>{{ trans('vote::admin.settings.commands') }}</label>

                    @include('vote::admin.elements.commands', ['commands' => $commands])
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>

            </form>

        </div>
    </div>
@endsection
