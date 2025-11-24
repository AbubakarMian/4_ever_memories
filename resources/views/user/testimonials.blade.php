@extends('user_layout.main_header_footer')
@section('title')
    <title>4ever Memories</title>
@endsection

@section('headerfiles')
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('public/images/favicon.png') !!}" />
    <link href="{!! asset('public/css/main.css') !!}" rel="stylesheet">
    <link href="{!! asset('public/css/testimonials.css') !!}" rel="stylesheet">
@endsection

@section('body')
    <section>
        <div class="testimonalpbanner">
            @include('user_layout.components.banner_menu')
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannerdata aboutheading">
                            <h1>TESTIMONIALS</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="testdataarea">
            <div class="container">
                <div class="row">
                    @if($testimonial->count() > 0)
                        @foreach($testimonial as $index => $testimonialItem)
                            <div class="col-sm-6">
                                <div class="testdataa">
                                    <img src="{!! asset('public/images/quote.png') !!}" class="img-responsive">
                                    @if($testimonialItem->subject)
                                        <h3 class="testimonial-subject">{{ $testimonialItem->subject }}</h3>
                                    @endif
                                    @if($testimonialItem->title)
                                        <h4 class="testimonial-title">{{ $testimonialItem->title }}</h4>
                                    @endif
                                    <p class="testimonial-description">
                                        {{ $testimonialItem->description }}
                                    </p>
                                    <div class="namearea">
                                        <h3>{{ substr($testimonialItem->subject ?: $testimonialItem->title ?: 'A', 0, 1) }}</h3>
                                        <p>{{ $testimonialItem->subject ?: $testimonialItem->title ?: 'Anonymous' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Add clearfix for every 2 items to maintain proper layout --}}
                            @if(($index + 1) % 2 == 0)
                                <div class="clearfix"></div>
                            @endif
                        @endforeach
                    @else
                        <div class="col-sm-12">
                            <div class="testdataa text-center">
                                <img src="{!! asset('public/images/quote.png') !!}" class="img-responsive">
                                <p>No testimonials available at the moment.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection