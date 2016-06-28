<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostAdminController extends Controller
{

    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(5);
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(PostRequest $request)
    {
        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagList($request->tags));

        return redirect()->route('admin.post.index');
    }

    public function edit($id)
    {
        $post=$this->post->find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        $post=$this->post->find($id);
        $post->tags()->sync($this->getTagList($request->tags));

        return redirect()->route('admin.post.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.post.index');
    }

    private function getTagList($tags){
        $tagList = array_filter(array_map('trim',explode(',',$tags)));
        $tagsId =[];
        foreach($tagList as $tag)
        {
            $tagsId[] = Tag::firstOrCreate(['name'=>$tag])->id;
        }
        return $tagsId;
    }
}
