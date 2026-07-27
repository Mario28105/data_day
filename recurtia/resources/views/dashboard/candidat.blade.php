<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Candidat - Recurtia</title>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<style>


*{
    box-sizing:border-box;
}


body{

    margin:0;

    font-family:Arial, sans-serif;

    background:#f2f5f9;

    color:#111827;

}



/* SIDEBAR */

.db-sidebar{

    position:fixed;

    left:0;
    top:0;

    width:260px;

    height:100vh;

    background:#0F1117;

    color:white;

}



.db-sidebar-inner{

    padding:25px;

}



.db-logo{

    color:white;

    font-size:26px;

    font-weight:bold;

    text-decoration:none;

}


.db-logo-dot{

    color:#1D9E75;

}



.db-user-card{

    margin-top:30px;

    background:#1b1f27;

    padding:15px;

    border-radius:15px;

    display:flex;

    gap:15px;

    align-items:center;

}



.db-user-avatar{

    width:45px;

    height:45px;

    border-radius:50%;

    background:#1D9E75;

    display:flex;

    justify-content:center;

    align-items:center;

    font-weight:bold;

}



.db-user-name{

    font-weight:bold;

    display:block;

}



.db-user-role{

    color:#aaa;

    font-size:13px;

}





.db-nav{

    margin-top:30px;

}



.db-nav-section-label{

    color:#777;

    font-size:12px;

    margin:20px 0 10px;

    display:block;

}



.db-nav-link{

    display:flex;

    align-items:center;

    gap:10px;

    padding:12px;

    width:100%;

    color:#ddd;

    text-decoration:none;

    border-radius:10px;

    margin-bottom:5px;

}



.db-nav-link:hover,
.active{

    background:#1D9E75;

    color:white;

}



button.db-nav-link{

    background:none;

    border:none;

    cursor:pointer;

    text-align:left;

}





/* MAIN */


.db-main{

    margin-left:260px;

}



.db-topbar{

    height:70px;

    background:white;

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:0 30px;

}



.db-mode-indicator{

    margin-left:15px;

    background:#e6f7f1;

    color:#0F6E56;

    padding:7px 15px;

    border-radius:20px;

}



.btn-home{


    display:flex;

    align-items:center;

    gap:8px;

    background:#1D9E75;

    color:white;

    padding:10px 18px;

    border-radius:12px;

    text-decoration:none;

    font-weight:bold;


}



.btn-home:hover{

    background:#157a5b;

}




.db-content{

    padding:30px;

}



.db-welcome{


    background:#0F1117;

    color:white;

    padding:30px;

    border-radius:20px;


}



.db-card{


    margin-top:25px;

    background:white;

    padding:25px;

    border-radius:20px;


}




.db-match-item{


    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:15px;

    border:1px solid #ddd;

    border-radius:12px;

    margin-top:15px;


}



.btn{


    background:#1D9E75;

    color:white;

    padding:8px 15px;

    border-radius:10px;

    text-decoration:none;


}



</style>


</head>


<body>



<!-- SIDEBAR -->

<div class="db-sidebar">


<div class="db-sidebar-inner">



<a href="{{route('dashboard')}}" class="db-logo">

Recurtia<span class="db-logo-dot">.</span>

</a>




<div class="db-user-card">


<div class="db-user-avatar">

{{ strtoupper(substr(Auth::user()->name,0,2)) }}

</div>



<div>


<span class="db-user-name">

{{Auth::user()->name}}

</span>


<span class="db-user-role">

Candidat

</span>


</div>


</div>






<nav class="db-nav">



<span class="db-nav-section-label">

Espace Personnel

</span>



<a href="{{route('dashboard')}}" class="db-nav-link active">

<i class="material-icons">
dashboard
</i>

Dashboard

</a>




<a href="{{route('dashboard')}}" class="db-nav-link">

<i class="material-icons">
star
</i>

Mes Matchs

</a>





<a href="{{route('candidatures.index')}}" class="db-nav-link">

<i class="material-icons">
work
</i>

Mes candidatures

</a>






<span class="db-nav-section-label">

Compte

</span>




<a href="{{route('profile.edit')}}" class="db-nav-link">


<i class="material-icons">
account_circle
</i>

Mon Profil


</a>






<form method="POST" action="{{route('logout')}}">

@csrf


<button class="db-nav-link">


<i class="material-icons">

exit_to_app

</i>


Déconnexion


</button>


</form>



</nav>


</div>


</div>







<!-- CONTENU -->


<div class="db-main">



<div class="db-topbar">


<div>


<strong>
Mon espace
</strong>


<span class="db-mode-indicator">

Candidat

</span>


</div>





<a href="{{route('home')}}" class="btn-home">

<i class="material-icons">

home

</i>

Accueil

</a>



</div>








<div class="db-content">


<div class="db-welcome">


<h1>

Content de vous revoir {{Auth::user()->name}} !

</h1>


<p>

Votre profil est complété à <strong>85%</strong>

</p>



</div>







<div class="db-card">


<h2>

Offres recommandées

</h2>




@forelse($offres as $offre)


<div class="db-match-item">


<div>


<strong>

{{$offre->titre}}

</strong>


<p>

{{$offre->entreprise}}

-

{{$offre->localisation}}

</p>


</div>




<a href="{{route('offres.show',$offre->id)}}" class="btn">

Postuler

</a>



</div>



@empty


<p>

Aucune offre disponible

</p>



@endforelse



</div>



</div>


</div>



</body>

</html>