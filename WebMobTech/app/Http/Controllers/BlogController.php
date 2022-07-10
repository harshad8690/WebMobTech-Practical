<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request){
        $date = $request->input('date');
        if($date !=  null){
            $tmpData = Post::with('categories')->get(); 
            $categories = [];
            foreach($tmpData as $category){
                $dateFormat = \Carbon\Carbon::parse($category->created_at)->format('Y/m/d');
                if($dateFormat == $date){
                    $categories[] = $category;
                }
            }
            return view('blog.index', compact('categories', 'date'));
        }

        $categories = Post::with('categories')
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('blog.index', compact('categories', 'date'));
    }

    public function create(){
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
        ]);

        $categoryId = $request->category;
        // dd($categoryId);
        // $category = Category::where('id', $categoryId)->first();

        $data = [
            'user_id'  => 1,
            'title'    => $request->title,
            'content'  => $request->content,
        ];

        $postBlog = Post::create($data);
        if($postBlog){
            $postBlog->categories()->sync($categoryId);
        }

        return redirect()->route('blog.index')
                        ->with('success', 'Blog post successfully.');
    }

    public function show($id){
        $post = Post::with('categories')->where('id', $id)->first();
        return view('blog.show', compact('post'));
    }
}

