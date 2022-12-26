<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Places;
use App\Post;
use App\User;
use App\Answer;
use Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
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
    public function create($id)
    {
        $currentUserID=Auth::id();
        $currentUser = User::findOrFail($currentUserID);
        $post=post::findOrFail($id);
        $places=Places::findOrFail($post->place_id);
        $category=Category::findOrFail($places->vehicle_id);
        if($post->closed==1&&$currentUser->role==1) {
            return redirect()->action('PlacesController@index')->withMessage((trans('sentence.noRightToAnswerDiscussion')));
        }
        return view('answer_create', array( 'vehicle' => $vehicle, 'place' => $places, 'post' => $post, 'answers' => Answer::where('post_id',$post->id)->orderBy('id')->get(), 'currentUser' => $currentUser, 'users' => User::orderBy('id')->get()));
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
            'description' => 'required|min:3',
        );
        $this->validate($request, $rules);

        $post_id=$data['id'];
        $user_id=$data['user_id'];

        $answer = new Answer();
        $answer->description = $data['description'];
        $answer->discussion_id=$discussion_id;
        $answer->user_id=$user_id;
        $answer->save();
        return redirect()->action('PostController@show', array($post_id))->withMessage((trans('sentence.addedAnswer')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
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
        $currentUserID=Auth::id();
        $currentUser = User::findOrFail($currentUserID);
        $answer = Answer::findOrFail($id);
        $post = Discussion::findOrFail($answer->discussion_id);
        if(!(($currentUser->id==$answer->user_id && $discussion->closed==0) || $currentUser->role==2)) {
            return redirect()->action('TopicController@index')->withMessage((trans('sentence.noRightToEditAnswer')));
        }
        return view('answer_edit', array('discussion' => $discussion, 'currentUser' => $currentUser, 'answer' => $answer, 'users' => User::orderBy('id')->get()));
    }

    public function delete($id) {
        $answer = Answer::findOrFail($id);
        $discussion = Discussion::findOrFail($answer->discussion_id);
        $answer->delete();
        return redirect()->action('DiscussionController@show', array($discussion->id))->withMessage((trans('sentence.deletedDiscussion')));
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
