@extends('plantilla')

@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)


@section('contenido')
<article class="post  container">
      {{--VISTA POLIMORFICA  --}}

      @include($post->viewType(''))

    <div class="content-post">
      
      @include('posts.header')
      
      <h1>{{ $post->title }}</h1>

        <div class="divider"></div>
            <div class="image-w-text">
              {!! $post->body !!}
            </div>

        <footer class="container-flex space-between">

          {{-- incluimos los botones de las redes sociales --}}
          @include('partials.social-links',['description'=> $post->title])

          @include('posts.tags')
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