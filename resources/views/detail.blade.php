@inject('Carbon', 'Illuminate\Support\Carbon')
@extends('layouts.base')

@section('content')
<h1 class="mb-1 text-4xl font-bold tracking-tight text-black sm:text-5xl">{{ $event->title }}</h1>
    <small class="text-base text-zinc-900">{{ $Carbon::parse($event->updated_at)->isoFormat('Do MMMM Y, h:mm:ss A') }}</small>
    @if($event->image_url !== null)
        <img class="mx-auto w-[35em] h-[22em] mt-3" src="{{ asset('storage/' . $event->image_url) }}" />
    @endif
    <p class="mt-6 text-base text-zinc-900 max-w-[41em] text-justify break-words">{{ $event->description }}</p>
    <a href="{{ route('events.index') }}">
        <button class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-800 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 flex-none mt-5" type="button">Back</button>
    </a>
@endsection