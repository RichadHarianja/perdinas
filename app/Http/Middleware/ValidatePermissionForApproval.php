<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;

class ValidatePermissionForApproval
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

        if($user->role_id == 2){
            return redirect()->route('home');
        }

        if($pengajuan){
            if($user->role_id != $pengajuan->status_id || ($user->role_id == 3 && $pengajuan->PUK_id != $user->id ) ){
                return redirect()->route('approval.index');
            }
        }

        return $next($request);
    }
}
