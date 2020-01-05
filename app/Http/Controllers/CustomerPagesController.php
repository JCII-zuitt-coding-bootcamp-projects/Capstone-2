<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bookable;
class CustomerPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function reserve($bookable_id)
    {   
        // dd($bookable_id);
        $bookable = Bookable::findOrFail($bookable_id);
        // dd($bookable->toArray());
        return view('reserve', compact('bookable'));
    }


    public function profile(){

        
        return view('profile');
    }

    public function profileData(){

        return auth()->user();
    }

    public function update(Request $request){

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:5',
            'address' => 'required|min:5',
            'email' => 'required|email'
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['success'=> false, 'errors'=>$validator->errors()->all()]);
        }


        $data = $request->only('name','address','email');
        // return $data;
        auth()->user()->update($data);
        
        return response()->json(['success'=> true, 'msg'=>'Profile updated Successfully!']);


    }

    public function updatePassword(Request $request){

        $validator = \Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['success'=> false, 'errors'=>$validator->errors()->all()]);
        }


        $user = auth()->user();
        $user->password = \Hash::make($request->password);
        $user->save();
        return response()->json(['success'=> true, 'msg'=>'Password updated Successfully!']);
    }




}
