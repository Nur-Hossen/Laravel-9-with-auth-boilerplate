<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Spatie\Permission\Models\Permission;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('home.index'));
});

// ************************* User Breadcrumbs Start *************************************//
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('home.index');
    $trail->push('Users', route('users.index'));
});
 
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('users.index');
 
    $trail->push($user->name, route('users.show', $user));
});
 
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('users.index');
 
    $trail->push('Create', route('users.create'));
});
 
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user): void {
    $trail->parent('users.show', $user);
 
    $trail->push('Edit', route('users.edit', $user));
});
// ************************* User Breadcrumbs End *************************************//
// ************************* Role Breadcrumbs Start *************************************//
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('home.index');
    $trail->push('Roles', route('roles.index'));
});
 
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, Role $role): void {
    $trail->parent('roles.index');
 
    $trail->push($role->name, route('roles.show', $role));
});
 
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('roles.index');
 
    $trail->push('Create', route('roles.create'));
});
 
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, Role $role): void {
    $trail->parent('roles.show', $role);
 
    $trail->push('Edit', route('roles.edit', $role));
});
// ************************* Role Breadcrumbs End *************************************//
// ************************* Permissions Breadcrumbs Start *************************************//
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('home.index');
    $trail->push('Permissions', route('permissions.index'));
});
 
Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, Permission $permission): void {
    $trail->parent('permissions.index');
 
    $trail->push($permission->name, route('permissions.show', $permission));
});
 
Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('permissions.index');
 
    $trail->push('Create', route('permissions.create'));
});
 
Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, Permission $permission): void {
    $trail->parent('permissions.show', $permission);
 
    $trail->push('Edit', route('permissions.edit', $permission));
});
// ************************* Permissions Breadcrumbs End *************************************//

?>