<?php

namespace App\Http\Controllers\Places;

use App\Models\Places;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorePlacesController extends Controller
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
        $data = $request->except(['_token']); //lai nav token_id errora
        $request->validate(
            [
                'name' => 'required | string |min:3|max:100 | unique:places',
            ],
            [
                'name.required'=>'Lūdzu aizpildiet šo lauku!',
                'name.unique'=>'Šāds ceļojuma galamērķis jau eksistē!',
                'name.min'=>'Ceļojuma galamērķim jāsatur vismaz 3 simboli!',
                'name.max'=>'Ceļojuma galamērķim jāsatur ne vairāk par 100 simboliem!',
            ]
        );
        Places::firstOrCreate($data);
        return redirect('AddNewPlace');
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
    public function update(Request $request, $id)
    {
        //
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
