<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::paginate(10);
        return view('outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('name')){
   
            $outlet = new Outlet;
            $outlet->name = $request->name;
            $outlet->description = $request->description;
            $outlet->address = $request->address;
            $outlet->visit_date = $request->visit_date;
            $outlet->latitude = $request->latitude;
            $outlet->longitude = $request->longitude;
            $outlet->save();
            return redirect()->route('outlet.index');
        }
        return back();
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
        $outlets = Outlet::findOrFail($id);
        return view('outlet.edit', compact('outlets'));
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
        $outlet = Outlet::findOrFail($id);
        $outlet->name = $request->name;
        $outlet->description = $request->description;
        $outlet->address = $request->address;
        $outlet->visit_date = $request->visit_date;
        $outlet->latitude = $request->latitude;
        $outlet->longitude = $request->longitude;
        if($request->has('name')){
            $outlet->save();
            return redirect()->route('outlet.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet = outlet::findOrFail($id);
        outlet::destroy($id);
        return redirect()->route('outlet.index');
    }
}
