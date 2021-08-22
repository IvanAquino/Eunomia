<?php

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('panel.general.home'), route('home'));
});

/*
 * Clients
 */
Breadcrumbs::for('clients.home', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('panel.clients.clients'), route('clients.home'));
});
Breadcrumbs::for('clients.create', function (BreadcrumbTrail $trail) {
    $trail->parent('clients.home');
    $trail->push(__('panel.clients.create_client'), route('clients.create'));
});
Breadcrumbs::for('clients.edit', function (BreadcrumbTrail $trail, Client $client) {
    $trail->parent('clients.home');
    $trail->push(__('panel.clients.edit_client'), route('clients.edit', ['client' => $client->id]));
});

/*
 * Projects
 */
Breadcrumbs::for('projects.home', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('panel.projects.projects'), route('projects.home'));
});
Breadcrumbs::for('projects.create', function (BreadcrumbTrail $trail) {
    $trail->parent('projects.home');
    $trail->push(__('panel.projects.create_project'), route('projects.create'));
});
Breadcrumbs::for('projects.edit', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects.home');
    $trail->push(__('panel.projects.edit_project'), route('projects.edit', ['project' => $project->id]));
});
Breadcrumbs::for('projects.details', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects.home');
    $trail->push(__('panel.general.details'), route('projects.details', ['project' => $project->id]));
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