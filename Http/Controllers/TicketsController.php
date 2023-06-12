<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Shows;
use App\Models\Movies;
use App\Mail\Ticket_mail;
use App\Models\Tickets;
use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
Use Mail;

class TicketsController extends Controller
{
    public function sendmail(Shows $shows,Request $request){
        // dd($request);?
        $seats_numbers=[];
        $total=0;
        $qr_detail='';
        // $seat_details = json_decode(urldecode($seat_details));
        // dd($request->seat_details);
        $seat_details=json_decode($request->seat_details);
        // dd($seat_details->seats_no);
        $movie=Movies::where('id',$shows->movie_id)->first();
        foreach($seat_details->seats_no as $i => $seat_no){
            $seats_numbers[]=$seat_no;
            $total+= $seat_details->seat_prices[$i] ;
        }
        $data['email']= auth()->user()->email;
        $data['title']= "Movie Ticket For ".$movie->name;
        $seats_string = implode(',', $seats_numbers);
        

        $qr_detail='Email:'.$data['email'].'. Movie Name: '.$movie->name.'. Seats: '.$seats_string.'. Total Price: £'.$total;
        $data['qr']=  QrCode::generate($qr_detail);
        
        $data['body']= "Below is the your movie ticket for this movie of this time and of this seats.
        Seats:" ;
        $data['seats'] =$seats_numbers;
        $data['total']=$total;
        // dd( QrCode::generate($qr_detail));
        $pdf=PDF::loadview('emails.ticket',$data);
        $data['pdf']=$pdf;
        Mail::to($data['email'])->send(new Ticket_mail($data));
        Tickets::create([
            'seats'=>$seats_string,
            'movie_id'=>$movie->id,
            'hall_id'=>$shows->hall_id,
            'show_id'=>$shows->id,
            'user_id'=>auth()->user()->id,
            'qr_code'=> $qr_detail,            
        ]);
        return redirect('dashboard')->with('message','Ticket Bought Successfully');
    }
    public function show_hall(Shows $shows){
        return view('movies.theater',[
            'shows'=>$shows
        ]);
    }
    public function book_ticket(Request $request,Shows $shows){
        $seats_no=$request->seat;
        // dd($seats);
        $seat_prices=[];

       
        foreach($seats_no as $seat){
            $seat_letter=substr($seat,0,1);
           
            if(in_array($seat_letter,range('A','C'))){
                $seat_prices[]=10;
           }
           elseif(in_array($seat_letter,range('D','F'))){
            $seat_prices[]=15;

           }
           elseif(in_array($seat_letter,range('G','I'))){
            $seat_prices[]=20;
           }
           elseif(in_array($seat_letter,range('J','K'))){
            $seat_prices[]=25;
           }
           elseif($seat_letter=='L'){
            $seat_prices[]=30;
           }
           elseif($seat_letter=='M'){
            $seat_prices[]=35;
           }
           else{
            $seat_prices[]=40;
           }   
        }
       $seat= array(
        'seats_no'=>$seats_no,
        'seat_prices'=>$seat_prices,
       );
       $seat_details= json_encode($seat);
        return view('movies.ticket_sale',[
            'shows'=>$shows,
            
            'seat_details'=>$seat_details
        ]);

    }
    public function ticket_show(){
        return view('admin.ticket_show',[
            'tickets'=> Tickets::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
