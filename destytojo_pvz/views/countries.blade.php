<h1>Labas pasauli čia šalys: {{ $title }}</h1>


<table border="1">
    @foreach($countries as $country)
    <tr>
        <td>{{ $country->name }}</td>
        <td><a href="?delete_id={{ $country->id }}">Istrinti</a> </td>
    </tr>
    @endforeach
</table>