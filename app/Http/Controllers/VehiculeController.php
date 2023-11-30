<?php

namespace App\Http\Controllers;

use App\Models\Concessionnaire;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($concessionnaireId)
    {
        //
        ;
        $concessionnaire = Concessionnaire::find($concessionnaireId);

        if (!$concessionnaire) {
            abort(404, 'Concessionnaire not found');
        }

        $vehicules = $concessionnaire->vehicules;
        return view("vehicule.index", compact("vehicules", "concessionnaire"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($concessionnaireId)
    {
        //
        

        $concessionnaire = Concessionnaire::find($concessionnaireId);

        if (!$concessionnaire) {
            abort(404, 'Concessionnaire not found');
        }
    
        return view('vehicule.create', compact('concessionnaire'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $concessionnaireId)
    {
        //

        $request->validate([

            'marque' => 'required',
            'annee' => 'required',
            'couleur' => 'required',
            'prix' => 'required'

        ]);


        $vehicule = new Vehicule;
        $vehicule->marque = $request->input('marque');
        $vehicule->annee = $request->input('annee');
        $vehicule->couleur = $request->input('couleur');
        $vehicule->prix = $request->input('prix');
        $vehicule->concessionnaire_id = $concessionnaireId;
        $vehicule->user_id = Auth::id();

        

        /*
        $concessionnaire = new concessionnaire([
            'user_id' => Auth::id(),
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'photo' => $request->get('photo'),
            // 'auteur' => $request->get('auteur')
        ]);
        */
        

        //$path = $request->file('photo')->store('public/images');
        $vehicule->save();
        return redirect("concessionnaire/vehicule/". $concessionnaireId )->with('success', 'vehicule Ajouté avec succès');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy( $concessionnaireId, $vehiculeId)
    {
        //
        

        $voiture = Vehicule::findOrFail($vehiculeId);

        
        $voiture->delete();

        return redirect('/concessionnaire/vehicule/'. $concessionnaireId)->with('success', 'vehicule Supprimé avec succès');
        /* concessionnaire/vehicule/". $concessionnaireId */
    }
}
