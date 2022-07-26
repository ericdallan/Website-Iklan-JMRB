@extends('layouts/app')
@section('content')
<style>
    label{
        color:#0A142F;
        font-weight:bold;
    }
    input[type="text"], input[type="email"], input[type="password"], input[type="tel"]{
        background-color : #D9D9D9; 
    }
    textarea{
        background-color : #D9D9D9; 
    }
    button{
        background-color:#FECD0A;
        font-weight:bold;
        width:150px;
        height:50px;
        color:#0A142F;
    }
</style>
<div class="pb-5 pt-5" style="background-color:rgba(12, 21, 49, 0.5)">
    <div class="container rounded-4" style="background-color:#FFFFFF;">
        <form action="">
            <div class="row py-3">
                <div class="col-6 mx-auto my-3 " style="width: 500px;">
                    <div class="row mb-3"> 
                        <div class="col mx-auto">
                            <h3>Company Name Profile</h3>  
                        </div>
                        <div class="col mx-auto">
                            <div class="mb-3 text-center">
                                <button type="submit" class="mt-3 mb-2 border-0 rounded-5">Edit Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 d-flex align-items-center">
                        <img src="{{url('Web/LoginUser.jpg')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-6 mx-auto my-4" style="width: 500px;">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Your Username">
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Your First Name">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Your Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" placeholder="Your Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Your Company Name">
                    </div>
                    <div class="mb-3">
                        <label for="companyAddress" class="form-label">Company Address</label>
                        <input type="text" class="form-control" id="companyAddress" placeholder="Your Company Address">
                    </div>
                    <div class="mb-3">
                        <label for="companyDesc" class="form-label">Company Description</label>
                        <textarea name="companyDesc" class="form-control" id="companyDesc" rows="5" cols="33" placeholder="Your Company Description"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection