<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;

class ValidatePermissionForPencairan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();
        $pengajuan = Pengajuan::find($request->route('id'));
        
        if($user->role_id != 5){
            return redirect()->route('home');
        }

        if($pengajuan){
            if($pengajuan->status_id != 6){
                return redirect()->route('pencairan.index');
            }
        }
        return $next($request);
    }
}
