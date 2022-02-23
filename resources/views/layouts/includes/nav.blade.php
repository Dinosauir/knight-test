<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Fight Generator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link " aria-current="page" href="{{ route('generate.kingdom.create') }}">Generate
                    kingdom</a>
                <a class="nav-link " href="{{ route('generate.princess.create') }}">Generate princess</a>
                @if($kingdom = \App\Modules\KingdomModule\Kingdom\Kingdom::first())
                    <a class="nav-link " href="{{ route('generate.knights',$kingdom->name) }}">Generate knights</a>
                    <a class="nav-link " href="{{ route('generate.attribute.create') }}">Generate attributes</a>
                    <a class="nav-link " href="{{ route('generate.virtue.create') }}">Generate virtues</a>
                    <a class="nav-link " href="{{ route('kingdom.prepare-battle',$kingdom->name) }}">Prepare Battle</a>
                    <a class="nav-link " href="{{ route('battle.index') }}">View Battles</a>
                @else
                    <a class="nav-link disabled" href="#">Prepare Battle</a>
                @endif

            </div>
        </div>
    </div>
</nav>
