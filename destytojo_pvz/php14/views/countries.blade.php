<h1>Labas pasauli čia šalys: {{ $title }}</h1>






@foreach($user->getNavigation() as $item)
    <a href="{{$item['link']}}"> {{$item['name']}}</a> |
@endforeach
<hr>
<a href="login.php?action=logout">Atsijungti</a>
<hr>
<table border="1">
    @foreach($countries as $country)
    <tr>
        <td>{{ $country->name }}</td>
        @if ($user->canEdit())
        <td><a href="?delete_id={{ $country->id }}">Istrinti</a> </td>
        @endif
    </tr>
    @endforeach
</table>