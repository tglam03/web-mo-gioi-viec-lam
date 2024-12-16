<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private string $table;
    private object $model;

    public function __construct()
    {

        $this->model =  new User();
        $this->table = (new User())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(Request $request)
    {
        $selectedRole = $request->get('role');
        $selectedCity = $request->get('city');
        $selectedCompany = $request->get('company');

        $query = $this->model->clone()
            ->with('company:id,name')
            ->latest();

        if (!empty($selectedRole) && $selectedRole !== 'All') {
            $query->where('role', $request->get('role'));
        }
        if (!empty($selectedCity) && $selectedCity !== 'All') {
            $query->where('city', $request->get('city'));
        }
        if (!empty($selectedCompany) && $selectedCompany !== 'All') {
            $query->whereHas('company', function ($q) use ($selectedCompany) {
                return $q->where('id', $selectedCompany);
            });
        }

        $data = $query->paginate();

        // $data = $this->model->clone()
        //     ->when($request->has('role'), function ($q) {
        //         return $q->where('role', request('role'));
        //     })
        //     ->when($request->has('city'), function ($q) {
        //         return $q->where('city', request('city'));
        //     })
        //     ->with('company:id,name')
        //     ->latest()
        //     ->paginate();

        // truy van filter
        $roles = UserRoleEnum::asArray();

        $companies = Company::query()
            ->select('id', 'name')
            ->get();
        // dd($companies->toArray());
        $cities = $this->model->clone()
            ->distinct()
            ->limit(10)
            ->pluck('city');

        return view("admin.$this->table.index", [
            'data'         => $data,
            'roles'        => $roles,
            'cities'       => $cities,
            'companies'    => $companies,
            'selectedRole' => $selectedRole,
            'selectedCity' => $selectedCity,
            'selectedCompany' => $selectedCompany
        ]);
    }

    public function destroy($userId)
    {
        User::destroy($userId);

        return redirect()->back();
    }
}
