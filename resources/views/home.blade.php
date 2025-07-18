<x-home-layout>
<section id="homescreen">
    <div class="home-first-sec mt-32">
        <div class="container">
            <div class="home-first-sec-wrap">
                <h1>@lang('locale.hey'), {{ auth()->user()->firstname .' '. auth()->user()->name }}</h1>
                <p class="mt-8">@lang('locale.welcome', ['suffix' => env('APP_SECOND_NAME') ])</p>	
            </div>
        </div>
    </div>
    <div class="home-offer-sec mt-32">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide carousel slide-shop-now2" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active show-now2-custom-btn" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="show-now2-custom-btn" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="show-now2-custom-btn" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="shop-now1-sec">
                            <div class="offer-details" style="visibility: hidden">
                                <div class="offer-details-wrap">
                                    <div class="offer-price">
                                        <p>40% OFF</p>
                                        <h2 class="mt-12">Today’s Special</h2>
                                    </div>
                                    <div class="home1-shop-now-btn">
                                        <p>USE CODE G40</p>	
                                    </div>
                                </div>
                                <div class="discount-txt mt-16">
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="shop-now2-sec">
                            <div class="offer-details" style="visibility: hidden">
                                <div class="offer-details-wrap">
                                    <div class="offer-price">
                                        <p>40% OFF</p>
                                        <h2 class="mt-12">Today’s Special</h2>
                                    </div>
                                    <div class="home1-shop-now-btn">
                                        <p>USE CODE G40</p>	
                                    </div>
                                </div>
                                <div class="discount-txt mt-16">
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="shop-now3-sec">
                            <div class="offer-details" style="visibility: hidden">
                                <div class="offer-details-wrap">
                                    <div class="offer-price">
                                        <p>40% OFF</p>
                                        <h2 class="mt-12">Today’s Special</h2>
                                    </div>
                                    <div class="home1-shop-now-btn">
                                        <p>USE CODE G40</p>	
                                    </div>
                                </div>
                                <div class="discount-txt mt-16">
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                    <p>Get a discount for every course order!<br>Only valid for today!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-mentor mt-32">
        <div class="home-category-wrap container">
            <div class="homescreen-second-wrapper-top">
                <div class="categories-first">
                    <h2 class="home1-txt3">@lang('locale.direct_children')</h2>
                </div>
                <div class="view-all-second">
                    <a href="{{ route('children') }}" class="navlink"><p class="see-all-txt">@lang('locale.see_all')<span><img src="{{ asset(ispublicpath() .'svg/right-arrow.svg') }}" alt="right-arrow"></span></p></a>
                </div>
            </div>
        </div>
        <div class="home-mentor-bottom mt-16">
            @foreach (auth()->user()->children() as $item)
            <div class="home-mentor-sec-wrap redirect-mentor">
                <div class="home-mentor-sec">
                    <div><img src="{{ uiavatar( $item->name. ' ' .$item->firstname ) }}" alt="PROFILE PHOTO"></div>
                </div>
                <!--<div class="home-mentor-name"><p>{{ $item->name }}</p></div>-->
            </div>
            @endforeach
        </div>
    </div>
    <div class="home-course mt-32">
        <div class="home-course-wrapper-top">
            <div class="container">
                <div class="categories-first">
                    <h4 class="home1-txt3">🧿 @lang('locale.service', ['prefix'=>__('locale.all'), 'suffix'=>'s'])</h4>
                </div>
            </div>
        </div>
        <div class="home-course-wrapper-bottom mt-16">
            <div class="home-course-wrapper-bottom-full">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show active" id="pills-all" role="tabpanel"  tabindex="0">
                        <div class="container">
                            @foreach ($services as $item)
                            <div class="result-found-bottom-wrap mt-16 single-course">
                                <div class="result-img-sec">
                                    <img src="{{ asset(ispublicpath() . $item->image) }}" alt="{{ app()->getLocale() == 'en' ? $item->name : $item->nom }}">
                                </div>
                                <div class="result-content-sec">
                                    <h1 class="d-none">Search</h1>
                                    <div class="result-content-sec-wrap">
                                        <div class="content-first">
                                            <div class="result-bottom-txt">
                                                <p>{{ app()->getLocale() == 'en' ? $item->name : $item->nom }}</p>
                                            </div>
                                        </div>
                                        <div class="content-second mt-12">
                                            <p class="text-white">
                                                <span class='short text-white'>{{ substr(app()->getLocale() == 'en' ? $item->description : $item->details, 0, 135) }}</span> 
                                                <span class='long text-white' style='display: none'>{{ app()->getLocale() == 'en' ? $item->description : $item->details }}</span> 
                                                <span class='dottoggle text-success font-weight-bold'>@lang('locale.more')</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(".home-mentor-bottom").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        swipeToSlide: true,
        infinite:true,
        variableWidth: true,
        autoplaySpeed: 2000,
        dots: false,
        arrows:false
    });
    
    $('.dottoggle').each(function () {
        $(this).on('click', function () {
            let parent = $(this).parent();
            let short = parent.children('.short')
                long = parent.children('.long');
                
            if($(this).text() == 'More' || $(this).text() == 'Plus') {
                $(this).text($(this).text() == 'More' ? 'Less' : 'Moins')
                $(this).removeClass('text-success').addClass('text-danger');
                
                long.css('display', 'inline')
                short.css('display', 'none')
            } else {
                $(this).text($(this).text() == 'Moins' ? 'Plus' : 'More');
                $(this).removeClass('text-danger').addClass('text-success');
                
                long.css('display', 'none')
                short.css('display', 'inline')
            }
        });
    });
</script>
@endpush
</x-home-layout>
