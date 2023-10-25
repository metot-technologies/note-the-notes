<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight font-sans">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @error('msg')
                    <ul class='text-sm text-red-600 space-y-1'>
                            <li>{{ $message }}</li>
                    </ul>
                @enderror
                <form class="w-full max-w-sm" method="POST" action="{{ route('note.store') }}">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3 mt-10">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Title
                            </label>
                        </div>
                        <div class="md:w-2/3 mt-10">
                            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" name="title">
                        </div>
                        @if ($errors->get('title'))
                            <ul class='text-sm text-red-600 space-y-1'>
                                @foreach ((array) $errors->get('title') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3 ">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Content
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" name="content"></textarea>
                        </div>
                        @if ($errors->get('content'))
                            <ul class='text-sm text-red-600 space-y-1'>
                                @foreach ((array) $errors->get('content') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3 mb-10">
                        <button class="shadow bg-blue-800 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Create
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <p class="font-semibold text-sm text-white leading-tight font-sans text-center">
            {{ __('Made with ❤️ by Metot Technologies. Copyright 2023. ') }}
        </p>
    </x-slot>
</x-app-layout>

