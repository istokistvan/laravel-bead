<form method="POST" action="{{ route('searchHistory.store') }}">
    @csrf
    <input type="text" id="license" name="license" placeholder="pl.: ABC-123"></input>
    @auth
    <button>Keresés</button>
</form>
@else
<a href="{{ route('login') }}">Bejelentkezés</a>

@endauth