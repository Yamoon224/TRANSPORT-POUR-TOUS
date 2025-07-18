<x-home-layout>
<section id="ongoing-section">
    <div class="container">
        <h1 class="d-none">@lang('locale.children')</h1>
        <div class="ongoing-section-wrap mt-24">
            <ul class="nav nav-pills ongoing-courses-tab" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="direct-children-tab" data-bs-toggle="pill" data-bs-target="#direct-children" type="button" role="tab" aria-controls="direct-children" aria-selected="true">@lang('locale.direct_children')</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="indirect-children-tab" data-bs-toggle="pill" data-bs-target="#indirect-children" type="button" role="tab" aria-controls="indirect-children" aria-selected="false">@lang('locale.indirect_children')</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="direct-children" role="tabpanel" aria-labelledby="direct-children-tab" tabindex="0">
                    <div class="ongoing-section-details">
                        @foreach (auth()->user()->children() as $item)
                        <div class="ongoing-section-details-wrap category-redirect my-4">
                            <div class="ongoing-first">
                                <img src="{{ uiavatar( $item->name. ' ' .$item->firstname ) }}" alt="PROFILE PHOTO" style="height: 40px; width: 40px">
                            </div>
                            <div class="ongoing-second">
                                <div class="ongoing-second-wrap">
                                    <div class="ongoing-details">
                                        <h2 class="ongoing-txt1">{{ $item->name. ' ' .$item->firstname }}</h2>
                                        <div class="mt-2">
                                            <span class="ongoing-img"><img src="{{ asset(ispublicpath() .'/images/checkout-screen/time-icon.svg') }}" alt="Icon" ></span>
                                            <span class="ongoing-txt2">{{ $item->phone .' | ' .$item->code }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="indirect-children" role="tabpanel" aria-labelledby="indirect-children-tab" tabindex="0">
                    <div class="Completed-section-details">
                        @foreach (auth()->user()->subchildren() as $child)
                        <div class="ongoing-section-details-wrap complete-course my-4">
                            <div class="ongoing-first">
                                <img src="{{ uiavatar( $child->name. ' ' .$child->firstname ) }}" alt="LOGO" style="height: 40px; width: 40px">
                            </div>
                            <div class="ongoing-second">
                                <div class="ongoing-second-wrap">
                                    <div class="ongoing-details">
                                        <h2 class="ongoing-txt1">{{ $child->name. ' ' .$child->firstname }}</h2>
                                        <div class="mt-2">
                                            <span class="ongoing-img"><img src="{{ asset(ispublicpath() .'/images/checkout-screen/time-icon.svg') }}" alt="time-icon" ></span>
                                            <span class="ongoing-txt2">{{ $child->phone .' | ' .$child->code }}</span>
                                        </div>
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
</section>
</x-home-layout>
