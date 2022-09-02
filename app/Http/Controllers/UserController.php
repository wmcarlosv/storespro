<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;

class UserController extends Controller
{
    public $element = "users";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $columns = ['name','email','rut','phone'];
        $title = "Users";
        return view('admin.'.$this->element.'.index', compact('data','columns','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New User";
        $type = "new";

        return view('admin.'.$this->element.'.add-edit',compact('title','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required'
        ]);

        $element = new User();
        $element->rut = $request->rut;
        $element->name = $request->name;
        $element->email = $request->email;
        $element->password = bcrypt($request->password);
        $element->phone = $request->phone;
        if($element->save()){
            Session::flash('success','User Added Succefully!!');
        }else{
            Session::flash('error', 'Error Adding User!!');
        }

        return redirect()->route($this->element.'.index');
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
        $title = "Edit User";
        $type = "edit";
        $data = User::findorfail($id);
        return view('admin.'.$this->element.'.add-edit',compact('title','type','data'));
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
        $request->validate([
            'rut'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $element = User::findorfail($id);
        $element->rut = $request->rut;
        $element->name = $request->name;
        $element->email = $request->email;
        $element->phone = $request->phone;

        if($element->update()){
            Session::flash('success','User Updated Succefully!!');
        }else{
            Session::flash('error', 'Error Updating User!!');
        }

        return redirect()->route($this->element.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = User::findorfail($id);
        if($element->delete()){
            Session::flash('success','User Deleted Succefully!!');
        }else{
            Session::flash('error','User Deleting Succefully!!');
        }
        return redirect()->route($this->element.'.index');
    }

    public function profile(){

        return view('admin.'.$this->element.'.profile');
    }

    public function change_profile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'rut'=>'required'
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->rut = $request->rut;

        if($user->save()){
            Session::flash('success','Updated Profile Succefully!!');
        }else{
            Session::flash('error','Error Updating Profile!!');
        }

        return redirect()->route('profile');

    }

    public function change_password(Request $request){
        $request->validate([
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);

        $user = User::findorfail(Auth::user()->id);
        $user->password = bcrypt($request->password);
        if($user->update()){
            Session::flash('success','Password Changed Succefully!!');
        }else{
            Session::flash('error','Error Updating Password!!');
        }

        return redirect()->route('profile');
    }
}
