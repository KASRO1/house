@section("selectCoin")
@foreach($coins as $coin)

    <li
        class="itc-select__option"
        data-select="option"
        data-value="{{$coin['simple_name']}}"
        data-index="{{$coin['id_coin']}}">
        <img
            src="{{asset('/images/coin_icons/'.strtolower($coin['simple_name']).'.svg')}}"
            alt=""
            class="select-img"
        />
        {{$coin['simple_name']}}
    </li>
@endforeach
@endsection

@section("selectCoinPayment")
    @foreach($coinsPayment as $coinPayment)

        <li
            class="itc-select__option"
            data-select="option"
            data-value="{{$coinPayment['simple_name']}}"
            data-index="{{$coinPayment['id_coin']}}">
            <img
                src="{{asset('/images/coin_icons/'.strtolower($coinPayment['simple_name']).'.svg')}}"
                alt=""
                class="select-img"
            />
            {{$coinPayment['simple_name']}}
        </li>
    @endforeach
@endsection


@section("AdminSelectCoin")
    @foreach($coins as $coin)
        <option  value="{{$coin['id_coin']}}">{{$coin['simple_name']}}</option>
    @endforeach
@endsection


