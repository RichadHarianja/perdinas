<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;

class ValidatePermissionForPengajuan
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
        

        if(!$pengajuan && $request->route('id'))
            return redirect()->route('pengajuan.index')->with('error', 'Data pengajuan tidak ditemukan');

        if($pengajuan){
            if($pengajuan->pengaju_id != $user->id && $user->role_id == 2){
                return redirect()->route('pengajuan.index')->with('error', 'Tidak dapat mengakses data pengajuan');;
            }
        }

        return $next($request);
    }
}
