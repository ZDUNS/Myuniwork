<?php

namespace App\Http\Controllers\Places;
use App\Models\Places;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Places::all();
        return view('Places.Index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Places $places)
    {
        return view('Places.show', compact('places'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Places $places)
    {
        return view('Places.edit', compact('places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
     $request->validate([
        'name' => 'required | string |min:3|max:100 | unique:places',
     ],
        [
            'name.required'=>'Lūdzu aizpildiet šo lauku!',
            'name.unique'=>'Šāds ceļojuma galamērķis jau eksistē!',
            'name.min'=>'Ceļojuma galamērķim jāsatur vismaz 3 simboli!',
            'name.max'=>'Ceļojuma galamērķim jāsatur ne vairāk par 100 simboliem!',
        ]);
    // Atjaunot datus datubāzē
    $places = Places::find($request->id);
    $places->name = $request->name;
    // Saglabāt atjaunotā galamerķa datus db
    $res = $places->save();
    // Ja sistemā notiks kaut kas geizi, tiks izvadits paziņojums, citadak atgriezt skatu
    if ($res) {
        return view('Places.show', compact('places'));
    } else {
        return back()->with('fail', 'Kaut kas nogāja greizi!');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Galamērķu dzešana
    public function destroy(Places $places)
    {
        Places::find($places);
        $places->forceDelete();
        return redirect()->route('Places.Index');
    }
}
