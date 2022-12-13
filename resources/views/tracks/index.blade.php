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
            @if( $tracks->count())

                <div class="mb-4">
                        {{ $tracks->links() }}
                    </div>

                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Path') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tracks as $track)
                <tr>
                <td>{{ $track->id }}</td>
                <td>{{ $track->title }}</td>
                <td><audio controls src="{{ $track->getUrlPath() }}" controls></audio controls></td>

                <td>
                <a href="{{ route('tracks.edit', ['track' => $track])}}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('tracks.destroy', ['track' =>
                $track]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">
                {{ __('Delete') }}
                </button>
                </form>
                </td>
                </tr>
                @endforeach
                <tr>
                <td colspan="3">&nbsp;</td>
                <td>
                <a href="{{ route('tracks.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $tracks->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>