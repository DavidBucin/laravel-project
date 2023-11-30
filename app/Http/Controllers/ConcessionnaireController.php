<?php

namespace App\Http\Controllers;

use App\Models\Concessionnaire;
use App\Models\Vehicule;

use App\Models\Post;
use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConcessionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concessionnaires = Concessionnaire::all();
        //dd($concessionnaires);
        return view('concessionnaire.index', compact('concessionnaires'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concessionnaire.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            // 'user_id' =>'required',
            'name' => 'required',
            'content' => 'required',
            'photo' => 'required|image:jpg,png,jpeg,gif,svg|max:2048'



            //'auteur' => 'required'

        ]);


        $concessionnaire = new Concessionnaire;
        $concessionnaire->name = $request->input('name');
        $concessionnaire->content = $request->input('content');
        $concessionnaire->user_id = Auth::id();

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . "." . $extention;
            $file->move('public/images/', $filename);
            $concessionnaire->photo = $filename;
        }


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
        $concessionnaire->save();
        return redirect('/')->with('success', 'concessionnaire Ajouté avec succès');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concessionnaire = Concessionnaire::findOrFail($id);
        return view('concessionnaire.show', compact('concessionnaire'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concessionnaire = Concessionnaire::findOrFail($id);

        return view('concessionnaire.edit', compact('concessionnaire'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required',
            'content' => 'required',
            'photo' => 'required|image:jpg,png,jpeg,gif,svg|max:2048'
            
        ]);

        $concessionnaire = concessionnaire::findOrFail($id);
        $concessionnaire->name = $request->get('name');
        $concessionnaire->content = $request->get('content');
        

        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . "." . $extention;
            $file->move(public_path('public/images'), $filename);
            $concessionnaire->photo = $filename;
        }

        $concessionnaire->update();

        return redirect('/')->with('success', 'concessionnaire Modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concessionnaire = Concessionnaire::findOrFail($id);
        $concessionnaire->delete();

        return redirect('/')->with('success', 'concessionnaire Supprimé avec succès');

    }

    /*    public function apropos()
   {
          return view('apropos');

       } */
}
