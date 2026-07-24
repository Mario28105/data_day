<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>
        {{ $offre->titre }}
    </title>

    <style>

        body{
            font-family:Arial;
            background:#f2f5f9;
            padding:40px;
        }


        .card{

            background:white;
            padding:30px;
            border-radius:15px;
            max-width:700px;
            margin:auto;

        }


        input, textarea{

            width:100%;
            padding:10px;
            margin-top:10px;

        }


        button{

            background:#1D9E75;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:8px;
            cursor:pointer;

        }


    </style>

</head>


<body>


<div class="card">


<h1>
{{ $offre->titre }}
</h1>


<p>
Entreprise :
{{ $offre->entreprise }}
</p>


<p>
Localisation :
{{ $offre->localisation }}
</p>


<p>
{{ $offre->description }}
</p>



<hr>


<h2>
Postuler
</h2>



<form action="{{ route('offres.postuler',$offre->id) }}"
      method="POST"
      enctype="multipart/form-data">


@csrf



<label>
CV (PDF)
</label>


<input type="file"
       name="cv"
       accept=".pdf">



<label>
Lettre de motivation
</label>


<textarea 
name="lettre_motivation"
rows="5"></textarea>



<button type="submit">

Envoyer ma candidature

</button>


</form>



</div>


</body>

</html>