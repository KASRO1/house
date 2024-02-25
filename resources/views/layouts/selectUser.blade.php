@section("selectUser")
@foreach($Users as $user)

    <option
        value="{{$user['id']}}"
    >
        {{$user['email']}}
    </option>
@endforeach
@endsection
