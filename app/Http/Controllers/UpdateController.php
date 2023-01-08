<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        'name' => 'required | string |min:3|max:100 | unique:vehicle',
     ],
        [
            'name.required' => 'Lūdzu aizpildiet šo lauku!',
            'name.unique' => 'Šāds ceļojuma veids jau eksistē!',
            'name.min' => 'Ceļojuma veida nosaukumam jāsatur vismaz 3 simboli!',
            'name.max' => 'Ceļojuma veida nosaukumam jāsatur ne vairāk par 100 simboliem!',
        ]);
    // Atjaunot informāciju db
    $vehicles = Vehicle::find($request->id);
    $vehicles->name = $request->name;
    // Saglabāt atjaunoto informāciju db
    $res = $vehicles->save();
    //Nosacījumi ko darīt, ja sistemā bija kļūda un ja viss bija labi
    if ($res) {
        return view('Vehicle.show', compact('vehicles'));
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
    public function destroy($id)
    {
        //
    }
}
