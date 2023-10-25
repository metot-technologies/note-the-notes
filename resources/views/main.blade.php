<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight font-sans ">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('note.create')}}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 font-sans shadow-md dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create your note !</a>
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
                                    <a href="{{ route('note.edit', $note['id']) }}" class="bg-blue-400 font-bold rounded text-white p-[2px_8px] hover:underline ">Detail</a>
                                    <form action="{{route('note.destroy', $note['id'])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-rose-500 font-bold rounded text-white p-[2px_8px] hover:underline ">Delete</button>
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
