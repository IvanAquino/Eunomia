<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    /**
     * Show the users home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('panel.users.home');
    }

    /**
     * Show the users create page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Show the users edit page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(User $user)
    {
        return view('panel.users.edit', compact('user'));
    }

}
