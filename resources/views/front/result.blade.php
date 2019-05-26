
@extends('front.layouts.main')

@section('result')
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-80 cl5">
                    Результаты глобального поиска
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Все товары
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Женский
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Мужской
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                        Сумка
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                        Обуви
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                        Часы
                    </button>
                </div>
            </div>


            <div class="row isotope-grid">
            </div>
            @if($results)

                @foreach($results as $result)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item @php  if($result->category_id == 5) echo "women"; elseif ($result->category_id == 6) echo "men" @endphp">
                        <!-- Block2 -->

                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{asset('storage')}}/{{$result->image}}" alt="{{$result->title}}">
                                <a itemid="{{$result->id}}" href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    <i class="fa fa-eye"> </i>  Посмотреть
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{$result->title}}
                                    </a>
                                    <span class="stext-105 cl3">
									{{number_format($result->price)}} ТГ
								</span>
                                </div>
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="{{asset('images/icons/icon-heart-01.png')}}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('images/icons/icon-heart-02.png')}}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <div class="customer" style="background: #fafafa;margin-bottom: 16px;">
                    <div class="customer-wrapper">
                        <h2>Ничего не найдено! Попробуйте поискать другие товары...</h2>
                    </div>
                </div>

                {{--<div class="flex-c-m flex-w w-full p-t-45">--}}
                    {{--<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">--}}
                        {{--Загрузить еще--}}
                    {{--</a>--}}
                {{--</div>--}}

                @endif
        </div>
    </section>

@endsection
