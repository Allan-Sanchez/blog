@extends('plantilla')

@section('contenido')
<section class="pages container">
		<div class="page page-archive">
			<h1 class="text-capitalize">Archivos</h1>
			<p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
			<div class="divider-2" style="margin: 35px 0;"></div>
			<div class="container-flex space-between">
				<div class="authors-categories">
					<h3 class="text-capitalize">authors</h3>
					<ul class="list-unstyled">
						@forelse ($authors as $author)
							<li> {{$author->name}}</li>
						@empty
							<li>Sin usuarios en la Base de datos</li>
						@endforelse
					</ul>
					<h3 class="text-capitalize">categories</h3>
					<ul class="list-unstyled">
						@forelse ($categories as $category)
						<a style="text-decoration: none; color: #000;" href="{{route('categorias.show',$category)}}">
							<li class="text-capitalize">{{$category->name}}</li>
						</a>
						@empty
						<li>Sin categorias...</li>
						@endforelse
					</ul>
				</div>
				<div class="latest-posts">
					<h3 class="text-capitalize">Ultimas Publicaciones</h3>
						@forelse ($posts as $post)
						<a style="text-decoration: none; color: #000;" href="{{route('posts.show',$post)}}">
							<p>{{$post->title}}</p>
						</a>
							
						@empty
							<p>No hay Publicaciones por mostrar</p>
						@endforelse

					<h3 class="text-capitalize">Publicaciones por Mes</h3>
					<ul class="list-unstyled">
						@forelse ($archivo as $data)
						<a style="text-decoration: none; color: #000;" href="{{route('pages.home',['month'=>$data->month, 'year' => $data->year])}}">
							<li class="text-capitalize">{{$data->monthname}} {{$data->year}} ({{$data->posts}})</li>
						</a>
						@empty
							<p>Sin fecha...</p>
						@endforelse
					</ul>
				</div>
			</div>
		</div>
</section>
@endsection