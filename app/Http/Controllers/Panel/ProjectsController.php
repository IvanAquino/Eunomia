<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    
    /**
     * Show the projects home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('panel.projects.home');
    }

    /**
     * Show the projects create page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('panel.projects.create');
    }

    /**
     * Show the projects detail page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details(Project $project)
    {
        return view('panel.projects.details', compact('project'));
    }

    /**
     * Show the projects edit page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Project $project)
    {
        return view('panel.projects.edit', compact('project'));
    }

}
