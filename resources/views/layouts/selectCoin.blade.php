@section("selectCoin")
@foreach($coins as $coin)

    <li
        class="itc-select__option"
        data-select="option"
        data-value="{{$coin['simple_name']}}"
        data-index="0">
        <img
            src="{{asset('/images/coin_icons/'.strtolower($coin['simple_name']).'.svg')}}"
            alt=""
            class="select-img"
        />
        {{$coin['simple_name']}}
    </li>
@endforeach
@endsection
