@extends('layouts.base')

@push('styles')
    <style>
        .green {
            color: limegreen;
        }

        .red {
            color: red;
        }

        button {
            padding: 1px 10px !important;
        }
    </style>
@endpush
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Princess</th>
            <th scope="col">Kingdom</th>
            <th scope="col">Ready</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($battles as $key => $battle)
            <tr>
                <th scope="row">{{ $key }}</th>
                <td>{{ $battle->princess->name }}</td>
                <td>{{ $battle->princess->kingdom->name }}</td>
                <td><span
                        class="{{ $battle->status ===  \App\Modules\BattleModule\BattleInvitation\BattleInvitation::STATUSES['ready'] ? 'green' : 'red'}}">{{ $battle->status }}</span>
                </td>
                <td>
                    <a href="{{ route('battle.show',['id' => $id]) }}">
                        <button class="btn btn-primary">Begin fight</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $battles->links() }}
@endsection
