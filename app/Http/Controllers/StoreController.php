<?php
//namespace App\Http\Requests\Vehicle\StoreRequest;
namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class StoreController extends Controller
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
        $data = $request->except(['_token']);//lai nav token_id errora
        //$rules = $rules = array(
           // 'name'=> 'required | string |min:3|max:191 | unique:vehicle',
       // );
        //$this->validate($request, $rules);
        $request->validate([
            'name'=>'required | string |min:3|max:100 | unique:vehicle',
        ],
            [
                'name.required'=>'Lūdzu aizpildiet šo lauku!',
                'name.unique'=>'Šāds ceļojuma veids jau eksistē!',

        ]);
        Vehicle::firstOrCreate($data);
        return redirect('Create');
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
