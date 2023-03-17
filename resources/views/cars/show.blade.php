@extends('layouts.main')

@section('content')
<div class="m-auto w-4/5 py-24">
  <div class="text-center">
    <img
      class="w-8/12 mb-8 shadow-xl" 
      src="{{ asset('images/' . $car->image_path) }}" alt="">
    <h1 class="text-5xl uppercase bold">
      {{ $car->name }}
    </h1>
    {{-- <p class="text-base text-gray-700 py-6">
      {{ $car->headquarter->headquarters }}, {{ $car->headquarter->country }}
    </p> --}}
  </div>
  <div class="m-auto py-10 text-center">
    <div class="m-auto">
      <span class="uupercase text-blue-500 font-bold text-xs italic">
        Founded: {{ $car->founded }}
      </span>

      <p class=" text-base text-gray-700 py-6">
        {{ $car->description }}
      </p>

      {{-- <ul class="">
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
      </ul> --}}

      <table class="table-auto">
        <tr class="bg-blue-100">
          <th class="w-1/4 border-4 border-gray-500">
            Model
          </th>
          <th class="w-1/4 border-4 border-gray-500">
            Engines
          </th>
          <th class="w-1/4 border-4 border-gray-500">
            Date
          </th>


        </tr>
        @forelse ($car->carModels as $model)
                <tr>
            <td class="border-4 border-gray-500">
              {{ $model->model_name }}
            </td>
            <td class="border-4 border-gray-500">
              @foreach ($car->engines as $engine)
                @if ($model->id == $engine->model_id)
                  {{ $engine->engine_name }}
                @endif
              @endforeach
            </td>
            <td class="border-4 border-gray-500">
              {{ date('d-m-Y', strtotime($car->productionDate->created_at)) }}
            </td>
          </tr>
        @empty
          No car models found!
        @endforelse
      </table>
      <p class="text-left">
        Product types:
        @forelse ($car->products as $product )
          {{ $product->name }}
        @empty
          No car production found.
        @endforelse
      </p>
      <hr class="mt-4 mb-8">
    </div>
  </div>
</div>

@endsection