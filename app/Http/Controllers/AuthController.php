<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
     {
        return view("auth.login");
    }

    public function registration() 
    {
        return view("auth.registration");
    }
    public function registerUser(Request $request){
        //echo 'Value posted';
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
            'password.required'=>'Lūdzu aizpildiet šo lauku!',
            'password.min'=>'Parolei jāsatur vismaz 8 simboli',
            'password.max'=>'Parolei jāsatur maksimums 18 simboli',
        ]);
        $users = new User();
        $users->username = $request->username;
        $users->firstName = $request->firstName;
        $users->lastName = $request->lastName;
        $users->email = $request->email;
        $users->password = $request-> password;
        $res=$users->save();
        if($res){
            return back()->with('success', 'Jūs esat veiksmīgi reģistrējušies!');
        }
         else {
            return back()->with('fail', 'Reģistrācija neizdevās');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'username'=>'required||unique:users',
            'password'=>'required|min:8|max:18'
        ]);
        $users = User::where('username', '=', $request->username)->first();
        if ($users) {
            if(hash::check($request->password,$users->password)) {
                Session::put('loginid', $users->user_id);
                return redirect ('welcomeback');
            }
            else
            {
                return back()->with('fail', 'Lietotāja vārds vai parole ir nepareiza!');
        }
     } else{
            return back()->with('fail', 'Lietotāja vārds vai parole ir nepareiza!');

        }
    }
    public function welcomeback(){
        if(Session::has('loginid')){
            return view ('welcomeback');
        }
        else redirect('');
    }
    public function logout(){
        if(Session::has('loginid')){
            Session::pull('loginid');
            return redirect('');
        }
    }
}