@extends('layouts.app')

@section('content')
<div class="grid min-[72em]:grid-cols-3 min-[50em]:grid-cols-2 min-[30em]:grid-cols-1 
min-[72em]:gap-x-[5vw] min-[50em]:gap-x-[5vw] min-[40em]-gap-x-[3vw] gap-y-[2vw]">
    @foreach ($events as $event)
    <div class=" w-[17em] h-[18.5em] bg-yellow-500">

    <img class="mx-auto w-[15em] h-[10em] mt-2"
    src="{{ asset('storage/' . $event->image_url) }}" alt="Event Image">

        <div class="mx-auto w-[16em]">
            <h2 class="text-[1.5em] font-bold">{{ $event->title }}</h2>
            <div>
                <p class="text-[1em] leading-tight">{{ \Illuminate\Support\Str::limit($event->description, 25) }}</p>
                <a class=" hover:underline decoration-cyan-700" href="{{ route('events.show', ['event' => $event->id]) }}">
                <span class="text-cyan-900 hover:text-cyan-700">read more &raquo;</span>
                </a>
                
            </div>

            <div class="flex flex-row justify-end gap-3 align-items-end px-1 py-1">

            <a href="{{ route('events.edit', ['event' => $event->id]) }}">
            <button class="bg-cyan-500 px-[0.45em] py-1"><i class="fa-solid fa-pen"></i></button>
            </a>
            <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST" class="ml-1">
                    @csrf
                    @method("DELETE")
                    <button class="bg-red-700 px-[0.5em] py-1"><i class="fa-solid fa-trash text-white"></i></button>
                </form>
                
                
            </div>

        </div>

    </div>
    @endforeach
</div>
<a href="{{ route('events.create') }}">
    <div class="fixed bottom-4 right-4 bg-cyan-500 px-[0.8em] py-[0.5em] rounded-md">
        <button class="text-black  text-2xl">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
</a>
@endsection