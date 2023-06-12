<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shows;
use App\Models\Movies;
use Illuminate\Http\Request;

class ShowsController extends Controller
{
    public function show_create(){
        return view('admin.create_show',[
            'movies'=> Movies::where('status','!=','Ended')->get(),
        ]);
    }
    public function create(Request $request){
        // dd($request);
        $formField=$request->validate([
            'movie_id'=>'required',
            'hall_id'=>'required',
            'hour'=>'required',
            'date'=>'required|date',
            'min'=>'required',
            ]);
            $day = Carbon::createFromFormat('Y-m-d', $formField['date'])->format('l');
            $show = Shows::create([
                'movie_id'=>$formField['movie_id'],
                'hall_id'=>$formField['hall_id'],
                'time'=>$formField['hour'].":".$formField['min'] ,
                'date'=>$formField['date'],
                'day'=>$day,
            ]);
            return redirect('/admin/manage_show')->with('message','Success');
    }
    public function edit(Shows $show){
        return view('admin.edit_show',[
            'movies'=> Movies::where('status','!=','Ended')->get(),
            'show'=>$show,
        ]);
    }
    public function update(Request $request, Shows $show){
       
        
    }
    public function delete(Shows $show){
        $show->delete();
        return back()->with('message','Show Deleted Successfully');
    }
    public function manage_show(){
        return view('admin.manage_show',[
            'shows' => Shows::Paginate(20),
            'total_shows' => Shows::count()
        ]);
    }

}
