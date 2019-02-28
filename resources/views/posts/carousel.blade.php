
@push('styles')
<link rel="stylesheet" href="/css/flickity.css">
@endpush

<div class="main-carousel">
    @foreach ($post->photos as $photo)
        
    <div class=""><img src="{{url($photo->url)}}" alt=""></div>
    @endforeach
    
</div>

@push('scripts')
<script src="/js/flickity.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      
        $('.main-carousel').flickity({
          // options
        //   freeScroll: true,
        imagesLoaded: true,
          autoPlay: true,
          autoPlay: 1500,
          
        //   cellAlign: 'right',
          contain: true,
        //   fade : true
        });
    });
  </script>
@endpush