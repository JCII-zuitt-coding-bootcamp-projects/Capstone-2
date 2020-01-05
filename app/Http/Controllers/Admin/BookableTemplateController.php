<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BookableTemplate;



class BookableTemplateController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth_admin');
    }


    public function copy($template_id){

        $to_copy = BookableTemplate::find($template_id);


        // $data['business_id'] = auth('admin')->user()->business_id;

        $new = auth('admin')->user()->bookableTemplates()->create([
            'name' => $to_copy->name . ' Copy',
            'notes' => $to_copy->notes ,
            'category' => $to_copy->category ,
            'admin_id' => auth('admin')->user()->id ,
            'children' => json_encode($to_copy->children) ,
            'bookable' => json_encode($to_copy->bookable) ,
            'total_bookable' => $to_copy->total_bookable ,
            'business_id' => $to_copy->business_id ,

         ]);

        return redirect()->route('admin.bookable.templates.edit' , ['id' => $new->id ])->with('success', ['Template successfully copied.']);
    }

    public function delete($template_id){

        BookableTemplate::destroy($template_id);

        return redirect()->route('admin.bookable.templates.index')->with('success', ['Template successfully deleted.']);
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $templates = auth('admin')->user()->bookableTemplates;
        
        $templates = BookableTemplate::withCount('bookables')
                                    ->where('business_id', auth('admin')->user()->business_id )
                                    ->get();

        // dd($templates);
        return view( 'admin.bookable_template.index' ,compact('templates'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "create temp route";
        return view( 'admin.bookable_template.create' );
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

        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'notes' => 'required',
            'category' => 'required',
        ]);

        // dd();
        // bookableTemplates
        $data = $request->all();
        $data['business_id'] = auth('admin')->user()->business_id;

        $new = auth('admin')->user()->bookableTemplates()->create( $data );

        return redirect()->route('admin.bookable.templates.edit' , ['id' => $new->id ])->with('success', ['New template added successfully.']);
        // return "nuice";

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
        
        if ( BookableTemplate::where('id' , $id )->exists() ) {
           $template_id =  $id;
            return view('admin.bookable_template.edit',compact('template_id'));

        }else{
            return redirect()->route('admin.bookable.templates.create');
            // abort(404);
        }
        

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


    public function getTemplateData($id)
    {
        return BookableTemplate::find($id);
        // return "nice:" . $id;
    }

    public function updateTemplateData(Request $request, $id)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:5',
            'notes' => 'required',
            'category' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['success'=> false, 'errors'=>$validator->errors()->all()]);
        }


        // $data = $request->only('name','notes','category');

        // =============
        $newData =  request()->all();

        // dd($newData);
        
        if( is_array($newData['bookable']) ){

            if( count($newData['bookable']) == 0 ){
                 $newData['bookable'] = "{}"; // to avoid saving "[]" in bookable field in database
                 $newData['total_bookable'] = 0;
            }
           
        }

        // dd($newData);
        // BookableTemplate
        // $encodedNewChildrenData =  $newChildrenData;//json_encode()
       
        BookableTemplate::where('id', $id)
                                ->update( $newData ); // children and bookable

        return response()->json(['success'=> true, 'msg'=>'Changes saved!']);

    }

}