<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

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
    public function registerUser(Request $request)
    {
        //echo 'Value posted';
        //izveidojam validācijas nosacījumus, un definējam attiecīgās kļūdas nosacījumu neievērošanā.
        $request->validate(
            [
                'username' => 'required|min:5|max:30|unique:users',
                'firstName' => 'required|min:3|max:60|' ,
                'lastName' => 'required|min:3|max:60|',
                'email' => 'required|unique:users|email:dns|min:4|max:190',
                'password' => 'required|min:8|max:18'
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
                'password.required' => 'Lūdzu aizpildiet šo lauku!',
                'password.min' => 'Parolei jāsatur vismaz 8 simboli!',
                'password.max' => 'Parolei jāsatur ne vairāk par 18 simboliem!',
            ]
        );
        $users = new User();
        $users->username = $request->username;
        $users->firstName = $request->firstName;
        $users->lastName = $request->lastName;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $res = $users->save();
        if ($res) {
            return back()->with('success', 'Jūs esat veiksmīgi reģistrējušies!');
        } else {
            return back()->with('fail', 'Reģistrācija neizdevās');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:5|max:30|',
                'password' => 'required|min:8|max:18'
            ],
            [
                'username.required' => 'Lūdzu aizpildiet šo lauku!',
                'password.required' => 'Lūdzu aizpildiet šo lauku!',
                'password.min' => 'Parole ir nepareiza!',
                'password.max' => 'Parole ir nepareiza!',

            ]
        );
        $users = User::where('username', '=', $request->username)->first();
        if ($users) {
            if (Hash::check($request->password, $users->password)) {
                $userId = Auth::login($users);
                $request->session()->put('loginid', $users->id);
                return redirect('welcome');
            } else {
                return back()->with('fail', 'Parole ir nepareiza!');
            }
        } else {
            return back()->with('fail', 'Lietotājs ar šādu lietotāja vārdu neeksistē!');
        }
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function logout()
    {
        if (Session::has('loginid')) {
            Session::pull('loginid');
            return redirect('login');
        }
    }
}
