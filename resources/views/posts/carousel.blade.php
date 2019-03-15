
@push('styles')
<link rel="stylesheet" href="/css/slider-pro.css">
@endpush

<div class="slider-pro" id="my-slider">
	<div class="sp-slides">
    <!-- Slide  -->
    @foreach ($post->photos as $photo)
        
		<div class="sp-slide">
			<img class="sp-image" src="{{url($photo->url)}}"/>
		</div>
    @endforeach
    
		
	</div>
</div>

@push('scripts')
<script src="/js/jquery.sliderPro.min.js"></script>

<script type="text/javascript">
	jQuery( document ).ready(function( $ ) {
		$( '#my-slider' ).sliderPro({
      fullScreen:true,
      width: 960,
	    height: 500,
	    arrows: true,
	    buttons: true,
	    waitForLayers: true,
	    fade: true,
	    autoplay: true,
      autoplayDelay: 4000,
	    autoScaleLayers: false
    });
	});
</script>


@endpush