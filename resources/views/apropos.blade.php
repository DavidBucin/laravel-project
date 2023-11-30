@extends('layouts.app')


@section('content')

<body>
    <div class="container">
        <div class="row">
            <p> <B>David Bucin</B></p>
            <h2>420-5H6 MO Applications Web transactionnelles</h2>
            <h2>Automne 2023, Collège Montmorency</h2>

            <h4> Pour le bon fonctionnement du site :</h4>
            <p>A l'affichage, on peut voir les concessionnaires qui sont présent dans la base de donné. <br />
                Chaque concessionnaire peut avoir plusieurs voitures, mais le contraire est impossible. Ces voitures peuvent être crée ou suprimer.<br />
                L'authentification de compte ainsi que la vérification d'email fonctionne. <br />
                
            </p>

            <h4>Voici le diagramme présente dans ma base de donnée</h4>

            <img src="{{ asset('images/bd/bd.png') }}" alt="bd">


            



        </div>
    </div>
</body>

@endsection