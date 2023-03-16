<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Headquarter;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all()->toJson();
        $cars = json_decode($cars);
        // var_dump($cars);
        // print_r(Car::avg('founded'));
        
        // $cars = Car::chunk(2, function ($cars) {
        //     foreach($cars as $car) {
        //         print_r($car);
        //     }
        // });
        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $car = new Car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();

        $car = Car::create([ // same as Car::make + save()
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]); 

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);

        $hq = Headquarter::find($id);

        // var_dump($hq);
        // $hq = $car->headquarter;
        // dd($hq);
        // dd($car);

        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd($id);
        $car = Car::find($id);

        // dd($car);
        return view('cars.edit')->with('car', $car);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::where('id', $id)->update([ 
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]); 
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $car = Car::find($id);
    //     $car->delete();
    //     return redirect('/cars');
    // }
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/cars');
    }
}
