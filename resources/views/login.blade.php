@extends('layout')

@section('content')
<div>
    <h3>Login</h3>
</div>
<div>
    <form action="{{route('login')}}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="hedagaurav93@gmail.com">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="p@ssw0rd">
        <input type="submit" value="Login">
    </form>
</div>

<script>
    // window.onbeforeunload = function (){ return "going back";}
    document.addEventListener('beforeunload', function(event) {
        event.preventDefault();
        confirm('refresh ?');

    });
    window.addEventListener('beforeunload', function(event) {
        confirm('leaving');
    })
</script>
@endsection
