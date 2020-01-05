<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;
use Illuminate\Validation\Rule;
class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth_admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth = auth('admin')->user();
        $business = $auth->business;
        $staffs = $business->admins;

        // dd($staffs->toArray());
        return view( 'admin.staff.index' );

    }

    public function getStaffs()
    {
        //
        $auth = auth('admin')->user();
        $business = $auth->business;
        $staffs = $business->admins; // staffs or admin of the business

        foreach ($staffs as $key => $staff) {
            $staffs[$key]['tagsz'] = $staff->tags()->pluck('name');
        }
        return $staffs;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( 'admin.staff.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store
        // dd($request->all());


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
        ]);

        $auth = auth('admin')->user(); // use to get th business
        $business = $auth->business;


        $data = $request->only('name','email');
        $data['password'] = \Hash::make('admin');

        $new_admin = $business->admins()->create($data);

        $roles = [];
        if($request->has('bookable_schedule')){
            $roles[] = 'bookable_schedule';
        }
        if($request->has('bookable_template')){
            $roles[] = 'bookable_template';
        }
        if($request->has('staff')){
            $roles[] = 'staff';
        }
        if($request->has('verify_ticket')){
            $roles[] = 'verify_ticket';
        }

        if( count($roles) > 0){
            $new_admin->attachTags($roles);
        }
        

        // dd($request->all());


        return redirect()->route('admin.staff.index');
       
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
    public function update(Request $request)
    {
        // return $request->all();

        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:5','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($request->id)],
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['success'=> false, 'errors'=>$validator->errors()->all()]);
        }


        $data = $request->only('name','email');
        // return $data;
        
        // Admin::where('id', $request->id )
        $staff = Admin::find($request->id);
        $staff->update($data);
        $staff->syncTags($request->tagsz);
        
        return response()->json(['success'=> true, 'msg'=>'Staff updated successfully!']);
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
