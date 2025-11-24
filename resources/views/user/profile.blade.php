@extends('user_layout.main_header_footer')

@section('title')
    <title>4Year Project Contact-US</title>
@endsection


@section('headerfiles')
<link href="{!! asset('public/theme/user_theme/css/contactus.css') !!}" rel="stylesheet">
<style>
    .contacttopbanner {
        /* border-bottom: 5px none #2dafc3; */
        background-image: url("{!!asset('public/theme/images/profilepage.jpeg')!!}")!important;
        /* background-image: url(../public/images/profilepage.jpeg)!important; */
        /* background-position: 100%;
        background-size: cover;
        background-repeat: no-repeat; */
    }
    .profile-sidebar {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .profile-photo-section {
        margin-bottom: 20px;
    }

    .profile-photo-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 20px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .profile-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .profile-photo-container:hover .photo-overlay {
        opacity: 1;
    }

    .upload-btn {
        color: white;
        background: #4a69bd;
        padding: 8px 15px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 14px;
        transition: background 0.3s ease;
    }

    .upload-btn:hover {
        background: #3c5aa8;
    }

    .profile-info h3 {
        color: #333;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .profile-info p {
        color: #666;
        font-size: 14px;
    }

    .profile-form {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .profile-form h2 {
        color: #333;
        margin-bottom: 25px;
        font-weight: 600;
        border-bottom: 2px solid #4a69bd;
        padding-bottom: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 600;
        color: #555;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 12px 15px;
        font-size: 14px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #4a69bd;
        box-shadow: 0 0 0 2px rgba(74, 105, 189, 0.2);
        outline: none;
    }

    .form-control[readonly] {
        background-color: #f8f9fa;
        opacity: 0.7;
    }

    .profile-save-btn {
        background: linear-gradient(135deg, #6a89cc, #4a69bd);
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 5px;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 10px;
    }

    .profile-save-btn:hover {
        background: linear-gradient(135deg, #5a79bc, #3c5aa8);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    @media (max-width: 768px) {
        .profile-sidebar {
            margin-bottom: 30px;
        }
        
        .profile-photo-container {
            width: 120px;
            height: 120px;
        }
    }
</style>
@endsection

@section('body')
    <section>
        <div class="contacttopbanner">
            @include('user_layout.components.banner_menu')
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannerdata aboutheading">
                            <h1>Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="profile-sidebar">
                    <div class="profile-photo-section">
                        <div class="profile-photo-container">
                            <?php 
                                $avatar_url = isset($user->avatar) ? $user->avatar : asset('public/images/prof_img1.png');
                            ?>
                            <img src="{!! $avatar_url !!}" 
                                 alt="Profile Photo" 
                                 class="profile-photo img-responsive" 
                                 id="profileImage">
                            <div class="photo-overlay">
                                <label for="photoUpload" class="upload-btn">
                                    <i class="fa fa-camera"></i> Change Photo
                                </label>
                                <input type="file" id="photoUpload" name="avatar" accept="image/*" style="display: none;">
                            </div>
                        </div>
                        <div class="profile-info">
                            <h3 id="displayName">{!!$user->first_name!!}</h3>
                            <p id="displayEmail">{!!$user->email!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="profile-form">
                    <h2>Edit Profile</h2>
                    <form id="profileForm" method="post" action="{!! asset('user/profile/update') !!}" enctype="multipart/form-data">
                        {!!@csrf_field()!!}
                        <div class="form-group">
                            <label for="name">Full Name*</label>
                            <input type="text" class="form-control" id="name" name="first_name" 
                                   placeholder="Enter your full name" value="{!!$user->first_name!!}" required>
                        </div>
                        <div class="form-group">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="current_password"
                                   placeholder="Enter current password to make changes">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="new_password"
                                   placeholder="Enter new password (optional)">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password"
                                   placeholder="Confirm new password">
                        </div>
                        <button type="submit" class="btn btn-primary profile-save-btn">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('jqueryscript')
<script>
$(document).ready(function() {
    // Profile photo upload functionality
    $('#photoUpload').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profileImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Update display name when typing
    $('#name').on('input', function() {
        $('#displayName').text($(this).val() || "Your Name");
    });
    
    // Form submission
    $('#profileForm').on('submit', function(e) {
        e.preventDefault();
        
        // Basic validation
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();
        
        // if (newPassword && newPassword !== confirmPassword) {
        //     alert("New passwords don't match!");
        //     return;
        // }
        
        const photoFile = $('#photoUpload')[0].files[0];
        if (photoFile) {
            // Create a new file input and append it to the form
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = 'avatar';
            fileInput.files = $('#photoUpload')[0].files;
            fileInput.style.display = 'none';
            
            // Remove existing avatar input if any
            $('input[name="avatar"]').remove();
            
            // Append the new file input to the form
            this.appendChild(fileInput);
        }
        
        // Show loader modal
        // $('#loaderModal').modal('show');
        this.submit();
        
        // Create FormData object to handle file upload
        // const formData = new FormData(this);
        
        // // Add the photo file if selected
        // const photoFile = $('#photoUpload')[0].files[0];
        // if (photoFile) {
        //     formData.append('avatar', photoFile);
        // }
        
        // $.ajax({
        //     url: "{!! asset('user/profile/update') !!}",
        //     method: "POST",
        //     data: formData,
        //     processData: false,
        //     contentType: false,
        //     success: function(response) {
        //         // Hide loader modal
        //         $('#loaderModal').modal('hide');
                
        //         // Handle success response
        //         if(response.success) {
        //             // Show success message using your existing system
        //             showAlert('success', response.message || "Profile updated successfully!");
                    
        //             // Update displayed data if needed
        //             if(response.user_data) {
        //                 $('#displayName').text(response.user_data.name || $('#name').val());
        //                 if(response.user_data.avatar) {
        //                     $('#profileImage').attr('src', response.user_data.avatar);
        //                 }
        //             }
        //         } else {
        //             showAlert('error', response.message || "An error occurred while updating the profile.");
        //         }
        //     },
        //     error: function(xhr) {
        //         // Hide loader modal
        //         $('#loaderModal').modal('hide');
                
        //         // Handle error response
        //         let errorMessage = "An error occurred while updating the profile.";
                
        //         if(xhr.responseJSON && xhr.responseJSON.message) {
        //             errorMessage = xhr.responseJSON.message;
        //         } else if(xhr.status === 422 && xhr.responseJSON.errors) {
        //             // Laravel validation errors
        //             const errors = xhr.responseJSON.errors;
        //             errorMessage = Object.values(errors)[0][0];
        //         }
                
        //         showAlert('error', errorMessage);
        //     }
        });
    });
    
    // Function to show alerts using your existing system
    function showAlert(type, message) {
        if(type === 'success') {
            // You can modify this to use your existing success message system
            alert("Success: " + message);
        } else {
            // You can modify this to use your existing error message system
            alert("Error: " + message);
        }
    }
    
</script>
@endsection