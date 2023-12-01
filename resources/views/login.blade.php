@extends('layout')

@section('content')
    <?php
    $a = '5';
    $b = &$a;
//    echo $a."<br>";
//    echo $b."<br>";

    $b = "2$b";
//    echo $a."<br>";
//    echo $b."<br>";
//    echo $a.', '.$b;


    $arr = array(
        '0' => 'Z1',
        '1' => 'Z30',
        '2' => 'Z12',
        '3' => 'Z2',
        '4' => 'Z3',
    );

    asort($arr);
    dd($arr);
    ?>
    <div>
    <h3>Login</h3>
</div>
<div>
    <form action="{{route('login')}}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>
</div>

<script>
    // window.onbeforeunload = function (){ return "going back";}
    document.addEventListener('beforeunload',function (event) {
        event.preventDefault();
        confirm('refresh ?');

    });
    window.addEventListener('beforeunload',function (event) {
        confirm('leaving');
    })
</script>
@endsection
