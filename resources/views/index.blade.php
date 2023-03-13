@extends('layouts.main')
@section('content')
  <div class="m-auto w-4/5 py-24">
    <div class="text-center">
      <h1 class="text-5xl uppercase bold">
        Cars
      </h1>
    </div>
    <div class="m-auto w-4/5 py-10">
      @foreach ($cars as $car)
      <div class="m-auto">
        <span class="uupercase text-blue-500 font-bold text-xs italic">
          Founded: {{ $car->founded }}
        </span>
        <h2 class="text-gray-700 text-5xl">
          {{ $car->name }}
        </h2>
        <p class="text-lg text-gray-700 py-6">
          {{ $car->description }}
        </p>
        <hr class="mt-4 mb-8">
      </div>
        
      @endforeach
    </div>
  </div>

@endsection
