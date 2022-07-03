@extends('frontend.frontend_master')
@section('frontend')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ (!empty($data->profile_photo_path))? url('upload/user_images/'.$data->profile_photo_path):url('upload/no_image.jpg') }}" alt="" class="card-img-top" style="border-radius: 50%" width="100%" height="100%">
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
                    <div class="card-header">
                    <h3>Profile Update</h3>
                    <hr>
                    </div>
                    
                <form method="POST" action="{{route('user.profile.store')}}" class="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group">
                        <label class="info-title" for="name">Name <span>*</span></label>
                        <input type="name" name="name" class="form-control unicase-form-control text-input" value="{{$data->name}}" id="name" required>
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="email">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{$data->email}}" id="email" required>
                    </div>
                   
                    <div class="form-group">
                        <label class="info-title" for="phone">Phone Number <span>*</span></label>
                        <input type="phone" name="phone" class="form-control unicase-form-control text-input" id="phone" value="{{$data->phone}}" required >
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="profile_photo_path">Profile Image <span>*</span></label>
                        <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input" id="profile_photo_path" >
                    </div>
                        <div class="form-group">
                        <h5></h5>
                            <img src="{{(!empty($data->profile_photo_path))? url('upload/user_images/'.$data->profile_photo_path):url('upload/no_image.jpg')}}" width="100px" height="100px" id="image" alt="Card image cap">
                        </div>   
                        <div class="text-center">
                        <input type="submit" class="btn-upper btn btn-primary checkout-page-button text-center" value="Update">
                        </div> 
                    
                </form>	
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#profile_photo_path').change((e)=>{
            var reader = new FileReader;
            reader.onload = function(e){
                $('#image').attr('src',e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

@endsection