<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;
use Session;
use Freshwork\ChileanBundle\Rut;

class ProspectController extends Controller
{
    public $element = "prospects";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Prospect::all();
        $columns = ['Rut','Name','Social Razon','Address','Phone','Contact Name','Contact Email','Contact Phone'];
        $title = "Prospect";
        return view('admin.'.$this->element.'.index', compact('data','columns','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Prospect";
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
            'social_razon'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'contact_name'=>'required',
            'contact_email'=>'required',
            'contact_phone'=>'required|numeric',
            'requirement'=>'required'
        ]);

        $rut = new Rut($request->rut, '1');
        if(!$rut->validate()){
            return back()->withErrors('Rut Invalido!!');
        }

        $element = new Prospect();
        $element->rut = $request->rut;
        $element->name = strtoupper($request->name);
        $element->social_razon = strtoupper($request->social_razon);
        $element->address= strtoupper($request->address);
        $element->phone = $request->phone;
        $element->contact_name = strtoupper($request->contact_name);
        $element->contact_email = strtoupper($request->contact_email);
        $element->contact_phone = strtoupper($request->contact_phone);
        $element->requirement = strtoupper($request->requirement);

        if($element->save()){
            Session::flash('success','Prospect Added Succefully!!');
        }else{
            Session::flash('error', 'Error Adding Prospect!!');
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
        $title = "Edit Prospect";
        $type = "edit";
        $data = Prospect::findorfail($id);
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
            'social_razon'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'contact_name'=>'required',
            'contact_email'=>'required',
            'contact_phone'=>'required|numeric',
            'requirement'=>'required'
        ]);

        $rut = new Rut($request->rut, '1');
        if(!$rut->validate()){
            return back()->withErrors('Rut Invalido!!');
        }

        $element = Prospect::findorfail($id);
        $element->rut = $request->rut;
        $element->name = strtoupper($request->name);
        $element->social_razon = strtoupper($request->social_razon);
        $element->address= strtoupper($request->address);
        $element->phone = $request->phone;
        $element->contact_name = strtoupper($request->contact_name);
        $element->contact_email = strtoupper($request->contact_email);
        $element->contact_phone = strtoupper($request->contact_phone);
        $element->requirement = strtoupper($request->requirement);

        if($element->update()){
            Session::flash('success','Prospect Updated Succefully!!');
        }else{
            Session::flash('error', 'Error Updating Prospect!!');
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
        $element = Prospect::findorfail($id);
        if($element->delete()){
            Session::flash('success','Prospect Deleted Succefully!!');
        }else{
            Session::flash('error','Prospect Deleting Succefully!!');
        }
        return redirect()->route($this->element.'.index');
    }
}
