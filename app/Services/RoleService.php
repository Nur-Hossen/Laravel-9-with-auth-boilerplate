<?php

namespace App\Services;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class RoleService {

    public function getRoleListForIndex($filter_data) {
        $roleQuery = Role::query();
        if(isset($filter_data['name']) && !empty($filter_data['name'])) {
            $roleQuery->where('name','LIKE','%'.$filter_data['name'].'%');
        }
    
        return $roleQuery->orderBy('id','DESC')->paginate(env('ROW_PER_PAGE'));
    }

    public function getLatestRoleList() {
        return Role::latest()->get();
    }
}