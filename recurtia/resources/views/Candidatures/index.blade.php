<h1>Mes candidatures</h1>

@foreach($candidatures as $c)

<div class="card p-3 mb-3">

    <h4>
        {{ $c->offre->titre ?? 'Offre supprimée' }}
    </h4>

    <p>
        <strong>Entreprise :</strong>
        {{ $c->offre->entreprise ?? 'N/A' }}
    </p>


    <p>
        <strong>Statut :</strong>
        {{ $c->statut }}
    </p>


    @if($c->cv)

        <a href="{{ asset('storage/'.$c->cv) }}"
           target="_blank"
           class="btn btn-success">
            Voir mon CV
        </a>

    @endif


    <hr>


    <strong>Lettre de motivation :</strong>

    <p>
        {{ $c->lettre_motivation }}
    </p>


</div>

@endforeach