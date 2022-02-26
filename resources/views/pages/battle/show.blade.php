@extends('layouts.base')

@push('scripts')
    <script src="{{ asset('js/battle/showBattle.js') }}"></script>
    <script defer>
        $("#show-log").initBattleClass();

        $('#begin-battle').on('click', (e) => {
            e.preventDefault();
            $(this).showLogs('{{route('battle.battle',$battleInvitation->id) }}');
        });
    </script>
@endpush
@section('content')
    <div class="row py-5">
        <div class="col-md-12">
            <h3 class="text-center">Welcome to battle {{ $battleInvitation->id }}</h3>
        </div>

        <div class="row">
            @foreach($final_models as $final_model)
                <div class="col-md-6 text-center">
                    <h5> First Battleable Type: <span class="text-danger">{{ class_basename($final_model) }}</span></h5>
                    <p class="my-0">Name: {{ $final_model->name }}</p>
                    <p class="my-0">Age: {{ $final_model->age }}</p>
                    <div class="alert alert-warning">
                        <h5>Attributes</h5>
                        @foreach($final_model->attributes as $attribute)
                            <p class="m-0">{{ $attribute->name }}: {{ $attribute->pivot->value }}</p>
                        @endforeach
                    </div>
                    <div class="alert alert-danger">
                        <h5>Virtues:</h5>
                        @foreach($final_model->virtues as $virtue)
                            <p class="m-0">{{ $virtue->name }}: {{ $virtue->pivot->value }}</p>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="col-md-12 mx-auto d-none" id="show-log">
                <div class="alert alert-info">
                    <h4 class="py-0 my-0">
                        {Battlelog}:
                    </h4>
                    <hr>
                </div>
            </div>
            <div class="col-md-12 py-5">
                <button class="btn btn-warning m-auto d-flex" id="begin-battle" type="button">Begin battle!</button>
            </div>
        </div>
    </div>
@endsection
