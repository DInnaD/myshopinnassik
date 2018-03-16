<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            @foreach($brand as $item)
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="{{$item->getImage()}}" alt=""/>
                        <figcaption>
                            <h2>{{$item->title}}</h2>
                            <p>{!!$item->description!!}</p>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
