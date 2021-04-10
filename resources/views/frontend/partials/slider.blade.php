<div class="slider">
    <div class="slider__wrapper">
        @foreach($latestPosts as $lp)
        <div class="slider__item fadeImg ">
            <img src="{{ asset('/storage/assets/img/post/'.$lp->image->path) }}" class="imgCarousel" alt="{{ $lp->title }}" />
            <div class="slider__item__content d-flex flex-column align-items-center">
                <div class="slider__item__cat">
                    <a href="#">{{ $lp->category->name }}</a>
                </div>
                <a href="{{route("blog",["id"=>$lp->id])}}" class="slider__item__title">{{ $lp->title }}</a>
                <div class="slider__item__meta d-flex justify-content-center align-items-center">
                    <i class="fas fa-user-circle"></i>
                    <p class="ml-2">Written by: {{ $lp->user->firstname }} {{ $lp->user->lastname }}
                        @php

                            $publishedDate = $lp->published_at;
                            $newFormat = date('d/m/Y', strtotime($publishedDate));
                            echo $newFormat;

                        @endphp
                    </p>
                </div>
            </div>
        </div>
    @endforeach

        <!--Navigation arrows -->
        <a id="down" href="#"><i class="fas fa-angle-down"></i></a>
        <div id="circles">
            <span class="circle" id="dot1"></span>
            <span class="circle" id="dot2"></span>
            <span class="circle" id="dot3"></span>
            <span class="circle" id="dot4"></span>
            <span class="circle" id="dot5"></span>
        </div>
    </div>
</div>
