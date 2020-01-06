<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\BookableTemplate;
use App\Bookable; // Schedule

class BookableController extends Controller
{   



    public function __construct()
    {
        $this->middleware(['auth_admin','allow_on_bookable_schedule']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookables = Bookable::where('business_id', auth('admin')->user()->business_id )
                                            ->withCount('reservations')
                                            ->with('bookableTemplate')
                                            ->latest()
                                            ->get();
        dd($bookables);
        // dd($bookables);
        return view( 'admin.bookable.index' ,compact('bookables'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //used in select form
        $templates = BookableTemplate::where('business_id' , auth('admin')->user()->business_id )
                                    ->available()
                                    ->get();
        // dd( $templates);                    
        return view( 'admin.bookable.create' ,  compact('templates'));

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
         // return "zzz";
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'poster' => 'nullable|image',

            'description' => 'required|min:10',
            'template_id' => 'required|exists:bookable_templates,id',

            'start_at' => 'required|date|after:today',
            'end_at' => 'required|date|after:start_at',
        ]);

        // dd( $request->all() );

        $admin = auth('admin')->user();
        $data = $request->all();


        // dd($admin->business_id);
        $data['business_id'] = $admin->business_id;
        $data['bookable_template_id'] = $data['template_id'];

        if($request->hasfile('poster')){ 
          $file = $request->file('poster');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename =time().'.'.$extension;
          $file->move('images/bookable-posters/', $filename);
          $data['image'] = $filename;
            // dd("may image");
          

        }
            // dd("WALANG image");


        $new_bookable = $admin->bookables()->create( $data );



        return redirect()->route('admin.bookable.index' )->with('success', ['New bookable schedule added.']);


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
