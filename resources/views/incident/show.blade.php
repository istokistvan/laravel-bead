<p>{{ $incident->place }}</p>
<p>{{ $incident->date }}</p>
<p>{{ $incident->description }}</p>

@foreach ($incident->damageEvents as $vehicle)
    <p>Rendszám: {{ $vehicle->license }}</p>
    <p>Márka: {{ $vehicle->brand }}</p>
    <p>Típus: {{ $vehicle->type }}</p>
    <p>Évjárat: {{ $vehicle->creationYear }}</p>
    <img src="{{ $vehicle->picture }}" alt="{{ $vehicle->picture }}"></img>
@endforeach