<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $data = [
            'title' => 'Ana Sayfa',
        ];
        return view('dashboard', $data);
    }
}

