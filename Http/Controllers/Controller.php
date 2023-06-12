<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movies;
use App\Models\Tickets;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index () {
        $movies = Movies::all();
        foreach($movies as $movie){
            $release_date=Carbon::parse($movie->release_date);
            $end_date=Carbon::parse($movie->end_date);
        if(Carbon::now()->between($release_date, $end_date)){
            $movie->status="Now Showing" ;
        }
        else if($release_date->isFuture()){
            $movie->status="Coming Soon";
        }
        else if(!$end_date->isFuture()){
            $movie->status="Ended";
        }
        $movie->save();
    }
        return view('dashboard',[
            'nowshowing'=>Movies::where('status','Now Showing')->get(),
            'comingsoon'=>Movies::where('status','Coming Soon')->get(),
            'nowshowingc'=>Movies::where('status','Now Showing')->count(),
            'comingsoonc'=>Movies::where('status','Coming Soon')->count(),
    
        ]);
    }
    public function showTickets () { 
        return view('ticketbookingshow',[
            'tickets'=>Tickets::where('user_id',auth()->user()->id)
            ->where('status', '=', 0)
            ->get(),
    
        ]);
    }
    public function cancleTickets (Tickets $ticket_id) { 
        $ticket=Tickets::where('id',$ticket_id->id)->first();
        $ticket->status=1;
        $ticket->save();
        return back()->with('info','The process for the cancellation of your ticket has begined please wait for sometime.');
    }
} 

