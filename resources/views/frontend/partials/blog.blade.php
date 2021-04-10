{{--@dd($post)--}}
<article class="blog__post col-sm-12 col-md-6 mb-5">
    <div class="blog__post__media">
        <figure class="post__media__image">
            <img src="{{ $post->image->path }}" class="img-fluid"/>
        </figure>
    </div>
    <div class="blog__post__body">
        <header class="blog__post__header">
            <aside class="blog__post__cat">
                <div class="cat__links">
                    <span class="screen__reader__txt"></span>
                    <a href="#">{{ $post->category->name }}</a>
                </div>
            </aside>
            <h3 class="blog__post__title">
                <a href="">{{ $post->title }}</a>
            </h3>
            <aside class="blog__post__footer">
                      <span class="blog__post__footer__author">
                        <i class="fas fa-user-circle"></i>Written by: {{ $post->user->firstname }} {{ $post->user->lastname }}
                      </span>
                <span class="blog__post__footer__date">{{ $post->published_at }}</span>
            </aside>
        </header>
    </div>
</article>
