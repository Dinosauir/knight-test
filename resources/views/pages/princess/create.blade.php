@extends('layouts.base')

@section('content')
    <div class="row my-5 p-3 d-flex justify-content-center align-items-center align-content-center m-auto">
        <div class="col-md-6" style="border:1px solid black">
            <form class="row g-3 justify-content-center align-items-center align-content-center p-3"
                  action="{{ route('generate.princess.store')}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="name" class="form-label">Princess name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Princess email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="col-md-12">
                    <label for="kingdom_id" class="form-label">Choose kingdom:</label>
                    <select name="kingdom_id" id="kingdom_id" class="form-control">
                        @foreach($kingdoms as $kingdom)
                            <option value="{{ $kingdom->id }}"> {{ $kingdom->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary d-flex mx-auto">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
