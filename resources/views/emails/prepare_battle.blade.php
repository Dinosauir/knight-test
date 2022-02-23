<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container-sm">
    <h5>Hello princess {{ $princess->name }}</h5>
    <h6>The following knights of the {{ $princess->kingdom->name }} are requesting a fight for your hand</h6>
    <div class="alert alert-danger">
        <p>You need to reject one of the following knights !</p>
        <p style="color:red"> You can reject only 1 knight!</p>

    </div>

    @foreach($invitations as $invitation)
        <div class="row">
            <div class="col-md-9">
                <p>{{ $invitation->knight->name }} virtue score: {{ $invitation->knight->virtue_score }} </p>
            </div>
            <div class="col-md-3">
                <a href="{{ route('invitation.reject',$invitation->token) }}">
                    <button class="btn btn-primary"> Reject</button>
                </a>
            </div>
        </div>
    @endforeach

    Thanks,
    {{ config('app.name') }}
</div>


