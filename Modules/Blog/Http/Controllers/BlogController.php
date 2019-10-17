<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;
use Modules\Core\Repositories\CoreRepository;
use Modules\Vote\Entities\Vote;

class BlogController extends Controller
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = new CoreRepository($post);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        /*$post = new Post();
        $post->name = 'Example post';
        $post->description = 'Example description';
        $post->save();*/


       /* $vote = new Vote();
        $vote->vote_count = 5;
        $vote->rel_id = 1;
        $vote->rel_type = '\\Modules\\Blog\\Entities\\Post';
        $vote->save();*/

       $post = $this->post->find(1);

       dd($post->getVotes());

       //dd($post->votes()->find(1)->vote_count);

        // return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('blog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
