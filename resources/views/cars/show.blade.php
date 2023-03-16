@extends('layouts.main')

@section('content')
<div class="m-auto w-4/5 py-24">
  <div class="text-center">
    <h1 class="text-5xl uppercase bold">
      {{ $car->name }}
    </h1>
    <p class="text-base text-gray-700 py-6">
      {{ $car->headquarter->headquarters }}, {{ $car->headquarter->country }}
    </p>
  </div>
  <div class="m-auto py-10 text-center">
    <div class="m-auto">
      <span class="uupercase text-blue-500 font-bold text-xs italic">
        Founded: {{ $car->founded }}
      </span>

      <p class=" text-base text-gray-700 py-6">
        {{ $car->description }}
      </p>
      <ul class="">
        <p class="text-lg text-gray-700 py-3">
          Models:
        </p>

        @forelse ($car->carModels as $model)
          <li class="italic text-gray-600 px-1 py-6 inline">
            {{ $model['model_name'] }}
          </li>
          
        @empty
          <p>
            No Model Found
          </p>
        @endforelse
      </ul>
      <hr class="mt-4 mb-8">
    </div>
  </div>
</div>

@endsection