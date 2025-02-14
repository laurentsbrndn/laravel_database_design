@extends('layouts.main')

@section('container')
<div>
    <h1>Login</h1>
</div>

<div>
    <div>
        <p class="signup">Don't have any account? <a href="/signup">Sign Up</a></p>
    </div>
    <div>    
        <h3>Email</h3>
        <input type="email" name="email" id="email" placeholder="Enter your email">
    </div>

    <div>
        <h3>Password</h3>
        <input type="password" name="password" id="password" placeholder="Enter your password">
    </div>
</div>

<div>
    <button type="submit">Login</button>
</div>

@endsection