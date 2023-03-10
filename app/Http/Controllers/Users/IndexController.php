<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user();
        return view('User.Index', compact('users'));
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
                'username' => 'required|min:5|max:30|unique:users',
                'firstName' => 'required|min:3|max:60|',
                'lastName' => 'required|min:3|max:60|',
                'email' => 'required|unique:users|email:dns|min:4|max:190',
                //'password' => 'required|min:8|max:18'
            ],
            [
                'firstName.required' => 'Lūdzu aizpildiet šo lauku!',
                'firstName.min' => 'Vārdam jāsatur vismaz 3 simboli!',
                'firstName.max' => 'Vārdam jāsatur ne vairāk par 60 simboliem!',
                'lastName.min' => 'Uzvārdam jāsatur vismaz 3 simboli!',
                'lastName.max' => 'Uzvārdam jāsatur ne vairāk par 60 simboliem!',
                'lastName.required' => 'Lūdzu aizpildiet šo lauku!',
                'username.required' => 'Lūdzu aizpildiet šo lauku!',
                'username.min' => 'Lietotāja vārdam jāsatur vismaz 5 simboli!',
                'username.max' => 'Lietotāja jāsatur ne vairāk par 30 simboliem!',
                'username.unique' => 'Lietotājs ar šādu lietotāja vārdu jau eksistē, lūdzu ievadiet citu lietotāja vārdu!',
                'email.required' => 'Lūdzu aizpildiet šo lauku!',
                'email.email' => 'E-pasta adresei jāsatur @ simbols!',
                'email.unique' => 'Lietotājs ar šādu e-pastu jau eksistē!',
                'email.min' => 'E-pasta adresei jāsatur vismaz 4 simboli!',
                'email.max' => 'E-pasta adresei jāsatur ne vairāk par 190 simboliem!',
                //'password.required' => 'Lūdzu aizpildiet šo lauku!',
                //'password.min' => 'Parolei jāsatur vismaz 8 simboli!',
                //'password.max' => 'Parolei jāsatur ne vairāk par 18 simboliem!',

            ]
        );
        //$data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['username' => $data['username']], ['email' => $data['email']], $data);
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
    public function update(Request $request)
    {
     $request->validate([
        'username'=>'required|min:5|max:30|unique:users,username,'.$request->id,
        'firstName'=>'required|min:3|max:60',
        'lastName'=>'required|min:3|max:60',
        'email'=>'required|min:4|max:190|unique:users,email,'.$request->id,
           //'password'=>'required|min:8|max:18',
     ],
        [
            'firstName.required'=>'Lūdzu aizpildiet šo lauku!',
            'lastName.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.required'=>'Lūdzu aizpildiet šo lauku!',
            'username.min' => 'Lietotāja vārdam jāsatur vismaz 5 simboli!',
            'username.max' => 'Lietotāja jāsatur ne vairāk par 30 simboliem!',
            'email.required'=>'Lūdzu aizpildiet šo lauku!',
            'email.min' => 'E-pasta adresei jāsatur vismaz 4 simboli!',
            'email.max' => 'E-pasta adresei jāsatur ne vairāk par 190 simboliem!',
            'firstName.min' => 'Vārdam jāsatur vismaz 3 simboli!',
            'firstName.max' => 'Vārdam jāsatur ne vairāk par 60 simboliem!',
            'lastName.min' => 'Uzvārdam jāsatur vismaz 3 simboli!',
            'lastName.max' => 'Uzvārdam jāsatur ne vairāk par 60 simboliem!',
            'username.unique'=>'Lietotājs ar šādu lietotāja vārdu jau eksistē, lūdzu ievadiet citu lietotāja vārdu!',
            'email.unique'=>'Lietotājs ar šādu e-pastu jau eksistē!',
            

    ]);
    // Atjaunot lietotāja datus datu bāzē
    $users = User::find($request->id);
    $users->username = $request->username;
    $users->firstName = $request->firstName;
    $users->lastName = $request->lastName;
    $users->email = $request->email;
    // Saglabāt atjaunotā lietotāja datus db
    $res = $users->save();
    // Ja notika kļūda sistēmā, atgriezt paziņojumu, citādāk redirect uz skatu
    if ($res) {
        return view('User.show', compact('users'));
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
    public function destroy(User $users)
    {
        User::find($users);
        $users->forceDelete();
        return view('auth.registration');
    }
}
