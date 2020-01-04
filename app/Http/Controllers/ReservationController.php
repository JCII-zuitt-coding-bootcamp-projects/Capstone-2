<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Bookable;
use App\Reservation;
use App\Payment;


use Illuminate\Support\Str;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservations');
    }

    public function services()
    {
        // // return "nice!";
        // $reservations = Payment::with('bookable.bookableTemplate','reservations')->latest()->get();
        $bookables = Bookable::latest()->get();

        return view('services',compact('bookables'));
    }

    public function getUserReservationsByPayment()
    {
        // return "nice!";
        $reservations = Payment::with('bookable.bookableTemplate','reservations')->latest()->get();

        return $reservations;
    }



    



    //for ajax
    public function getBookableReservations($bookable_id){
        $reservations = Reservation::where('bookable_id',$bookable_id)->pluck('cell_id');
        return $reservations;
    }





    public function newReservation(Request $request){
        // $reservations = Reservation::where('bookable_id',$bookable_id)->pluck('cell_id');
        $cells = $request->seat_cells;
        $bookable_id = $request->bookable_id;

        $bookable = Bookable::with('bookableTemplate')->find($bookable_id);

        // return dd($bookable->bookableTemplate->bookable->c_1_1->price);
        // return $bookable->bookableTemplate->bookable->{$cells[0]}->name;

        //count total price
            $total = 0;
            foreach ($cells as $cell){ 
              $total = $total + (int) $bookable->bookableTemplate->bookable->{$cell}->price;
            } 

        $credits = auth()->user()->credits; // must be from auth user, wala pa kasing field
        if( $credits >= $total){
            //Check if all seats are available
            $taken = $bookable->reservations()
                            ->whereIn('cell_id',$cells)
                            ->count();
            $taken;

            if( $taken > 0){
                $cat = $bookable->bookableTemplate->category;;
                return [
                    'success' => false,
                    'msg' => $taken . ( $taken > 1 ? ' ' . $cat . '/s' : ' ' . $cat ) . ( $taken > 1 ? ' are' : ' is' ) . ' already taken. Please reload the page.'
                ];
            }else{

                //Reserve now......
                // return "OKS";
                $payment = auth()->user()->payments()
                                        ->create([
                                            'total' => $total,
                                            'method' => 'online_payment',
                                            'bookable_id' => $bookable_id
                                        ]);

                //subtract user credits
                auth()->user()->decrement('credits', $total);

                // $reservations_to_insert = [];

                            foreach ($cells as $cell){ 
                              // $total = $total + (int) $bookable->bookableTemplate->bookable->{$cell}->price;
                              // $reservations_to_insert[] = [
                              //                       'bookable_id' => $bookable_id,
                              //                       'user_id' => auth()->user()->id ,
                              //                       'bookable_item_name' => $bookable->bookableTemplate->bookable->{$cell}->name ,
                              //                       'cell_id' => $cell ,
                              //                       'price' => (int) $bookable->bookableTemplate->bookable->{$cell}->price ,
                              //                   ];
                                $payment->reservations()->create([
                                                    'bookable_id' => $bookable_id,
                                                    'user_id' => auth()->user()->id ,
                                                    'bookable_item_name' => $bookable->bookableTemplate->bookable->{$cell}->name ,
                                                    'cell_id' => $cell ,
                                                    'price' => (int) $bookable->bookableTemplate->bookable->{$cell}->price ,
                                                    'code' => Str::random(8)
                                                ]);
                            } 

                // return $reservations;

                // $reservations = $payment->reservations()->create($reservations_to_insert);

                return [
                            'success' => true,
                            'msg' => 'Reservation successfull.'
                        ];

            }

        }else{
            return [
                'success' => false,
                'msg' => 'Insufficient credits.'
            ];
        }
        // return $total;
        // return dd($bookable->bookableTemplate->bookable->c_1_1->price);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
