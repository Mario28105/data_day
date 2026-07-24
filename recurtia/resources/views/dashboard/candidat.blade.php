<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Mon Espace Candidat — Recurtia
    </title>


    <style>

        body {

            font-family: Arial, sans-serif;
            background:#f2f5f9;
            margin:0;
            padding:30px;

        }


        .header {

            background:#0F1117;
            color:white;
            padding:25px;
            border-radius:15px;
            margin-bottom:25px;

        }



        .card {

            background:white;
            padding:25px;
            border-radius:15px;

        }



        .offre {

            border:1px solid #ddd;
            padding:20px;
            margin-bottom:15px;
            border-radius:12px;

            display:flex;
            justify-content:space-between;
            align-items:center;

        }



        .offre h3 {

            margin:0;

        }



        .info {

            color:#555;
            font-size:14px;

        }



        .btn {

            background:#1D9E75;
            color:white;
            padding:10px 15px;
            border-radius:8px;
            text-decoration:none;

        }



        .btn:hover {

            background:#0F6E56;

        }



    </style>


</head>


<body>



<div class="header">


    <h1>

        Content de vous revoir,
        {{ Auth::user()->name }} !

    </h1>


    <p>

        Voici les offres disponibles pour vous.

    </p>


</div>




<div class="card">


<h2>

    Offres recommandées

</h2>



@forelse($offres as $offre)



<div class="offre">


    <div>


        <h3>

            {{ $offre->titre }}

        </h3>



        <p class="info">

            {{ $offre->entreprise }}

            -

            {{ $offre->localisation }}

        </p>


    </div>




    <div>


        <a class="btn"
           href="{{ route('offres.show',$offre->id) }}">

            Voir l'offre

        </a>


    </div>



</div>




@empty



<p>

    Aucune offre disponible.

</p>



@endforelse



</div>



</body>

</html>