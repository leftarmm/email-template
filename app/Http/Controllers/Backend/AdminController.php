<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'admins' => Admin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form');
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
            $admin = Admin::find($request->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Crypt::encryptString("abcd1234");;
            $admin->update();
            $notification = array(
                'message' => 'The data was updated successfully.',
                'alert-type' => 'success'
            );
        } else {
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Crypt::encryptString("abcd1234");
            $admin->save();

            //dd($user->id);
            $notification = array(
                'message' => 'The data was created successfully.',
            );
        }
        return redirect()->route('admins.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.form',[
            'admin'=>$admin
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admins.index');
    }
    public function delete(Admin $admin)
    {
        //dd($admin);
        $admin->delete();

        $notification = array(
            'message' => 'The data was deleted successfully.',
            'alert-type' => 'error'
        );

        return redirect()->route('admins.index')->with($notification);
    }

    public function deleteByAjax(Request $request)
    {
        //dd($admin);
        $admin = Admin::find($request->id);
        if ($admin && $admin->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
