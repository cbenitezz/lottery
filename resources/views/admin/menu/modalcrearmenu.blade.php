<div class="modal fade" id="modalcrearmenu-1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    {!! Form::open(['route'=>'principal.store','method'=>'post']) !!}

       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Crear Item Menú </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>

             </div>
             <div class="modal-body">
               <div class="row">

                   <div class="col-lg-12 form-group">
                    <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                       {!! Form::label('name', 'Nombre de la opción') !!}
                       {!! Form::text('name', null, ['class'=>'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ),'placeholder'=>'Nombre']) !!}
                       @error('name')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                   </div>
                   



               </div>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
               {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}

             </div>
           </div>
         </div>


   {!! Form::close() !!}
 </div>
