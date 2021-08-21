<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('panel.general.home'), route('home'));
});

/*
 * Users
 */
Breadcrumbs::for('users.home', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('panel.users.users'), route('users.home'));
});
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.home');
    $trail->push(__('panel.users.create_user'), route('users.create'));
});
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.home');
    $trail->push(__('panel.users.edit_user'), route('users.edit', ['user' => $user->id]));
});