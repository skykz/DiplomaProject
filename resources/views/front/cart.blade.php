
@extends('front.layouts.main')

@section('index')
    <!-- Product -->

    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85" method="post" action="{{route('apply.order')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Товар</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Цена</th>
                                    <th class="column-4">Вычисление</th>
                                    <th class="column-5">Количество</th>
                                    <th class="column-6">Итого</th>
                                </tr>
                                @foreach($products as $product)
                                    <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{asset('storage')}}/{{$product['item']['image']}}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{$product['item']['title']}}</td>
                                        <input type="hidden" name="product_titles[]" value="{{$product['item']['title']}}"/>
                                        <input type="hidden"  name="product_images[]" value="{{$product['item']['image']}}"/>
                                        <input type="hidden" name="product_prices[]" value="{{$product['item']['price']}}"/>
                                    <td class="column-3">{{number_format($product['item']['price'])}}</td>
                                        <td class="column-4">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-close"></i>
                                            </div>
                                        </td>
                                    <td class="column-5">
                                        @csrf
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1[]" value="{{$product['qty']}}">
                                            <input type="hidden" name="product_id[]" value="{{$product['item']['id']}}">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                        <input type="hidden" name="current_user_id" value="{{Auth::user()->id}}"/>
                                    <td class="column-6">{{number_format($product['price'])}} тг</td>
                                        <td class="column-6">
                                            <a class="flex-c-m stext-101 cl2 size-118 bg8 bor12 hov-btn3 p-lr-15 trans-04 pointer m-tb-8" href="{{url('payment/card/form')}}/{{Auth::user()->id}}/{{$product['item']['id']}}"> Купить </a>
                                        </td>
                                </tr>
                                    @endforeach
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Введите Промокод">
                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                   Потвердить код
                                </div>
                            </div>
                            <a href="{{url('destroyCartItems')}}">
                            <div class="flex-c-m stext-101 cl2 size-119 bg10 bor13 hov-btn1 p-lr-15 trans-04 pointer m-tb-10">
                               <span style="color: white">Очистить</span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Итоги корзины
                        </h4>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-209">
								<span class="mtext-110 cl2">
								</span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Доставка:
								</span>
                            </div>
                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    Нет доступных способов доставки. Пожалуйста, проверьте ваш адрес или свяжитесь с нами, если вам нужна помощь.
                                </p>
                                <div class="p-t-15">
									<span class="stext-112 cl8">
										Рассчитать стоимость доставки
									</span>
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city_region" placeholder="Область / Город">
                                    </div>
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="street_number" placeholder="Улица / дом №">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
								<span class="mtext-101 cl2">
									Итог:
								</span>
                            </div>

                            <input type="hidden" value=" {{number_format($totalPrice)}}" name="totalPrice"/>
                            <input type="hidden" value=" {{number_format($totalQuantity)}}" name="totalQuantity">
                            <div class="size-209 p-t-1">
								<span  class="mtext-110 cl2">
                                    {{number_format($totalPrice)}} тг
								</span>
                            </div>
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                            Потвердить и оплатить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
