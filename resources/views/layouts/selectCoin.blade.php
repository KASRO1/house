@section("selectCoin")
@foreach($coins as $coin)

    <li
        class="itc-select__option"
        data-select="option"
        data-value="{{$coin['simple_name']}}"
        data-index="{{$coin['id_coin']}}">
        <img
            src="{{asset('/images/coin_icons/'.$coin['simple_name'].'.svg')}}"
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
                src="{{asset('/images/coin_icons/'.$coinPayment['simple_name'].'.svg')}}"
                alt=""
                class="select-img"
            />
            {{$coinPayment['simple_name']}}
        </li>
    @endforeach
@endsection

@section("FiatMethodPayment")
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://buy.moonpay.com/"
        >
        <img
            src="{{asset('/images/payment_logos/moonpay.svg')}}"
            alt=""
            class="select-img"
        />
        MoonPay (Visa/MasterCard)
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://global.transak.com/">
        <img
            src="{{asset('/images/payment_logos/transak.png')}}"
            alt=""
            class="select-img"
        />
        Transak (CashApp)
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://buy.coingate.com/">
        <img
            src="{{asset('/images/payment_logos/coingate.png')}}"
            alt=""
            class="select-img"
        />
        CoinGate
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://buy.simplex.com/">
        <img
            src="{{asset('/images/payment_logos/simplex.png')}}"
            alt=""
            class="select-img"
        />
        Simplex
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://banxa.com/">
        <img
            src="{{asset('/images/payment_logos/banxa.png')}}"
            alt=""
            class="select-img"
        />
        Banxa
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://bitpay.com/buy-crypto/">
        <img
            src="{{asset('/images/payment_logos/bitpay.png')}}"
            alt=""
            class="select-img"
        />
        BitPay
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://changelly.com/buy-crypto">
        <img
            src="{{asset('/images/payment_logos/changelly.ico')}}"
            alt=""
            class="select-img"
        />
        Changelly
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://phemex.com/en/buy-crypto/card/place-order?side=buy">
        <img
            src="{{asset('/images/payment_logos/phemex.ico')}}"
            alt=""
            class="select-img"
        />
        Phemex
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://ramp.network/buy">
        <img
            src="{{asset('/images/payment_logos/ramp.png')}}"
            alt=""
            class="select-img"
        />
        Ramp
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://mercuryo.io/">
        <img
            src="{{asset('/images/payment_logos/mercuryo.svg')}}"
            alt=""
            class="select-img"
        />
        Mercuryo
    </li>
@endsection

@section("AdminSelectCoin")
    @foreach($coins as $coin)
        <option  value="{{$coin['id_coin']}}">{{$coin['simple_name']}}</option>
    @endforeach
@endsection
@section("AdminSelectCoinSymbol")
    @foreach($coins as $coin)
        <option  value="{{$coin['simple_name']}}">{{$coin['simple_name']}}</option>
    @endforeach
@endsection



