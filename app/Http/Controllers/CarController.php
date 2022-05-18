<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = Car::all();
        //dd($car);
        return view('car.index', [
            'cars' => $car
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //Car::insert($request->except('_token'));

        if ($request->has('id')) {
            $c = Car::find($request->id);
            $c->model = $request->model;
            $c->color = $request->color;
            $c->code = $request->code;
            $c->update();
            $notification = array(
                'message' => 'The data was updated successfully.',
                'alert-type' => 'success'
            );
        } else {
            $c = new Car();
            $c->model = $request->model;
            $c->color = $request->color;
            $c->code = $request->code;
            $c->save();
            $notification = array(
                'message' => 'The data was created successfully.',
                'alert-type' => 'success'
            );
        }

        //dd(1);
        return redirect()->route('cars.index')->with($notification);
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //dd($car);
        return view('car.form', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //dd($car);
        $car->delete();

        return redirect()->route('cars.index');
    }


    public function delete(Car $car)
    {
        //dd($car);
        $car->delete();

        $notification = array(
            'message' => 'The data was deleted successfully.',
            'alert-type' => 'error'
        );

        return redirect()->route('cars.index')->with($notification);
    }

    public function deleteByAjax(Request $request)
    {
        //dd($car);
        $car = Car::find($request->id);
        if ($car && $car->delete()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
