<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        //retrive all reclamations
        $reclamations = Reclamation::all();
        
        //return view with reclamations
        $stats = [
            'traité' => 0,
            'en attente' => 0,
            'en cours' => 0,

        ];
        foreach ($reclamations as $reclamation) {
            switch($reclamation->state){
                case 'Terminé':
                    $stats['traité']++;
                    break;
                case 'En attente':
                    $stats['en attente']++;
                    break;
                case 'En cours':
                    $stats['en cours']++;
                    break;
                default:
                    break;    
            }
        }
        return view('pages.stats_index', compact('stats'));
    }
}
