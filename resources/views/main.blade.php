<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('note.create')}}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
                    <h2 class="mt-5">Note: </h2>
                    @if($notes->first)
                        @foreach ($notes as $note)
                            <p><b>Title:</b> {{$note['title']}}</p>
                            <a href="{{ route('note.edit', $note['id']) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                            <form action="{{route('note.destroy', $note['id'])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form>
                            <p>-------------------</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
