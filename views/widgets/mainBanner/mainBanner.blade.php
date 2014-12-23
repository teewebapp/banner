<div id="bannerCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($banner->items as $pos => $item)
            <li data-target="#bannerCarousel" data-slide-to="{{$pos}}" class="{{$pos==0?'active':''}}"></li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($banner->items as $pos => $item)
            <div class="item{{$pos==0?' active':''}}">
                <img class="background-image" src="{{$getBackgroundByPos($pos)}}" />
                <div class="carousel-image-container">
                    <img id="image_banner_{{$pos}}" class="carousel-image" src="{{URL::to($item->image->url('left'))}}" />
                    <script type="text/javascript">
                        (function() {
                            var elImg = document.getElementById('image_banner_{{$pos}}');
                            var tout_id = null;
                            cb = function() {
                                var carousel = elImg.parentNode;
                                if(elImg.offsetHeight > 10)
                                {
                                    maxHeight = carousel.offsetHeight - 40;
                                    if(elImg.offsetHeight > maxHeight) {
                                        var razao = maxHeight / elImg.offsetHeight;
                                        var newHeight = razao * elImg.offsetHeight;
                                        var newWidth  = razao * elImg.offsetWidth;
                                        elImg.style.width  = Math.round(newWidth) + 'px';
                                        elImg.style.height = Math.round(newHeight) + 'px';
                                    }

                                    var diff = carousel.offsetHeight - elImg.offsetHeight;
                                    var val = Math.round(diff / 2);
                                    if(val > 0)
                                    {
                                        clearInterval(tout_id);
                                        elImg.style.marginTop = (val - 20) + 'px';
                                    }
                                }
                            };
                            tout_id = setInterval(cb, 500);
                            elImg.onload = cb;
                        })();
                    </script>
                </div>
                <div class="carousel-text">
                    <h2>{{{ $item->title }}}</h2>
                    <p>{{ $item->description }}}</p>
                    @if($item->url)
                        <a href="{{$item->url}}" class="btn btn-primary">Saiba mais</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#bannerCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#bannerCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>

<!-- Script to Activate the Carousel -->
<script>
    $('#bannerCarousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

