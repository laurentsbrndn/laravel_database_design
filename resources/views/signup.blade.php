@extends('layouts.main')

@section('container')
<div>
    <h1>Sign Up</h1>
</div>

<div>
    <div>
        <p class="login">Already have an account? <a href="{{ url('/login') }}">Login</a></p>
    </div>

    <div>
        <h3>First Name</h3>
        <input type="text" name="name" id="name" placeholder="Enter your first name">
    </div>

    <div>
        <h3>Last Name</h3>
        <input type="text" name="name" id="name" placeholder="Enter your last name">
    </div>
    
    <div>
        <h3>Email</h3>
        <input type="email" name="email" id="email" placeholder="Enter your email">
    </div>

    <div>
        <h3>Password</h3>
        <input type="password" name="password" id="password" placeholder="Enter your password">
    </div>

    <div>
        <h3>Phone Number</h3>
        <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter your phone number">
    </div>

    <div>
        <h3>Address</h3>
        <input type="text" name="address" id="address" placeholder="Enter your address">
    </div>

    <div>
        <h3>Profile Photo</h3>
        <input type="file" name="profilePhoto" id="profilePhoto">
    </div>

</div>
        
<div>
    <button type="submit">Sign Up</button>
</div>

@endsection
