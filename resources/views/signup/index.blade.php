@extends('layouts.main')

@section('container')
<div>
    <h1>Sign Up</h1>
</div>

<form action="/signup" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <div>
            <p class="login">Already have an account? <a href="\login">Login</a></p>
        </div>

        <div>
            <label for="customer_first_name">First Name</label>
            <input id="customer_first_name" type="text" name="customer_first_name" class="@error('customer_first_name') is-invalid @enderror" placeholder="Enter your first name" value="{{ old('customer_first_name') }}">
        </div>

        <div>
            <label for="customer_last_name">Last Name</label>
            <input type="text" name="customer_last_name" id="customer_last_name" class="@error('customer_last_name') is-invalid @enderror" placeholder="Enter your last name" value="{{ old('customer_last_name') }}">
        </div>
        
        <div>
            <label for="customer_email">Email</label>
            <input type="email" name="customer_email" id="customer_email" placeholder="Enter your email" value="{{ old('customer_email') }}">
        </div>

        <div>
            <label for="customer_password">Password</label>
            <input type="password" name="customer_password" id="customer_password" placeholder="Enter your password" value="{{ old('customer_password') }}">
        </div>

        <div>
            <label for="customer_phone_number">Phone Number</label>
            <input type="text" name="customer_phone_number" id="customer_phone_number" placeholder="Enter your phone number" value="{{ old('customer_phone_number') }}">
        </div>

         <div>
            <label for="customer_address">Address</label>
            <input type="text" name="customer_address" id="customer_address" placeholder="Enter your address" value="{{ old('customer_address') }}">
        </div>

        <div>
            <label for="customer_photo">Profile Photo</label>
            <input type="file" name="customer_photo" id="customer_photo" value="{{ old('customer_photo') }}">
        </div>

        <div>
            <div>
                <label for="customer_gender">Select Your Gender</label>
            </div>
            <div>
                <div>
                    <input type="radio" name="customer_gender" id="male" value="Male">
                    <label for="male">Male</label>
                </div>

                <div>
                    <input type="radio" name="customer_gender" id="female" value="Female">
                    <label for="female">Female</label>
                </div>

                <div>
                    <input type="radio" name="customer_gender" id="prefer_not_to_say" value="Prefer not to say">
                    <label for="prefer_not_to_say">Prefer not to say</label>
                </div>
            </div>
            
        </div>

    </div>

    <div>
        <button type="submit">Sign Up</button>
    </div>
</form>
        
@endsection