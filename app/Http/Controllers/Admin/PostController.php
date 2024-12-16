<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    private string $table;
    private object $model;

    public function __construct()
    {

        $this->model =  Post::query();
        $this->table = (new Post())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }
    public function index() {

        return view('admin.posts.index',)
    }
}
