<?php

namespace App\Http\Controllers\Backend;


use App\Models\Host;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.host.index', [
            'hosts' => Host::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.host.form');
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
            $host = Host::find($request->id);
            $host->name = $request->name;
            $host->url = $request->url;
            $host->port = $request->port;
            $host->update();
            $notification = array(
                'message' => 'The data was updated successfully.',
                'alert-type' => 'success'
            );
        } else {
            $host = new Host();
            $host->name = $request->name;
            $host->url = $request->url;
            $host->port = $request->port;
            $host->save();

            $notification = array(
                'message' => 'The data was created successfully.',
            );
        }
        return redirect()->route('hosts.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
     //   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function edit(Host $host)
    {
        return view('backend.host.form',[
            'host'=> $host
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $host)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        $host->delete();
        return redirect()->route('hosts.index');
    }
    public function delete(Host $host)
    {
        
        $host->delete();

        $notification = array(
            'message' => 'The data was deleted successfully.',
            'alert-type' => 'error'
        );

        return redirect()->route('hosts.index')->with($notification);
    }
    public function deleteByAjax(Request $request)
    {
        
        $host = Host::find($request->id);
        if ($host && $host->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
