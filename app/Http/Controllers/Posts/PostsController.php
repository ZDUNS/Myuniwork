<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use App\Models\Vehicle;
use App\Models\Places;
use App\Http\Controllers\Places\PlacesController;
use App\Http\Controllers\Places\StoreController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\User;
use App\Models\Answer;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $place_id=$request->input('place_id');
        $vehicle_id=$request->input('vehicle_id');
         $posts = Post::query();
        if ($place_id){
           $posts->where('place_id', $place_id);
        }
        if ($vehicle_id){
            $posts->where('vehicle_id', $vehicle_id);
        }
        $places= Places::all();
        $vehicles= Vehicle::all();
        $posts=$posts->get();
       
        return view ('Posts.Index', compact('posts', 'vehicles', 'places', 'place_id', 'vehicle_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle= Vehicle::all();
        $places= Places::all();
        return view('Posts.create', compact('vehicle', 'places'));
        //return view('Posts.create', compact('places'));
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
            'title'=>'required | string |min:3|max:80 | unique:posts',
            'description'=>'required | string |min:3|max:255 ',
            'preview_image'=>'required | file',
            'image'=>'required | file',
            'vehicle_id'=>'required | integer | exists:vehicle,id',
            'place_id'=>'required | integer | exists:places,id',
        ],
            [
                'title.required'=>'Lūdzu aizpildiet šo lauku!',
                'title.unique'=>'Diskusija ar šādu nosaukumu jau eksistē, lūdzu izvēlieties citu nosaukumu!',
                'description.required'=>'Lūdzu aizpildiet šo lauku!',
                'preview_image.required'=>'Lūdzu augšupielādējiet pirmskata attēlu',
                'image.required'=>'Lūdzu augšupielādējiet attēlu',

        ]);
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        $data['user_id'] = $request->session()->get('loginid');
       // $previewImage = $data['preview_image'];
        //$mainImage = $data['image'];
        //$previewImagePath = Storage::put('/image', $previewImage);
        Post::firstOrCreate($data);
       // return redirect('AddNewPost');
       return redirect()->route('Posts.Index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $posts)
    {
        $answers =Answer::where('post_id', $posts->id)->get();
        $user = $posts->user()->first(); //userim izsaucam komandu no post modela, kurs ielades pec id kolonnaa
        $vehicle = $posts->vehicle()->first();
        $place = $posts->place()->first();
        //var_dump($vehicle);
        //die();
        return view('Posts.show',  compact('posts', 'user', 'place', 'vehicle', 'answers'));//['posts'=>$posts, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $posts)
    {
        $vehicle= Vehicle::all();
        $places= Places::all();
        return view('Posts.edit', compact('posts', 'vehicle', 'places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $posts)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        if (isset($data['image'])) {
             $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $posts->update($data);
        return redirect()->route('Posts.show', compact('posts'));//, compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $posts)
    {
        Post::find($posts);
        $posts->forceDelete();
        //$vehicles->delete();
        return redirect()->route('Posts.Index');
    }
}
