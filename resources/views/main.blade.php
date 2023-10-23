<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight ">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('note.create')}}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create your note !</a>
                    @error('deleteError')
                        <ul class='text-sm text-red-600 space-y-1'>
                            <li>{{ $message }}</li>
                        </ul>
                    @enderror
                    <h2 class="mt-5 ">Note(s): </h2>
                    @if($notes->first)
                    <div class="grid grid-cols-4 gap-4">
                        
                            @foreach ($notes as $note)
                            <div class="p-6 border-2 border-rose-500 w-[100%]">
                                <p><b>Title:</b> {{$note['title']}}</p>
                                <div class="mt-10 flex gap-x-5">
                                    <a href="{{ route('note.edit', $note['id']) }}" class="border-2 border-blue-800 font-bold text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    <form action="{{route('note.destroy', $note['id'])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600 font-bold border-2 border-rose-500 hover:underline">Delete</button>
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
</x-app-layout>
