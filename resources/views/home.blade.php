@extends('layouts.v2.layout')

@section('content')
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($banners as $banner)
                <div class="item-slick1 item{{ $loop->index + 1 }}-slick1" style="background-image: url({{ URL::asset($banner->image_url) }});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
                            {{ $banner->title }}
                        </h2>

                        <span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							{{ $banner->description }}
						</span>

                        @if ($banner->url)
                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="{{ $banner->url }}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Ver agora
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Banner -->
    <div class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30">
                            <img src="{{ URL::asset($category->image) }}?v={{ date('YmdHis') }}" alt="{{ $category->name }}">

                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->
                                <a href="{{ URL::to('categoria/'.$category->slug) }}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    {{ $category->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Our product -->
    <section class="bgwhite p-t-45 p-b-58">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text5 t-center">
                    Em promoção
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">

                <!-- Tab panes -->
                <div class="tab-content p-t-35">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="{{ URL::asset($product->image) }}" alt="{{ $product->name }}">

                                        <div class="block2-overlay trans-0-4">
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Adicionar
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a href="{{ URL::to('produto/'.$product->slug) }}" class="block2-name dis-block s-text3 p-b-5">
                                            {{ $product->name }}
                                        </a>

                                        <span class="block2-price m-text6 p-r-5">
											R${{ number_format($product->price, 2, ",", ".") }}
										</span>
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

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Entrega local e via Correios
                </h4>

                <a href="#" class="s-text11 t-center">
                    Clique para mais informações
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    Troca gratuita
                </h4>

                <span class="s-text11 t-center">
					Você pode trocar o produto em até 30 dias.
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Loja física
                </h4>

                <span class="s-text11 t-center">
					Estamos situados em Curitiba/PR. Devido à quarentena por COVID-19, nossa loja encontra-se fechada e operando apenas por este canal.
				</span>
            </div>
        </div>
    </section>
@endsection
