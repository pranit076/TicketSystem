<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    public function index(){
        $movies=Movies::all();
        return view('movies.movieshow',[
            'movies'=>$movies
        ]);
    }
    public function shows($movie_id){
        $detail=Movies::where('id',$movie_id)->first();
        return view('movies.shows',[
            'detail'=>$detail
        ]);
    }
    public function show_create(){
        return view('admin.create_movie');
    }
    public function create(Request $request){
        // dd($request);
        $formField=$request->validate([
        'name'=>'required',
        'poster'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        'genre'=>'required',
        'description'=>'required',
        'release_date'=>'required|date|before:end_date',
        'end_date'=>'required|date',
        'hour'=>'required',
        'min'=>'required',

       
        ]);
        
        // dd('hello');
        // $posterPath=  $request->file('poster')->store('public/movies/poster');
        $release_date=Carbon::parse($request->release_date);
        $end_date=Carbon::parse($request->end_date);
        if($request->hasfile('poster')){
            $posterName = time() . '.' . $request->file('poster')->extension();
            $request->poster->storeAs('public/movies/poster', $posterName);
            $posterPath = 'storage/movies/poster/' . $posterName;
        // dd($request);
        }
        if($request->has('genre')!=NULL){
            $formField['genre'] = implode(",", $request->genre);

            
        }

       if(Carbon::now()->between($release_date, $end_date)){
            $status="Now Showing" ;
        }
        else if($release_date->isFuture()){
            $status="Coming Soon";
        }
        else if(!$end_date->isFuture()){
            $status="Ended";
        }
       
        
        Movies::create([
        'name'=>$request->name,
        'poster'=>$posterPath,
        'genre'=>$formField['genre'],
        'description'=>$request->description,
        'release_date'=>$request->release_date,
        'end_date'=>$request->end_date,
        'duration'=>$request->hour.'hrs '.$request->min.'min',
        'status'=>$status,
        ]);
       return redirect('/admin/manage_movie')->with('message','Success');
    }
    public function edit(Movies $movie){
        return view('admin.edit_movie',[
            'movie'=>$movie,
        ]);
    }
    public function update(Request $request, Movies $movie){
        // dd($request);
        $movie_detail=$request->validate([
            'name'=>'required',
            'genre'=>'required',
            'description'=>'required',
            'release_date'=>'required',
            'end_date'=>'required',
            

          
            ]);
            if($request->hasfile('poster')){
                $movie_detail['poster'] = time() . '.' . $request->file('poster')->extension();
                $request->poster->storeAs('public/movies/poster', $movie_detail['poster']);
            // dd($request);
            }
            else{
                $movie_detail['poster']=$movie->poster;
            }
            
            $duration=explode(' ',$movie->duration);
            $hrs = str_replace('hrs','',$duration[0]);
            $min = str_replace('min','',$duration[1]);
        
            if($request->has('hour')|| $request->has('min') ){
                $movie_detail['duration'] = $request->hour.'hrs '.$request->min.'min';
                unset($movie_detail['hour']);
            unset($movie_detail['min']);
            }
            else  if($request->has('hour')){
                $movie_detail['duration'] = $request->hour.'hrs '.$min.'min';
                unset($movie_detail['hour']);
            
            }
            else if($request->has('min')){
                $movie_detail['duration'] = $hrs.'hrs '.$request->min.'min';
                
            unset($movie_detail['min']);
            }
            else{
                $movie_detail['duration'] = $hrs.'hrs '.$min.'min';
            }
            $release_date=Carbon::parse($request->release_date);
        $end_date=Carbon::parse($request->end_date);
            
            if(Carbon::now()->between($release_date, $end_date)){
                $movie_detail['status']="Now Showing" ;
            }
            else if($release_date->isFuture()){
                $movie_detail['status']="Coming Soon";
            }
            else if(!$end_date->isFuture()){
                $movie_detail['status']="Ended";
            }
            $movie->update($movie_detail);
            return redirect('/admin/manage_movie')->with('message','Movie Edited Successfully');
        
    }
    public function delete(Movies $movie){
        $movie->delete();
        return back()->with('message','Movie Deleted Successfully');
    }
// manage user
public function manage_user(){
    return view('admin.manage_user',[
        'users' => User::where('user_type','user')->Paginate(6),
        'total_users' => User::where('user_type','user')->count()
    ]);
}
public function block_user($userId,$status){
    $update_status=User::whereId($userId)->update([
     'status'=>$status,
    ]);
    if($update_status){
     return back()->with('message','User Status Successfully Updated');
    }
    return back()->with('message','User Status Failed to Update');

 }
 public function destroy_user(User $user){
    //Make sure logged in user is owner
    
   $user->delete();
   return back()->with('message','User Deleted Successfully');
}
public function manage_movie(){
    return view('admin.manage_movie',[
        'movies' => Movies::Paginate(20),
        'total_movies' => Movies::count()
    ]);
}

public function moviedetail(Request $request)
{
    $detail = Movies::where('id', $request->input('id'))
        ->first();
    
    return response()->json($detail);
}

public function single(Movies $movie)
{
   
    
    return view('movies.show',[
        'movie'=> $movie,
    ]);
}

}
