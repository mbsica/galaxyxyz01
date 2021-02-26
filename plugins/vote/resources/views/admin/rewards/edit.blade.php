@extends('admin.layouts.admin')

@section('title', trans('vote::admin.rewards.title-edit', ['reward' => $reward->name]))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('vote.admin.rewards.update', $reward) }}" method="POST">
                @method('PUT')

                @include('vote::admin.rewards._form')

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ trans('messages.actions.save') }}</button>
                <a href="{{ route('vote.admin.rewards.destroy', $reward) }}" class="btn btn-danger" data-confirm="delete"><i class="fas fa-trash"></i> {{ trans('messages.actions.delete') }}</a>
            </form>
        </div>
    </div>
@endsection
