<?php

namespace App\Http\Controllers;

use App\Models\Coins;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    //
    public function admin(): View
    {
        $coins = Coins::all();
        $users = User::all();
        return view('admin', compact('coins', 'users'));
    }

    public function printUser()
    {
        $users = User::all();
        $pdf = Pdf::loadView('print-user', compact('users'));
        return $pdf->download('users-'. date('Y-m-d-H-i-s') .'.pdf');
    }

    public function printCoin()
    {
        $coins = Coins::all();
        $pdf = Pdf::loadView('print-coin', compact('coins'));
        return $pdf->download('coins-'. date('Y-m-d-H-i-s') .'.pdf');
    }
}
