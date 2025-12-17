{{-- {!!dd($teacher)!!} --}}

<style>
    select#gender {
        width: 100%;
        height: 40px;
        border: 1px solid #e3e6f3;
    }

    .medsaveclick {
        /* padding-top: 10px !important; */
        color: white;
    }

    .remove_btn {
        position: absolute;
        top: -11px;
        right: -10px;
        background: red;
        text-align: right;
        padding-right: 5px;
        font-size: 15px;
        color: white;
        /* font-weight: bold; */
        cursor: pointer;
        border-radius: 50px;
        width: 20px;
        height: 20px;
    }

    .car_images.col-md-2 {
        margin: 13px 3px;
        border: solid 1px #996418;
        border-radius: 10px;
        padding: 5px;
    }

    .car_images {
        position: relative;
        display: inline-block;
    }
</style>

@if ($message = Session::get('error'))

    <div class="alert alert-danger">
        <ul>
            @foreach ($message->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="form-group">
    {!! Form::label('subject', 'Subject') !!}
    <div>
        {!! Form::text('subject', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Enter testimonial Subject',
            'required',
            'maxlength' => '201',
        ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    <div>
        {!! Form::text('title', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Enter testimonial Title',
            'required',
            'maxlength' => '201',
        ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Testimonial') !!}
    <div>
        {!! Form::textarea('description', null, [
            'class' => 'form-control',
            'data-parsley-required' => 'true',
            'data-parsley-trigger' => 'change',
            'placeholder' => 'Enter Testimonial...',
            'required',
            'maxlength' => '1000',
        ]) !!}
    </div>
</div>

<span id="err" class="error-product"></span>
<div class="form-group col-md-12">
</div>
<div class="col-md-5 pull-left">
    <div class="form-group text-center">
        <div>
            {!! Form::submit('Save', [
                'class' => ' btn-block btn-lg btn-parsley medsaveclick',
                'onblur' => 'return validateForm();',
            ]) !!}
        </div>
    </div>
</div>
@section('app_jquery')
<script>
    $('form').on('submit', function() {
        console.log("image_url value:", $('#image_url').val());
    });
</script>
    <script>
        function show_image(image_url) {
            // Remove any existing images
            $('.upload_images').empty();

            // Add the new image
            var img = `
        <div class="car_images col-md-2">
            <img src="${image_url}">
            <input type="hidden" name="image_url" value="${image_url}">
        </div>
                    `;
            $('.upload_images').append(img);
        }

        function remove_image(e) {
            $(e).parent().remove();
        }

        function validateForm() {
            return true;
            var total_images = $(".image_url").length;
            if (total_images) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection
