<?php

namespace App\Http\Controllers;

use App\Add;
use Illuminate\Http\Request;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds = Add::all();
        return view('adds.index', compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $add = new Add();
                $add->photo = $photo->store('uploads/adds');
                $add->save();
            }
            flash(__('Adds has been inserted successfully'))->success();
        }
        return redirect()->route('home_settings.index');
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
        $add = Add::find($id);
        $add->published = $request->status;
        if($add->save()){
            return '1';
        }
        else {
            return '0';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Add::findOrFail($id);
        if(Add::destroy($id)){
            //unlink($slider->photo);
            flash(__('Adds has been deleted successfully'))->success();
        }
        else{
            flash(__('Something went wrong'))->error();
        }
        return redirect()->route('home_settings.index');
    }
}

