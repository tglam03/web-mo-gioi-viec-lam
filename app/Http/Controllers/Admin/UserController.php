<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private string $table;
    private object $model;

    public function __construct(){

        $this->model = User::query();
        $this->table = (new User())->getTable();

        View::share('title' , ucwords($this->table));
        View::share('table' , $this->table);
    }

    public function index(){
        $data = $this->model
            ->with('company:id,name')
            ->latest()->paginate(10);

        return view("admin.$this->table.index", [
            'data'  => $data,
        ]);
    }
}
