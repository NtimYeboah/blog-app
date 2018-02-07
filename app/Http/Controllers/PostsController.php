<?php

namespace App\Http\Controllers;

use App\Post;
use App\Draft;

class PostsController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Draft::published()->with('user')->paginate();

        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Draft $draft)
    {
        try {
            app(Post::class)->add($draft);
        } catch (\Exception $e) {
            logger()->error('An error occurred whiles publishing a draft', [
                'file' => $e->getFile(),
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]);

            return back()->withError('Couldn\'t publish draft. Please try again');
        }

        flash()->success('Draft successfully published');

        return redirect()->route('posts.index');
    }

    /**
     * Show a single post.
     *
     * @param Post $post
     * @return void
     */
    public function show(Post $post)
    {
        $post = $post->draft;

        return view('posts.show', compact('post'));
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
