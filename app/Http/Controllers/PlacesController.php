<?php

namespace App\Http\Controllers;
use App\User;
use App\Vehicle;//category
use App\Places;//topic
use App\Post;//discussion
use Auth;
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
        return view('places', array('vehicle' => Vehicle::orderBy('id')->get(), 'places' => Places::orderBy('vehicle_id')->get(), 'posts' => Posts::orderBy('places_id')->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places_create', array('vehicles' => Vehicle::all()->sortBy('id')->pluck('name','id')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = $rules = array(
            'name' => 'required|min:3|max:191|unique:places',
            'description' => 'required|min:3',
            'vehicle' => 'required|exists:vehicles,id',
        );
        $this->validate($request, $rules);

        $places = new Place();
        $places->name = $data['name'];
        $places->description = $data['description'];
        $places->vehicle()->associate(Vehicle::find($data['vehicle']));
        $places->save();
        return redirect()->action('PlacesController@show', array($places->id))->withMessage((trans('sentence.addedPlacesMessage'))); 
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
