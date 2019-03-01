@extends('admin.plantilla')

@section('header')
     <h1>
        Posts
        <small>Crear publicación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{route('admin.posts.index')}}"><i class="fa fa-list"></i> Posts</a></li>
        <li class="active">Crear</li>
      </ol>
@endsection

@section('contenido')

<div class="row">
    <div class="col-md-12">
        @if ($post->photos->count())
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @foreach ($post->photos as $photo)
                        <form action="{{route('admin.photos.destroy',$photo)}}" method="post">
                            {{ method_field('DELETE') }} {{ csrf_field() }}
                            <div class="col-md-2">
                                <button type="submit" style="position:absolute" class="btn btn-danger btn-xs"> <i class="fa fa-times" aria-hidden="true"></i></button>
                                <img class="img-responsive" src="{{url($photo->url)}}" alt="">
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
    <form action="{{route('admin.posts.update',$post)}}" method="POST">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="col-md-8">
            <div class="box box-primary">

                    <div class="box-body">
                    
                        <div class="form-group {{$errors->has('title')? 'has-error':''}}">
                          <label for="">Titulo de la Publicación</label>
                          <input type="text" name="title" value="{{old('title',$post->title)}}" class="form-control" placeholder="Ingresa aqui el titulo de la publicación">
                        {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{$errors->has('body')? 'has-error':''}}">
                                <label for="">Contenido Publicación</label>
                                <textarea name="body" id="editor" class="form-control"  rows="10" placeholder="Ingresa el contenido completo de la publicación" >
                                    {{old('body',$post->body)}}
                                </textarea>
                                {!! $errors->first('body','<span class="help-block">:message</span>') !!}
                        </div>
                        
                        <div class="form-group {{$errors->has('iframe')? 'has-error':''}}">
                                <label >Contenido embebido (iframe)</label>
                                <textarea name="iframe" id="iframe"  class="form-control"  rows="2" placeholder="Ingresa contenido embedido (iframe) de audio o video" >
                                    {{old('iframe',$post->iframe)}}
                                </textarea>
                                {!! $errors->first('iframe','<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                
                <div class="box-body">

                    <!-- Date -->
                    <div class="form-group">
                        <label>Fecha de publicación:</label>
                    
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" value="{{old('published_at',$post->published_at ? $post->published_at->format('m/d/Y') : null)}}" name="published_at" class="form-control pull-right" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>
                      <!-- /.form group -->

                    <div class="form-group {{$errors->has('category_id')? 'has-error':''}}">
                        <label>Selecciona una categoria</label>

                        <select name="category_id" class="form-control select2" >
                            <option value="">Selecciona una categoria</option>
                            @foreach ($categories  as $category)
                                <option value="{{$category->id}}" {{old('category_id',$post->category_id) == $category->id ? 'selected': ''}}
                                    >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{$errors->has('tags')? 'has-error':''}}">
                            <label>Etiquetas</label>
    
                            <select name="tags[]" class="form-control select2" multiple="multiple" style="width: 100%;" data-placeholder="Selecciona una o mas etiquetas">
                                @foreach ($tags  as $tag)
                                    <option {{collect(old('tags',$post->tags->pluck('id')))->contains($tag->id) ? 'selected':''}}
                                     value="{{$tag->id}}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('tags','<span class="help-block">:message</span>') !!}
                        </div>
                    
                    <div class="form-group {{$errors->has('excerpt')? 'has-error':''}}">
                        <label for="">Extracto Publicación</label>
                        <textarea name="excerpt"  rows="2" class="form-control" 
                        placeholder="Ingresa un extracto de la publicación" >{{ old('excerpt',$post->excerpt) }}
                        </textarea>
                        {!! $errors->first('excerpt','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <div class="dropzone"></div>
                    </div>

                    <div class="form-group " style="padding: 15px;">
                        <button type="submit" class="btn btn-primary btn-block"> Guardar Publicación</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>
    


@endsection



    @push('styles')
          <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="/adminlte/plugins/datepicker/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/dropzone/dropzone.min.css">
    @endpush

    @push('scripts')
        <!-- bootstrap datepicker -->
        <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.min.js"></script>
        <script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
        <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
        <script src="/adminlte/plugins/dropzone/dropzone.min.js"></script>
        <script>
            //Date picker
            $('#datepicker').datepicker({
              autoclose: true
            })


            CKEDITOR.replace('editor');
            CKEDITOR.config.height=315;

            //Initialize Select2 Elements
            $('.select2').select2({
                'tags':true
            });

           var myDropzone = new Dropzone('.dropzone',{
                url:'/admin/posts/{{$post->url}}/photos',
                acceptedFiles: 'image/*',
                maxFilessize: 2,//numero dado en megabit
                paramName: 'photo',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token()}}'
                },
                dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',
            });

            myDropzone.on('error',function (file,res) {
                var msg = res.errors.photo[0];
                
                $(".dz-error-message:last > span").text(msg);
                
              });

            Dropzone.autoDiscover = false;
            
        </script>
    @endpush