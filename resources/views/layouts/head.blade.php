@section("head")
        <meta charset="UTF-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{asset("css/reset.css")}}" />
        <link rel="stylesheet" href="{{asset("css/style.css")}}" />
        <title>Cryptohouse</title>
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset("images/apple-touch-icon.png")}}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset("images/favicon-32x32.png")}}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset("images/favicon-16x16.png")}}" />
        <link rel="manifest" href="{{asset("images/site.webmanifest")}}" />
        <link rel="mask-icon" href="{{asset("images/safari-pinned-tab.svg")}}" color="#04141d" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#04141d" />
        <style>
            .select-img{
                width: 20px !important;
            }
        </style>
@endsection
