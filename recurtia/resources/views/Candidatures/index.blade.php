<!DOCTYPE html>
<html>
<head>
    <title>Mes candidatures</title>
</head>

<body>

<h1>Mes candidatures</h1>


@forelse($candidatures as $candidature)

<div>

<h3>
{{ $candidature->offre->titre }}
</h3>

<p>
Entreprise :
{{ $candidature->offre->entreprise }}
</p>

<p>
Statut :
{{ $candidature->statut }}
</p>

</div>

<hr>


@empty

<p>
Vous n'avez envoyé aucune candidature.
</p>

@endforelse


</body>
</html>