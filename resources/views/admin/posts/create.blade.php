 <!-- Modal -->
 <div class="modal fade" id="create-published" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <form action="{{route('admin.posts.store','#create')}}" method="POST">
              {{ csrf_field() }}  
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> <strong>Agregar el titulo de tu nueva publicacion</strong> 

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </h4>
              </div>
              <div class="modal-body">
    
                  <div id="modal-clean" class="form-group {{$errors->has('title')? 'has-error':''}}">
                      {{-- <label for="">Titulo de la Publicación</label> --}}
                      <input id="post-tittle" type="text" name="title" value="{{old('title')}}" 
                      class="form-control" placeholder="Ingresa aqui el titulo de la publicación" autofocus required>
                    {!! $errors->first('title','<span id="modal-clean-span" class="help-block">:message</span>') !!}
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
  @push('scripts')
  <script>
      // console.log(window.location.hash);
      if (window.location.hash === '#create') {
        $('#create-published').modal('show');
      }

      $('#create-published').on('hide.bs.modal', function () {
        window.location.hash = '#';
      });

      $('#create-published').on('shown.bs.modal', function () {
        $("#post-tittle").focus();
        $("#post-tittle").val('');
        $("#modal-clean").removeClass('has-error');
        $("#modal-clean-span").hide();
        window.location.hash = '#create';
      });
      
</script>
  @endpush