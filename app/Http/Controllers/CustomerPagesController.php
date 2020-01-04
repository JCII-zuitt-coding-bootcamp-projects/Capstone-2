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

        // $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'author.name' => 'required',
        //     'author.description' => 'required',
        // ]);

        $data = $request->only('name','address','email');
        // return $data;
        auth()->user()->update($data);
        
        return "Oks";

    }

    public function updatePassword(Request $request){

        return $request;
    }




}
