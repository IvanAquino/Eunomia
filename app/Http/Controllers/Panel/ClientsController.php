<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    
    /**
     * Show the clients home page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('panel.clients.home');
    }

    /**
     * Show the clients create page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('panel.clients.create');
    }

    /**
     * Show the clients edit page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Client $client)
    {
        return view('panel.clients.edit', compact('client'));
    }

}
