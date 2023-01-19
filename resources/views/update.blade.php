<form action="{{ route('update', $etudiants->id) }}" method="POST">
    @csrf
    <input type="text" name="nameEt" placeholder="name" value="{{ $etudiants->name }}">
    <br><br>
    <input type="text" name="emailEt" placeholder="email" value="{{ $etudiants->email }}">
    <br><br>
    <input type="submit" value="Update">
</form>