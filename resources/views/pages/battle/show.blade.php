@extends('layouts.base')

@push('scripts')
    <script defer>
        $('#begin-battle').on('click', function (e) {
            e.preventDefault();

            axios.get('{{route('battle.result',$battleInvitation->id) }}')
                .then((response) => {
                    console.log(response.data);
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
                <p class="my-0">Name: {{ $knights->first()->name }}</p>
                <p class="my-0">Age: {{ $knights->first()->age }}</p>
                <div class="alert alert-warning">
                    <h5>Attributes</h5>
                    @foreach($knights->first()->attributes as $attribute)
                        <p class="m-0">{{ $attribute->name }}: {{ $attribute->pivot->value }}</p>
                    @endforeach
                </div>
                <div class="alert alert-danger">
                    <h5>Virtues:</h5>
                    @foreach($knights->first()->virtues as $virtue)
                        <p class="m-0">{{ $virtue->name }}: {{ $virtue->pivot->value }}</p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 text-center">
                <h5> Second Knight:</h5>
                <p class="my-0">Name: {{ $knights->last()->name }}</p>
                <p class="my-0">Age: {{ $knights->last()->age }}</p>
                <div class="alert alert-warning">
                    <h5>Attributes</h5>
                    @foreach($knights->last()->attributes as $attribute)
                        <p class="m-0">{{ $attribute->name }}: {{ $attribute->pivot->value }}</p>
                    @endforeach
                </div>
                <div class="alert alert-danger">
                    <h5>Virtues:</h5>
                    @foreach($knights->last()->virtues as $virtue)
                        <p>{{ $virtue->name }}: {{ $virtue->pivot->value }}</p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 py-5">
                <button class="btn btn-warning m-auto d-flex" id="begin-battle" type="button">Begin battle!</button>
            </div>
        </div>

    </div>
@endsection
