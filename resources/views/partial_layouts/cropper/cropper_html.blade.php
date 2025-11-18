<style>
    .cke_notifications_area {
        display: none !important;
    }
    .vdvjib img {
        max-width: 100px;
        margin-bottom: 7px;
        border: 1px solid;
        border-radius: 11px;
    }

    .image_area {
        position: relative;
    }

    img {
        display: block;
        max-width: 100%;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }

    .modal-lg {
        max-width: 1000px !important;
    }

    .overlay {
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.5);
        overflow: hidden;
        height: 0;
        transition: .5s ease;
        width: 100%;
    }

    .medsaveclick {
        color: white;
        padding: 1px !important;
    }

    .image_area:hover .overlay {
        height: 50%;
        cursor: pointer;
    }

    .tickbox input {
        height: 23px;
    }

    .text {
        color: blue;
        font-size: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .vsdas {
        margin: -29px -10px;
        margin-bottom: 3%;
    }

    .installmet_div_row {
        padding: 5px 10px;
        border: 1px solid #e6e6e6;
        margin-bottom: 5px;
    }
    .preview-container {
        text-align: center;
    }

    .preview-box {
        margin: 10px auto;
        border: 2px dashed #ccc;
        overflow: hidden;
    }

    .preview-box.active {
        border-color: #007bff;
    }

    .cropping-options .btn.active {
        background-color: #007bff;
        color: white;
    }

    /* Ensure images never stretch containers */

    /* Hide all cropping options except Standard */
    .cropping-options .btn-group {
        display: none; /* Hide the entire button group */
    }

    /* Show only Standard option */
    .cropping-options .standard-only {
        display: block !important;
        text-align: center;
    }

    .cropping-options .standard-only .btn {
        background-color: #007bff !important;
        color: white !important;
        border: none !important;
        padding: 8px 20px !important;
        border-radius: 4px !important;
        font-weight: 500 !important;
    }
</style>
<div class="modal fade" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="text-align: center; font-size: 14px; font-weight: 600;" class="modal-title">
                    Crop Image 
                    <!-- - Standard Format (4:3) -->
                </h5>
            </div>
            <div class="modal-body">
                <!-- Cropping Options - Only Standard -->
                <div class="cropping-options text-center mb-3">
                    <div class="standard-only">
                        <button type="button" class="btn btn-sm btn-primary" onclick="setCropRatio(4, 3, this)">
                            Standard Format (4:3)
                        </button>
                    </div>
                    <!-- Hidden button group -->
                    <div class="btn-group" role="group" style="display: none;">
                        <button type="button" class="btn btn-sm btn-outline-primary active" onclick="setCropRatio(1, 1, this)">
                            Square
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="setCropRatio(4, 3, this)">
                            Standard
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="setCropRatio(16, 9, this)">
                            Wide
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="setFreeCrop(this)">
                            Free Form
                        </button>
                    </div>
                </div>
                
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="cropper_sample_image">
                        </div>
                        <div class="col-md-4">
                            <div class="preview-container">
                                <h6>Preview:</h6>
                                <!-- Show only Standard preview -->
                                <div class="preview-standard preview-box" style="width: 200px; height: 150px;"></div>
                                <!-- Hide other previews -->
                                <div class="preview-square preview-box" style="width: 150px; height: 150px; display: none;"></div>
                                <div class="preview-wide preview-box" style="width: 200px; height: 112px; display: none;"></div>
                                <div class="preview-free preview-box" style="width: 150px; height: 150px; display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Apply Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

{{-- <input type="file" {!! $required !!} name="image" class="image crop_upload_image"
image_width="378"
image_height="226"
aspect_ratio_width="16"
aspect_ratio_height="9"
id="upload_image" style="display:block" /> --}}


<!-- cropper open -->

<!-- endbuild -->
{{-- <script src="{{ asset('public/theme/vendor/parsleyjs/dist/parsley.min.js') }}"></script> --}}
{{-- <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" /> --}}
<link href="https://unpkg.com/cropperjs@1.5.12/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/cropperjs@1.5.12/dist/cropper.js"></script>
<!-- cropper close -->

<script>
var modal = $('#crop-modal');
var image = document.getElementById('cropper_sample_image');
var cropper;
var image_width;
var image_height;
var aspect_ratio_width;
var aspect_ratio_height;
var selected_image_input;
let currentAspectRatio = 4/3; // Default to Standard (4:3)
let currentImageType = 'profile'; // profile, life, or gallery
var upload_input_by_name = '';

$(function() {
    // Update the file change function to detect image type
    $('.crop_upload_image').change(function(event) {
        selected_image_input = event.target; // Use global variable
        upload_input_by_name = $(selected_image_input).attr('upload_input_by_name');
        
        console.log('Selected input:', selected_image_input);
        console.log('Upload input name:', upload_input_by_name);
        
        // Detect what type of image this is based on the input name or class
        if (upload_input_by_name.includes('prof_img')) {
            currentImageType = 'profile';
            setDefaultAspectRatio(1, 1); // Square for profile
        } else if (upload_input_by_name.includes('life_image')) {
            currentImageType = 'life';
            setDefaultAspectRatio(4, 3); // Standard for life images
        } else {
            currentImageType = 'gallery';
            setDefaultAspectRatio(4, 3); // Standard for gallery too
        }
        
        var files = event.target.files;
        var done = function(url) {
            image.src = url;
            modal.modal('show');
        };
        
        if (files && files.length > 0) {
            var reader = new FileReader();
            reader.onload = function() {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    function setDefaultAspectRatio(width, height) {
        currentAspectRatio = width / height;
        aspect_ratio_width = width;
        aspect_ratio_height = height;
        
        // Set appropriate dimensions based on image type
        switch(currentImageType) {
            case 'profile':
                image_width = 300;
                image_height = 300;
                break;
            case 'life':
                image_width = 600;
                image_height = 400;
                break;
            case 'gallery':
                image_width = 400;
                image_height = 300; // 4:3 ratio for gallery
                break;
        }
        console.log('Set dimensions:', image_width, 'x', image_height, 'for', currentImageType);
    }

    // Enhanced cropper initialization - Always use Standard (4:3)
    modal.on('shown.bs.modal', function() {
        console.log('Modal shown, initializing cropper with Standard aspect ratio:', currentAspectRatio);
        
        // Destroy existing cropper if any
        if (cropper) {
            cropper.destroy();
        }
        
        // Always set to Standard (4:3) ratio
        currentAspectRatio = 4/3;
        aspect_ratio_width = 4;
        aspect_ratio_height = 3;
        
        cropper = new Cropper(image, {
            aspectRatio: currentAspectRatio,
            viewMode: 1, // Restrict crop box to image size
            autoCropArea: 0.8, // Start with 80% of image
            movable: true,
            zoomable: true,
            rotatable: true,
            scalable: true,
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            ready: function() {
                console.log('Cropper ready with Standard (4:3) aspect ratio');
                // Auto-detect and center on likely face area
                var containerData = this.cropper.getContainerData();
                
                // Try to center on top 60% of image (where faces usually are)
                this.cropper.setCropBoxData({
                    left: (containerData.width - (containerData.width * 0.8)) / 2,
                    top: (containerData.height - (containerData.height * 0.6)) / 3,
                    width: containerData.width * 0.8,
                    height: containerData.height * 0.6
                });
            }
        });
    }).on('hidden.bs.modal', function() {
        console.log('Modal hidden');
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    $('#crop').click(function() {
        console.log('Crop button clicked');
        console.log('Cropper instance:', cropper);
        console.log('Current image type:', currentImageType);
        console.log('Upload input name:', upload_input_by_name);
        
        // Check if cropper is initialized
        if (!cropper) {
            console.error('Cropper not initialized');
            alert('Please select an image first');
            return;
        }
        
        var canvas = cropper.getCroppedCanvas({
            width: image_width,
            height: image_height
        });
        
        console.log('Canvas:', canvas);
        
        // Check if canvas is valid
        if (!canvas) {
            console.error('Canvas is null or undefined');
            alert('Error: Could not process image. Please try again.');
            return;
        }
        
        canvas.toBlob(function(blob) {
            if (!blob) {
                console.error('Blob creation failed');
                alert('Error: Could not process image. Please try again.');
                return;
            }
            
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    url: "{{ asset('cropper/crop_image') }}",
                    method: 'POST',
                    data: {
                        image: base64data,
                        pre_image: '',
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        console.log('Upload success:', data);
                        modal.modal('hide');
                        if (data.status) {
                            var cropped_file_input = '<input type="hidden" name="' + upload_input_by_name + '" value="' + data.image + '">';
                            $(selected_image_input).parent().find('input[name="' + upload_input_by_name + '"]').remove();
                            $(selected_image_input).parent().append(cropped_file_input);
                            
                            // Update the visible image
                            updateDisplayImage(data.image, currentImageType);
                            console.log('Image cropped successfully for:', currentImageType);
                        } else {
                            console.error('Upload failed:', data);
                            alert('Error: ' + (data.message || 'Upload failed'));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                        alert('Error: Could not upload image. Please try again.');
                    }
                });
            };
            
            reader.onerror = function() {
                console.error('FileReader error');
                alert('Error: Could not process image. Please try again.');
            };
        }, 'image/jpeg', 0.95);
    });

    function updateDisplayImage(imageUrl, type) {
        console.log('Updating display image for:', type, 'URL:', imageUrl);
        switch(type) {
            case 'profile':
                // This will be handled when the form is submitted
                break;
            case 'life':
                // This will be handled when the form is submitted  
                break;
            case 'gallery':
                // Gallery images are handled separately
                break;
        }
    }

    $('.crop_upload_image').click(function() {
        $(this).val('');
    });
});

// Keep only the Standard cropping function
function setCropRatio(width, height, element) {
    console.log('Setting crop ratio to Standard:', width, 'x', height);
    // Always set to Standard (4:3)
    currentAspectRatio = 4/3;
    aspect_ratio_width = 4;
    aspect_ratio_height = 3;
    
    if (cropper) {
        cropper.setAspectRatio(currentAspectRatio);
    }
}

// Remove or comment out the Free Crop function since we don't need it
/*
function setFreeCrop(element) {
    console.log('Setting free crop');
    $('.cropping-options .btn').removeClass('active');
    $(element).addClass('active');
    
    $('.preview-box').hide();
    $('.preview-free').show();
    
    if (cropper) {
        cropper.setAspectRatio(NaN); // Free form
        aspect_ratio_width = NaN;
        aspect_ratio_height = NaN;
    }
}
*/
</script>
