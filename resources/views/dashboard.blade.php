@extends('frontend.frontend_master')
@section('frontend')
@php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
$id = Auth::user()->id;
$data = User::find($id);
@endphp
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{(!empty($data->profile_photo_path))? url('upload/user_images/'.$data->profile_photo_path):url('upload/no_image.jpg')}}" alt="" class="card-img-top" style="border-radius: 50%" width="100%" height="100%">
                <br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div>

            <div class="col-md-2">
                
            </div>

            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center">Hello  <strong>{{Auth::user()->name}}</strong>, Welcome to Better Shop</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection