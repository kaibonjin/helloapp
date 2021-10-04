<html>

<head>
    <title>Hello</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 100pt;
            text-align: right;
            color: #eee;
            margin: -40px 0px -50px 0px;
        }
    </style>
</head>

<body>
    <h1>Blade/Index</h1>
    <p>&#064;whileの例</p>
    <ol>
        @php
        $counter = 0;
        @endphp
        @while ($counter < count($data))
        <li>{{$data[$counter]}}</li>
        @php
        $counter++;
        @endphp
        @endwhile
    </ol>
    {{-- @isset ($msg)
    <p>こんにちは、{{$msg}}さん。</p>
    @else
    <p>名前を入力してください</p>
    @endisset
    <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form> --}}
</body>

</html>
