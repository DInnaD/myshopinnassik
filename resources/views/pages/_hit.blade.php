<div class="product">
    <div class="container">
        <div class="product-top">

            @foreach ($hits->chunk(4) as $hit)
                <div class="product-one">
                @foreach ($hit as $product)
                   <div class="col-md-3 product-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="{{route('product.show', $product->slug)}}" class="mask">
                                <img class="img-responsive zoom-img" src="{{$product->getImage()}}" alt="{{$product->title}}" />
                            </a>
                            <div class="product-bottom">
                                <h3>{{$product->title}}</h3>
                                <p>{{$product->description}}</p>
                                <h4>
                                    <a class="add-to-cart-link">
                                        <i></i>
                                    </a>
                                    <span class=" item_price">{{$product->price * $val->value}}
                                        @if($val->symbol_left)
                                            {{$val->symbol_left}}
                                        @else
                                            {{$val->symbol_right}}
                                        @endif</span></h4>
                                @if($product->old_price)
                                    <small>
                                        <del>
                                            {{$product->old_price * $val->value}}
                                            @if($val->symbol_left)
                                                {{$val->symbol_left}}
                                            @else
                                                {{$val->symbol_right}}
                                            @endif
                                        </del>
                                    </small>
                                @endif
                            </div>
                            <div class="srch">
                                @if($product->old_price)
                                    <small>
                                        <del>
                                            <span>{{100 -  (100 * $product->price / $product->old_price)}} %</span>
                                        </del>
                                    </small>
                                @endif
                            </div>
                        </div>
                   </div>

                @endforeach
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
    </div>
</div>
