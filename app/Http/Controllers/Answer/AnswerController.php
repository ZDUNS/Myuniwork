<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

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
                'description' => 'required | string |min:3|max:1000 ',
            ],
            [
                'description.required' => 'Lūdzu aizpildiet šo lauku!',
                'description.min' => 'Atbildei jāsatur vismaz 3 simboli!',
                'description.max' => 'Atbildei jāsatur maksimums 1000 simboli!',

            ]
        );
        $data['user_id'] = Auth::user()->id;
        Answer::create($data);
        return redirect()->route('Posts.show', ['posts' => $data['post_id']]);
        $data['user_id'] = $request->session()->get('loginid');
    }
}
