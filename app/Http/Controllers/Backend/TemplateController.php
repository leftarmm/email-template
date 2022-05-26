<?php

namespace App\Http\Controllers\Backend;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.template.index', [
            'templates' => Template::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.template.form');
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
            $template = Template::find($request->id);
            $template->title = $request->title;
            $template->body = $request->body;
            $template->update();
            $notification = array(
                'message' => 'The data was updated successfully.',
                'alert-type' => 'success'
            );
        } else {
            $template = new Template();
            $template->title = $request->title;
            $template->body = $request->body;
            $template->save();

            //dd($user->id);
            $notification = array(
                'message' => 'The data was created successfully.',
            );
        }
        return redirect()->route('templates.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('backend.template.form',[
            'template'=> $template
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('templates.index');
    }
    public function delete(Template $template)
    {
        
        $template->delete();

        $notification = array(
            'message' => 'The data was deleted successfully.',
            'alert-type' => 'error'
        );

        return redirect()->route('templates.index')->with($notification);
    }
    public function deleteByAjax(Request $request)
    {
        
        $template = Template::find($request->id);
        if ($template && $template->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
