@extends('layouts.app')

@section('content')
<!-- @if(Session::get('status') !== null)
    <div class="mt-4 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
            <p class="font-bold">{{ Session::get('status') }}</p>
            </div>
        </div>
    </div>
    @endif -->
<div class="grid grid-cols-1 min-[72em]:grid-cols-3 min-[50em]:grid-cols-2 
min-[72em]:gap-x-[5vw] min-[50em]:gap-x-[5vw] min-[40em]-gap-x-[3vw] gap-y-[2vw]">

    @foreach ($events as $event)
    <div class=" w-[17em] h-[18.5em] bg-yellow-500 rounded-xl shadow-lg">

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

            <div class="flex flex-row justify-end gap-1 align-items-end px-1 py-1">

            <a href="{{ route('events.edit', ['event' => $event->id]) }}">
            <button class="bg-cyan-500 px-[0.45em] py-1 rounded-xl"><i class="fa-solid fa-pen"></i></button>
            </a>
            <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST" class="ml-1">
                    @csrf
                    @method("DELETE")
                    <button class="bg-red-700 px-[0.5em] py-1 rounded-xl"><i class="fa-solid fa-trash text-white"></i></button>
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