<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Reservation;
class VerifyTicketController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth_admin','allow_on_verify_ticket']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view( 'admin.verify-ticket' );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request , $code)
    {
        //

        $reservation = Reservation::with('bookable')->where('code',$code)->first();


        if($reservation != null){
            // return $reservation->bookable;
            if( auth('admin')->user()->business->bookables()->where('id', $reservation->bookable->id )->count() > 0 ){

                return response()->json(['success'=> true, 'data'=> $reservation]);

            }else{
                // sa ibang business belong ung qr code
                return response()->json(['success'=> false, 'msg'=>'Invalid Ticket']);
            }

        }else{
            return response()->json(['success'=> false, 'msg'=>'Invalid Ticket']);
        }
        
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
