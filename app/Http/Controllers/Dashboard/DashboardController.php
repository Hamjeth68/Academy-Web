<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{

    public function index() {

        return view('dashboard.dashboard');
    }
}
