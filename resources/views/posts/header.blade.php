<header class="container-flex space-between">
    <div class="date">
        {{-- <span class="c-gris">{{ $post->published_at ? $post->published_at->format('M d') :'' }}</span> --}}
        <span class="c-gray-1" style="color: gray;">
            {{ optional($post->published_at)->format('M d')}} 
        </span>
        <span class="c-gray-1" style="color: gray;"> {{$post->owner->name}}
        </span>
    </div>

    @if ($post->category)
    <div class="post-category">
        <span class="category text-capitalize"><a href="{{route('categorias.show',$post->category)}}">{{
                $post->category->name }}</a></span>
    </div>
    @endif

</header>
