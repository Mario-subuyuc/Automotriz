<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\User;  // Importa el modelo User


class AdminController extends Controller
{
    public function index()
    {
        $total_usuarios = User::count();
        $total_inventarios = Inventario::count();
        $limiteTiempo = Carbon::now()->subSeconds(30)->timestamp;


        // Consultar los usuarios activos en la tabla sessions
        $usuarios = DB::table('sessions')
            ->where('last_activity', '>=', $limiteTiempo)
            ->get();
        $total_online = $usuarios->count();

        return view('admin.index', compact(
            'total_usuarios',
            'total_inventarios',
            'total_online'
        ));
    }
}
