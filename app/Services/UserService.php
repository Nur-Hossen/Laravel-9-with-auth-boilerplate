<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserService {
    
    public function getUserListForIndex($filter_data) {
        $userQuery = User::query();
        if(isset($filter_data['name']) && !empty($filter_data['name'])) {
            $userQuery->where('name','LIKE','%'.$filter_data['name'].'%');
            $userQuery->orWhere('username','LIKE','%'.$filter_data['name'].'%');
            $userQuery->orWhere('email','LIKE','%'.$filter_data['name'].'%');
        }
        if(isset($filter_data['role']) && !empty($filter_data['role'])) {
            $userQuery->role($filter_data['role']);
        }
        return $userQuery->latest()->paginate(env('ROW_PER_PAGE'));
    }
}