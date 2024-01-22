<div>
    <p>Gyártó: {{ $vehicle->brand }}</p>
    <p>Típus: {{ $vehicle->type }}</p>
    <p>Gyártási év: {{ $vehicle->creationYear }}</p>
    <p>Rendszám: {{ $vehicle->license }}</p>
    <p>Kép:</p> <img src="{{ asset('storage/images/'.$vehicle->picture) }}" alt="vehicle image"></img>
    @foreach ($incidents as $incident)
        @if (auth()->user()->isPremium)
            <a href="{{ route('incident.show', $incident) }}">Helyszín: {{ $incident->place }}</a>
        @else
            <p>Helyszín: {{ $incident->place }}</p>
        @endif
    @endforeach
    
</div>