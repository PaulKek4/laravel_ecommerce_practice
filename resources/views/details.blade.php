@extends('layouts.base')

@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo2.css') }}">

    <style>
        .product-box .product-details h5 {
            width: 100%;
        }

    </style>
@endpush

@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{{ $product->name }}</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('app.index') }}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section> <!-- Shop Section start -->

<section>
    <div class="container">
        <div class="row gx-4 gy-5">
            <div class="col-lg-12 col-12">
                <div class="details-items">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="details-image-vertical black-slide rounded">
                                        <div>
                                            <img src="{{ asset ('assets/images/fashion/product/front') }}/{{ $product->image }}" class="img-fluid blur-up lazyload" alt="{{ $product->name }}">
                                        </div>
                                        @if ($product->images)
                                            @php
                                                $images = explode(',',$product->images)
                                            @endphp
                                                @foreach ($images as $image)
                                                    <div>
                                                        <img src="{{ asset ('assets/images/fashion/product/front') }}/{{ $image }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="details-image-1 ratio_asos">
                                        <div>
                                            <img src="{{ asset ('assets/images/fashion/product/front') }}/{{ $product->image }}" class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="{{ $product->name }}">
                                        </div>
                                        @if ($product->images)
                                            @php
                                                $images = explode(',',$product->images)
                                            @endphp
                                                @foreach ($images as $image)
                                                    <div>
                                                        <img src="{{ asset('assets/images/fashion/product/back') }}/{{ $image }}"
                                                            class="img-fluid w-100 image_zoom_cls-1 blur-up lazyload" alt="">
                                                    </div>
                                                @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="cloth-details-size">
                                <div class="details-image-concept">
                                    <h2>{{ $product->name }}</h2>
                                </div>

                                <h3 class="price-detail">
                                    @if ($product->sale_price)
                                    ${{$product->sale_price}}
                                        <del>${{$product->regular_price}}</del><span>
                                        {{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100) }}
                                        % off</span>
                                    @else
                                        ${{$product->regular_price}}
                                    @endif
                                </h3>


                                <div class="product-buttons">
                                    
                                    <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('addtocart').submit();"
                                        id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Add To Cart</span>
                                        <form id="addtocart" method="post" action="{{ route('cart.store') }}">
                                            @csrf
                                             <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" id="qty" value="1">
                                        </form>
                                    </a>



                                </div>

                                <ul class="product-count shipping-order">
                                    <li>
                                        <img src="../assets/images/gif/truck.png" class="img-fluid blur-up lazyload"
                                            alt="image">
                                        <span class="lang">Free shipping for orders above $500 USD</span>
                                    </li>
                                </ul>

                                <div class="mt-2 mt-md-3 border-product">
                                    <h6 class="product-title hurry-title d-block">
                                        @if ($product->stock_status == 'instock')
                                        Instock
                                        @else
                                        Out of Stock
                                        @endif
                                    </h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 78%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="cloth-review">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#desc" type="button">Description</button>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="desc">
                            <div class="shipping-chart">
                                {{ $product->description }}
                            </div>
                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</section>
<!-- Shop Section end -->

<!-- product section start -->
<section class="ratio_asos section-b-space overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-lg-4 mb-3">Customers Also Bought These</h2>
                <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                    @foreach ($rproducts as $rproduct)
                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{ route('shop.product.details',['slug'=>$rproduct->slug]) }}">
                                        <img src="{{ asset('assets/images/fashion/product/front') }}/{{ $rproduct->image }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="{{ route('shop.product.details',['slug'=>$rproduct->slug]) }}">
                                        <img src="{{ asset('assets/images/fashion/product/back') }}/{{ $rproduct->image }}"
                                            class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{ $rproduct->category->name }}</span>
                                </div>
                                <div class="main-price">
                                    <a href="{{ route('shop.product.details',['slug'=>$rproduct->slug]) }}" class="font-default">
                                        <h5>{{ $rproduct->name }}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">{{ $rproduct->category->name }}</span>
                                        <p class="font-light">{{ $rproduct->short_description }}</p>
                                    </div>
                                    <h3 class="theme-color">$@if($rproduct->sale_price){{ $rproduct->sale_price }}@else{{ $rproduct->regular_price }}@endif</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->
@endsection


