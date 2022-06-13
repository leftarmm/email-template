<?php

namespace App\Http\Controllers\Backend;

use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.University.index', [
            'universitys' => University::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.University.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('id')) {
            $University = University::find($request->id);
            $University->name = $request->name;
            $University->update();
            $notification = array(
                'message' => 'The data was updated successfully.',
                'alert-type' => 'success'
            );
        } else { 
            $University = new University();
            $University->name = $request->name;
            $University->save();

            $notification = array(
                'message' => 'The data was created successfully.',
            );
        }
        return redirect()->route('universitys.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        return view('backend.University.form',[
            'university'=> $university
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $university->delete();
        return redirect()->route('universitys.index');
    }
    public function delete(University $university)
    {
        
        $university->delete();

        $notification = array(
            'message' => 'The data was deleted successfully.',
            'alert-type' => 'error'
        );

        return redirect()->route('universitys.index')->with($notification);
    }
    public function deleteByAjax(Request $request)
    {
        
        $university = University::find($request->id);
        if ($university && $university->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
