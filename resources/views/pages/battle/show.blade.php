@extends('layouts.base')

@push('scripts')
    <script defer>
        $('#begin-battle').on('click', function (e) {
            e.preventDefault();

            axios.get('{{route('battle.battle',$battleInvitation->id) }}')
                .then((response) => {
                    console.log(response.data.data[0]);
                }).catch(error => {
                console.log(error);
            });
        });

    </script>
@endpush
@section('content')
    <div class="row py-5">
        <div class="col-md-12">
            <h3 class="text-center">Welcome to battle {{ $battleInvitation->id }}</h3>
        </div>

        <div class="row">
            <div class="col-md-6 text-center">
                <h5> First Knight:</h5>
                <p class="my-0">Name: {{ $battleables->first()->name }}</p>
                <p class="my-0">Age: {{ $battleables->first()->age }}</p>
                <div class="alert alert-warning">
                    <h5>Attributes</h5>
                    @foreach($battleables->first()->attributes as $attribute)
                        <p class="m-0">{{ $attribute->name }}: {{ $attribute->pivot->value }}</p>
                    @endforeach
                </div>
                <div class="alert alert-danger">
                    <h5>Virtues:</h5>
                    @foreach($battleables->first()->virtues as $virtue)
                        <p class="m-0">{{ $virtue->name }}: {{ $virtue->pivot->value }}</p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 text-center">
                <h5> Second Knight:</h5>
                <p class="my-0">Name: {{ $battleables->last()->name }}</p>
                <p class="my-0">Age: {{ $battleables->last()->age }}</p>
                <div class="alert alert-warning">
                    <h5>Attributes</h5>
                    @foreach($battleables->last()->attributes as $attribute)
                        <p class="m-0">{{ $attribute->name }}: {{ $attribute->pivot->value }}</p>
                    @endforeach
                </div>
                <div class="alert alert-danger">
                    <h5>Virtues:</h5>
                    @foreach($battleables->last()->virtues as $virtue)
                        <p class="m-0">{{ $virtue->name }}: {{ $virtue->pivot->value }}</p>
                    @endforeach
                </div>
            </div>
{{--            <div class="col-md-12 mx-auto">--}}
{{--                <div class="alert alert-info">--}}
{{--                    @foreach($battles as $battle)--}}
{{--                        <h4 class="py-0 my-0">{Battlelog}: Knight: <span--}}
{{--                                class="text-success">{{ $battle->battleable->name }}</span> {{ $battle->action_type }} {{ $battle->action_value }}--}}
{{--                        </h4>--}}
{{--                        <hr>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-12 py-5">
                <button class="btn btn-warning m-auto d-flex" id="begin-battle" type="button">Begin battle!</button>
            </div>
        </div>
    </div>
@endsection
