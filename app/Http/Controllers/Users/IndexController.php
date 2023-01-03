<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Users\UpdateUserRequest;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ('User.Index', compact('users'));
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
       $request->validate([
        'username'=>'required|min:5|unique:users',
        'firstName'=>'required',
        'lastName'=>'required',
        'email'=>'required|unique:users|email:dns',
        'password'=>'required|min:8|max:18'
       ],
           [
            'firstName.required'=>'Lūdzu aizpildiet šo lauku!',
            'lastName.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.min'=>'Lietotāja vārdam jāsatur vismaz 5 simboli!',
            'username.unique'=>'Lietotājs ar šādu lietotāja vārdu jau eksistē, lūdzu ievadiet citu lietotāja vārdu!',
            'email.required'=>'Lūdzu aizpildiet šo lauku!',
            //'email.dns'=>'E-pasta adresei jāsatur @ simbols!',
            'email.unique'=>'Lietotājs ar šādu epastu jau eksistē!',

       ]);
       $data['password'] = Hash::make($data['password']);
       User::firstOrCreate(['username'=>$data['username']],['email'=>$data['email']], $data);
       //return redirect('AddNewUser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        return view('User.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    { 
        return view('User.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,User $users)
    {
        //$users = auth()->user();
        $data = $request->validated();
        //dd($data);
        $users->update($data);
        return view('User.show', compact('users'));
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
