<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\CarRequest;
use App\Http\Requests\StoreCarRequest;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();

        return response(['data' => $cars ], 200);
    }

    public function store(StoreCarRequest $request)
    {
        $car = Car::create([
            'make'=>$request['make'],
            'model'=>$request['model'],
            'produced_on'=>$request['produced']
        ]);
        return response(['message' => 'Car Added', 'data' => $car ], 201);
       

    }

    public function show($id)
    {
        $car = Car::findOrFail($id);

        return response(['data', $car ], 200);
    }

    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        return response(['data' => $car ], 200);
    }

    public function destroy($id)
    {
        Car::destroy($id);

        return response(['data' => null ], 204);
    }
}
