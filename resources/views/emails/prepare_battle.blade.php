<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div class="container py-5">
    <h5>Hello princess {{ $princess->name }}</h5>
    <h6>The following knights of the {{ $princess->kingdom->name }} are requesting a fight for your hand</h6>
    <div class="alert alert-danger">
        <p>You need to reject one of the following knights !</p>
        <p style="color:red"> You can reject only 1 knight!</p>
    </div>

    @foreach($invitation_items as $invitation_item)
        <div class="row">
            <div class="col-md-9">
                <div class="row my-2">
                    <div class="col-md-3">
                        <img
                            src="https://www.usr.ro/wp-content/uploads/2021/01/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg"
                            alt="profile_pic" width="50" height="50">
                    </div>
                    <div class="col-md-6">
                        <p>{{ $invitation_item->battleable->finalModel->name }} virtue
                            score: {{ $invitation_item->battleable->finalModel->virtue_score }} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="{{ route('invitation.reject',$invitation_item->token) }}">
                    <button class="btn btn-primary"> Reject</button>
                </a>
            </div>
            <hr>
        </div>
    @endforeach

    Thanks,
    {{ config('app.name') }}
</div>
