<form method="POST" action="{{ route('vehicle.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="brand">Gyártó:</label>
    <input type="text" id="brand" name="brand" placeholder="Gyártó" @required(true)></input>

    <label for="type">Típus:</label>
    <input type="text" id="type" name="type" placeholder="Típus" @required(true)></input>

    <label for="creationYear">Gyártási év:</label>
    <input type="number" id="creationYear" name="creationYear" placeholder="Gyártási év" @required(true)></input>

    <label for="license">Rendszám:</label>
    <input type="text" id="license" name="license" placeholder="Rendszám" @required(true)></input>

    <label for="picture">Kép:</label>
    <input type="file" id="picture" name="picture" placeholder="Kép" @required(true)></input>

    <button>Új jármű felvétele</button>
</form>