<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight font-sans ">
            {{ __('Archive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @error('deleteError')
                    <ul class='text-sm text-red-600 space-y-1'>
                        <li class='font-sans'>{{ $message }}</li>
                    </ul>
                    @enderror
                    <h2 class="mt-10 mb-5 text-xl font-bold font-sans">Note(s): </h2>

                    @if($notes->first)
                        <div class="grid grid-cols-4 gap-4">

                            @foreach ($notes as $note)
                                <div class="p-6 border-2 rounded-lg shadow-md w-[100%]">
                                    <p class="text-xl line-clamp-3"><b>{{$note['title']}}</b></p>
                                    <div class="mt-10 flex gap-x-2">
                                        <form action="{{route('archive.restore', $note['id'])}}" method="post">
                                            @csrf
                                            <button type="submit" class="bg-lime-500 font-bold rounded text-white p-[2px_8px] hover:underline ">Restore</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <p class="font-semibold text-sm text-white leading-tight font-sans text-center">
            {{ __('Made with ❤️ by Metot Technologies. Copyright 2023. ') }}
        </p>
    </x-slot>
</x-app-layout>
<?php
