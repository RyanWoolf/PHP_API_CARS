<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Headquarter;
use App\Models\Product;




class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query builder
        // $cars = DB::table('cars')->paginate(4);

        
        $cars = Car::paginate(3);
        // $cars = Car::all()->toJson();
        // $cars = json_decode($cars);
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
    public function store(Request $request) //리퀘스트는 글로벌 헬퍼
    {
        // $car = new Car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();

        // Request all input fields
        // $test = $request->all(); // Bring all data in request

        //Except method
        // $test = $request->except('_token');
        // $test = $request->except(['_token', 'name']);
        // $test = $request->only(['_token', 'name']);
        // $test = $request->only('name');

        //Has method founded field has been input
        // $test = $request->has('founded');
        // if($request->has('founded')) {
        //     dd('Founded has been found');
        // }

        //Current path
        // dd($request->path());
        // if($request->is('cars')) {
        //     dd('Endpoint is cars');
        // }

        //Current method
        // if ($request->method('post')) {
        //     dd('Method is post');
        // };
        // if ($request->isMethod('post')) {
        //     dd('Method is post');
        // };

        //Show the URL
        // dd($request->url());

        //Show the IP
        // dd($request->ip());


        // dd($test);



        // Validation & Error handling
        // $request->validate([ // 인풋을 체크해서 트루 폴스를 리턴
        //     'name' => ['required'], ['unique:cars'], // not recommended
        //     'founded' => 'required|integer|min:0|max:2021', // Pipes recommended
        //     'description' => 'required'
        // ]);

        // $request->validated();
        // If it's valid, it will proceed
        // If it's not valid, throw a ValidationException


        //Methods we can use on $request
        //guessExtension()
        // $test = $request->file('image')->guessExtension();
        // dd($test);

        //getMimeType()
        // $test = $request->file('image')->getMimeType();
        // dd($test);

        //store()
        //asStore()
        //storePublicly()
        //move()
        //getClientOriginalName() string
        //getClientMimeType() jpg
        //guessClientExtension() jpg
        //getSize() kb
        //getError() integer
        //isValid() bool


        $request->validate([
            'name' => ['required'], ['unique:cars'], // not recommended
            'founded' => 'required|integer|min:0|max:2021', // Pipes recommended
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        // Change the name of image uploaded
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        // move(name of directory, name of file)


        $car = Car::create([ // same as Car::make + save()
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]); 

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        $products = Product::find($id);


        $hq = Headquarter::find($id);

        // var_dump($car->products);
        // $hq = $car->headquarter;
        // dd($hq);
        // dd($car->engines);

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
    public function update(CreateValidationRequest $request, string $id)
    {
        $request->validated();
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
