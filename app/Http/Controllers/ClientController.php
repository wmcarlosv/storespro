<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Session;
use Freshwork\ChileanBundle\Rut;

class ClientController extends Controller
{
    public $element = "clients";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Client::all();
        $columns = ['Rut','Name','Social Razon','Address','Phone'];
        $title = "Clients";
        return view('admin.'.$this->element.'.index', compact('data','columns','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "New Client";
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
            'phone'=>'required|numeric'
        ]);

        $rut = new Rut($request->rut, '1');
        if(!$rut->validate()){
            return back()->withErrors('Rut Invalido!!');
        }

        $element = new Client();
        $element->rut = $request->rut;
        $element->name = strtoupper($request->name);
        $element->social_razon = strtoupper($request->social_razon);
        $element->address= strtoupper($request->address);
        $element->phone = $request->phone;

        if($element->save()){
            Session::flash('success','Client Added Succefully!!');
        }else{
            Session::flash('error', 'Error Adding Client!!');
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
        $title = "Edit Client";
        $type = "edit";
        $data = Client::findorfail($id);
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
            'phone'=>'required|numeric'
        ]);

        $rut = new Rut($request->rut, '1');
        if(!$rut->validate()){
            return back()->withErrors('Rut Invalido!!');
        }

        $element = Client::findorfail($id);
        $element->rut = $request->rut;
        $element->name = strtoupper($request->name);
        $element->social_razon = strtoupper($request->social_razon);
        $element->address= strtoupper($request->address);
        $element->phone = $request->phone;

        if($element->update()){
            Session::flash('success','Client Updated Succefully!!');
        }else{
            Session::flash('error', 'Error Updating Client!!');
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
        $element = Client::findorfail($id);
        if($element->delete()){
            Session::flash('success','client Deleted Succefully!!');
        }else{
            Session::flash('error','Client Deleting Succefully!!');
        }
        return redirect()->route($this->element.'.index');
    }
}
