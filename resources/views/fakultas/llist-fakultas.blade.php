<x-layout>
    <div>
        <h1>ini list fakultas</h1>
    
    
    <ul>
        @foreach ($fakultas as $item)
        <li>
            {{ $item->id }} |
            {{ $item->name }} |
            {{ $item->dekan }}
        </li>
        @endforeach
    </ul>

        <a href="/fakultas/create">Create Fakultas</a>
        <a href="/fakultas/{id}/edit">edit-fakultas</a>
    </div>
    
</x-layout>     