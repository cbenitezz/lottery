@extends('layouts.dashboard.app')
@section('title', 'Crear Cliente / Vendedor')

@section('content')

<div class="row">
    <div class="col-lg-12">
        @if (Session::has('succes'))
            <div class="alert alert-success alert-dismissible  fade show mb-4 mt-4" role="alert">
                <i class="icon-check"></i>
                {{Session::get('succes')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4 mt-4" role="alert">
                {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif


    </div>

</div><!-- end view -->
<div class="row">

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">

            <a href="/customer" class="btn btn-success active  float-right">
                <i class="fa fa-align-justify"></i> Listar</a>
                <h6 class="card-title mb-0"><strong>Cliente :{{$customer->name}}</strong></h6>
                <div class="small text-muted">Debe Seleccionar Sorteo y Números</div>
        </div>
        <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
                <div class="card-body">
                    <div class="card-title">

                    </div>

                    <form  id="form_select_ticket">
                        @csrf
                        <input type="hidden" id="customer" name="customer" value="{{$customer->id}}">
                        <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">Seleccione el Sorteo</label>
                                        <select class="form-control" id="lottery_id" name="lottery_id">

                                            @foreach($lotteries as $key=>$value)
                                            <option value="{{ $key }}">
                                            {{ strtoupper($value) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">Digite Número</label>
                                        <input type="text" maxlength="4" pattern="\d{4}|\d{3}" required id="tickets"
                                         onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                         class="form-control" placeholder="#" id="tickets" name="tickets">

                                        <small id="messages" class=" hidden form-control-feedback color-danger">
                                        <strong> Boleta no Válida </strong></small>



                                            <small id="messages" class=" hidden form-control-feedback color-danger">
                                            <strong> Boleta no Válida </strong></small>
                                            @error('ticket')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group" >
                                        <label class="control-label">Abono Total</label>
                                        <input type="text" id="abono" name="abono" maxlength="5" pattern="\d{4}|\d{5}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required
                                        class="form-control form-control-danger"  placeholder="$"  min ="1000" max ="90000">
                                        <small id="messages_pay" class="form-control-feedback color-dark">
                                        Valor minimo $5000</small>
                                    </div>
                                </div>
                        </div>
                        <!---->


                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" id="registro_ticket" class="btn btn-lg btn-info btn-block" >
                                    <span class="color-white">Registrar Números</span>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" id="registro_save_ticket" class="btn btn-lg btn-success btn-block" >
                                    <span class="color-white">Guardar Cliente y Números</span>
                                </button>
                            </div>

                            </div>
                        </div>

                    </form>
                   <br>
                </div>
            </div>
            <div class="card-footer">
                Numeros Registrados:<span id="numbersregister"></span>
              </div>
        </div>

    </div> <!-- .card -->

</div>
</div>
@endsection
@push('script')
<script>
    $('.modal').removeClass('fade');
    $("#user_seller_cc").hide();
    $("#registro_save_ticket").hide();

    $('#form_select_ticket').submit(e=>{
            e.preventDefault();

            let customer   = $('#customer').val();
            let lottery_id = $('#lottery_id').val();
            let tickets    = $('#tickets').val();
            let abono      = $('#abono').val();

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });

            //alert(lottery_id + "   " +tickets + "   " +customer +"   " + abono );
            $.ajax({
                    type: "POST",
                    url: '/admin/users/customer',
                    data:{
                        lottery_id:lottery_id,
                        tickets   :tickets,
                        customer  :customer,
                        abono     :abono,

                    },
                    success: function (result){
                        $("#registro_save_ticket").show();
                        if(result.data == 'invalida')
                        {
                            $("#messages").show();

                        }
                        if(result.data == true){
                           console.log(result.ticket);
                           $('#tickets').val('');
                           $('#numbersregister').append('<strong>'+result.ticket +'-'+'</strong>');
                        }
                        if(result.data == 'pagada')
                        {
                          $("#messages_pay").show();
                          $("#messages_pay").fadeOut(2000);

                        }


                    },
                    error: function (result) {
                        console.log('Error:', result);
                    }
                });

        });

      /* -------------------CLICK BUTTOM------------------- */


      $("#registro_save_ticket").click(function () {

       let tickets = [];
       let numbers = $('#numbersregister').text();

       alert(numbers);
       event.preventDefault();
/*
        $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                    type: "POST",
                    url: '/printer',
                    data:{
                        array_table,
                        usuario_seller,
                        lottery,
                        usuario_cajero,
                        usuario_seller_cc,
                    },
                    success: function (result){
                        console.log(result);

                        if(result.data == true){

                           // imprimir();
                        //window.location.href = '/storage/'+result.filePdf;
                         window.open('/storage/'+result.filePdf, '_blank');
                        //console.log(result.contar);
                        }

                    },
                    error: function (result) {
                        console.log('Error:', result);
                    }
                });

*/

   });


</script>
@endpush
