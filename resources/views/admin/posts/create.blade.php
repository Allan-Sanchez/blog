 <!-- Modal -->
 <div class="modal fade" id="create-published" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <form action="{{route('admin.posts.store')}}" method="POST">
              {{ csrf_field() }}  
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Agregar el titulo de tu nueva publicacion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
    
                  <div class="form-group {{$errors->has('title')? 'has-error':''}}">
                      {{-- <label for="">Titulo de la Publicación</label> --}}
                      <input type="text" name="title" value="{{old('title')}}" class="form-control" required laceholder="Ingresa aqui el titulo de la publicación">
                    {!! $errors->first('title','<span class="help-block">:message</span>') !!}
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Crear publicación</button>
              </div>
            </div>
          </div>
        </form>
        </div>
      