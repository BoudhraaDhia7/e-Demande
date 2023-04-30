<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Agent;
use App\Models\Shop;
use App\Models\Contact;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $data = Auth::user();
        $report = [];
        $stats = [];
        switch ($data->role) {
            case 2:
                $currentUser = Auth::user();
                break;
            case 3:
        
               
                break;
            case 4:
        
                break;
            default:
                $currentUser = Auth::user();
                break;
        }

            return view('dashboard', compact('currentUser'));
        
    }

    public function statsByDate(Request $request)
    {

        $dateStart = date('Y-m-d', strtotime($request->dateStart)) . ' 00:00:00';
        $dateEnd = date('Y-m-d', strtotime($request->dateEnd)) . ' 00:00:00';
        $transactions = Transaction::select('parent_action', 'amount')
            ->where([
                'username_parent' => Auth::user()->username
            ])->whereBetween('created_at', [$dateStart, $dateEnd])
            ->get();
        // Get Stats amounts in/out
        $amount_in = 0;
        $amount_out = 0;
        foreach ($transactions as $key => $transac) {
            if ($transac->parent_action == 'CREDITER') {
                $amount_out += $transac->amount;
            } else {
                $amount_in += $transac->amount;
            }
        }
        $stats = [
            'amount_in' => number_format($amount_in, 3),
            'amount_out' => number_format($amount_out, 3),
        ];

        return json_encode($stats);
    }
}
