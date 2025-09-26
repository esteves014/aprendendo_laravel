<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();

        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])->groupBy('ano')->orderBy('ano', 'asc')->get();

        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        $userLabel = "'Cadastro de Usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);
        // dd($usersData);

        return view('admin.dashboard', compact(['users', 'userLabel', 'userAno', 'userTotal']));
    }
}
