@extends('user_layout.main_header_footer')

@section('title')
    <title>4Year Project Blog</title>
@endsection

@section('headerfiles')
    <link href="{!! asset('public/theme/user_theme/css/blog.css') !!}" rel="stylesheet">
@endsection

@section('body')
    <section>
        <div class="blogtopbanner">
            @include('user_layout.components.banner_menu')
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannerdata aboutheading">
                            <h1>BLOG</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="blogarea">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        @if(isset($blog) && count($blog) > 0)
                            @foreach($blog as $index => $post)
                                @if($index == 0)
                                    {{-- First/main blog post --}}
                                    <div class="blogareadata">
                                        <div class="image-container">
                                            <img src="{{ asset($post->image ?? 'public/theme/user_theme/images/image1.jpg') }}" 
                                                 class="responsive-image" 
                                                 alt="{{ $post->title }}"
                                                 loading="lazy">
                                        </div>
                                        <div class="blogertext">
                                            <h5>{{ $post->subject ?? 'Blog Subject' }}</h5>
                                            <h2>{{ $post->title ?? 'Blog Title' }}</h2>
                                            <h3>
                                                {{ ($post->description) ?? 'Blog description...' }}
                                            </h3>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                @else
                                        <div class="col-sm-12">
                                            <div class="blogareadataa">
                                                <div class="image-container">
                                                    <img src="{{ asset($post->image ?? 'public/theme/user_theme/images/image2.jpg') }}" 
                                                         class="responsive-image" 
                                                         alt="{{ $post->title }}"
                                                         loading="lazy">
                                                </div>
                                                <div class="blogertext">
                                                    <h5>{{ $post->subject ?? 'Blog Subject' }}</h5>
                                                    <h2>{{ $post->title ?? 'Blog Title' }}</h2>
                                                    <h3>
                                                       {{($post->description) ?? 'Blog description...' }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                                    </div> {{-- Close row --}}
                        @else
                            {{-- Fallback content if no blog posts exist --}}
                            <div class="blogareadata">
                                <div class="image-container">
                                    <img src="{!! asset('public/theme/user_theme/images/image1.jpg')!!}" 
                                         class="responsive-image" 
                                         alt="Child Loss"
                                         loading="lazy">
                                </div>
                                <div class="blogertext">
                                    <h5>Child Loss, Coping With Grief</h5>
                                    <h2>Coping with the grief of child loss can be a difficult and heartbreaking process. </h2>
                                    <h3>One-way parents may cope is by connecting with other people who have experienced similar losses. It is important to find both professional and informal support networks, such as bereavement groups or online forums. Talking openly about the pain of losing a child can help to ...</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="blogareadataa">
                                        <div class="image-container">
                                            <img src="{!! asset('public/theme/user_theme/images/image2.jpg')!!}" 
                                                 class="responsive-image" 
                                                 alt="Phenomenon Of Death"
                                                 loading="lazy">
                                        </div>
                                        <div class="blogertext">
                                            <h5>Phenomenon Of Death</h5>
                                            <h2>Death is an inevitable phenomenon in the world. It is a universal truth that no one can escape from death. </h2>
                                            <h3>Death has been part of human life since time immemorial and it is something that we all must eventually face. There are many different beliefs and theories surrounding death, with cultures around the world having their own unique views on its ....</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="sideblogdata">
                            <div class="sideblog">
                                <div class="image-container">
                                    <img src="{!! asset('public/theme/user_theme/images/jacob-about.png')!!}" 
                                         class="responsive-image" 
                                         alt="About Us"
                                         loading="lazy">
                                </div>
                                <p>Our success story is attributed to the great confidence bestow on us by our various students; because we know that your success in your career path is ultimately our success as an organization.</p>
                            </div>
                            
                            <div class="catagedata">
                                <h3>Categories</h3>
                                <div class="catclicks">
                                    {{-- You might want to generate these dynamically from your blog tags --}}
                                    @if(isset($blog) && count($blog) > 0)
                                        @php
                                            $categories = [];
                                            foreach($blog as $post) {
                                                if($post->tags) {
                                                    $postCategories = explode(',', $post->tags);
                                                    foreach($postCategories as $cat) {
                                                        $trimmedCat = trim($cat);
                                                        if(!empty($trimmedCat) && !in_array($trimmedCat, $categories)) {
                                                            $categories[] = $trimmedCat;
                                                        }
                                                    }
                                                }
                                            }
                                        @endphp
                                        
                                        @if(count($categories) > 0)
                                            @foreach($categories as $category)
                                                <a href="{{ url('user/blog/category/' . Str::slug($category)) }}" class="btn btn-primary catclick">{{ $category }}</a>
                                            @endforeach
                                        @else
                                            {{-- Fallback categories --}}
                                            <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Child Loss</a>
                                            <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Coping With Grief</a>
                                            <a href="{!! asset('user/blog/death')!!}" class="btn btn-primary catclick">End-of-life</a>
                                            <a href="{!! asset('user/blog/death')!!}" class="btn btn-primary catclick">Funeral Planning</a>
                                            <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Grief Counseling</a>
                                            <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Grief Experience</a>
                                            <a href="{!! asset('user/blog/our_story')!!}" class="btn btn-primary catclick">It Is Interesting</a>
                                            <a href="{!! asset('user/testing')!!}" class="btn btn-primary catclick">Online Memorials</a>
                                            <a href="{!! asset('user/blog/death')!!}" class="btn btn-primary catclick">Phenomenon Of Death</a>
                                        @endif
                                    @else
                                        {{-- Fallback categories if no blog posts --}}
                                        <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Child Loss</a>
                                        <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Coping With Grief</a>
                                        <a href="{!! asset('user/blog/death')!!}" class="btn btn-primary catclick">End-of-life</a>
                                        <a href="{!! asset('user/blog/death')!!}" class="btn btn-primary catclick">Funeral Planning</a>
                                        <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Grief Counseling</a>
                                        <a href="{!! asset('user/blog/child_loss')!!}" class="btn btn-primary catclick">Grief Experience</a>
                                        <a href="{!! asset('user/blog/our_story')!!}" class="btn btn-primary catclick">It Is Interesting</a>
                                        <a href="{!! asset('user/testing')!!}" class="btn btn-primary catclick">Online Memorials</a>
                                        <a href="{!! asset('user/blog/death')!!}" class="btn btn-primary catclick">Phenomenon Of Death</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection