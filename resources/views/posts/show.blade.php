@extends('plantilla')

@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)


@section('contenido')
<article class="post  container">

      @if ($post->photos->count() === 1)
				
		    <figure><img src="{{$post->photos->first()->url}}" alt="" class="img-responsive"></figure>
      
      @elseif($post->photos->count() > 1)

        @include('posts.carousel');
        
      @elseif ($post->iframe)
				<div class="video">
					{!! $post->iframe !!}
				</div>
			@endif
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{ $post->published_at->format('M d') }}</span>
        </div>
        <div class="post-category">
          <span class="category">{{ $post->category->name }}</span>
        </div>
      </header>
      <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          {!! $post->body !!}
        </div>

        <footer class="container-flex space-between">

          {{-- incluimos los botones de las redes sociales --}}
          @include('partials.social-links',['description'=> $post->title])

          <div class="tags container-flex">
                @foreach ($post->tags as $tag)
								
                <span class="tag c-gray-1 text-capitalize" style="color: gray;">#{{ $tag->name }}</span>
                @endforeach
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.disqus-scripts')                          
      </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('scripts')
    <script id="dsq-count-scr" src="//blog-personal.disqus.com/count.js" async></script>
@endpush