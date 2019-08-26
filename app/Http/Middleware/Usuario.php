<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

class Usuario
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $rolename = Role::where('id', Auth::user()->role)->firstOrFail();
            if ($rolename->name == "Usuario") {
                return $next($request);
            }else{
                return redirect('/admin/usuarios');
            }   
        }
    }
}
