<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Players') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if( $players->count() )
                <table>
                <thead>
                <tr>
                <th>ID</th>
                <th>{{ __('Nombre') }}</th>

                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($players as $player)
                <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->nombre }}</td>

                <td>
                <a href="{{ route('players.edit', ['player' => $player])
                }}">
                {{ __('Update') }}
                </a>
                </td>
                <td>
                <form action="{{ route('players.destroy', ['player' =>
                $player]) }}" method="post">
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
                <a href="{{ route('players.create') }}">
                {{ __('Insert') }}
                </a>
                </td>
                </tr>
                </tbody>
                </table>
            <div>
            {{ $players->links() }}
        </div>
        @endif
    </div>
</div>
</x-app-layout>