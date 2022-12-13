<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tracks') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

            
                    
                <form action="{{ route('tracks.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="player_id">
                {{ __('player_id') }}
                </label>
                
                <select name="player_id" id="player_id">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                
                @error('player_id')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="title">
                {{ __('title') }}
                </label>
                <input type="text" name="title" id="title">
                @error('title')
                <div>
                {{ $message }}
                </div>
                @enderror

                <label for="path">
                {{ __('path') }}
                </label>
                <input type="file" name="path" id="path" accept="audio/*">
                
                @error('path')
                <div>
                {{ $message }}
                </div>
                @enderror

                <button type="submit">
                {{ __('Register') }}
                </button>
                </form>
            
            </div>
            
        </div>
        
    </div>
</div>
</x-app-layout>