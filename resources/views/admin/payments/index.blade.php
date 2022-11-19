@extends('layouts.dashboard.app')
@section('title', 'Control de Pagos')

@section('content')

<!-- Abono -->
   <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">
                                    <i class="fa fa-th-list" aria-hidden="true"></i> Abono de Boletas

                                    <span class="float-right">
                                        <i class="fa fa-archive" aria-hidden="true"></i>Cajero:
                                        {{ auth()->user()->profile->name}} {{ auth()->user()->profile->last_name }}
                                        </span>
                                </h4>

                            </div>
                            <div class="card-body">
                                <form  id="form_abono_boleta">
                                    @csrf
                                    <input type="hidden" id="usuario_cajero" value="{{ auth()->user()->profile->name}} {{ auth()->user()->profile->last_name }}">
                                    <input type="hidden" id="lottoId" value="{{ $lottoId}} ">
                                    <div class="form-body">
                                        <div class="row p-t-10">
                                            <div class="col-md-6">
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
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Boleta #</label>
                                                    <input type="text"
                                                           maxlength="4"
                                                           pattern="\d{4}|\d{3}"
                                                           required
                                                           id="boleta"
                                                           onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                           class="form-control"
                                                           placeholder="#">
                                                           <small id="messages" class=" hidden form-control-feedback color-danger">
                                                             <strong> Boleta no Válida </strong></small> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row p-t-10">
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Recibo #</label>
                                                    <input type="text"
                                                           required
                                                           maxlength="5"
                                                           pattern="\d{3}|\d{4}|\d{5}"
                                                           onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                           id="talonario"
                                                           class="form-control form-control-danger"
                                                           placeholder="#">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Valor</label>
                                                    <input type="text"
                                                           required
                                                           id="valor"
                                                           maxlength="5"
                                                           pattern="\d{5}"
                                                           onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                           class="form-control form-control-danger"
                                                           placeholder="$"
                                                           min ="1000"
                                                           max ="90000">
                                                           <small id="messages_pay" class=" hidden form-control-feedback color-danger">
                                                             <strong> Boleta Pagada o excede valor! </strong></small>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                    </div>
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-info">
                                            <span class="label label-rouded label-warning">
                                             <i class="fa fa-usd fa-2" aria-hidden="true"></i>
                                            </span>&nbsp;

                                             Aceptar y Guardar
                                            </button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-outline-info">

                            <div class="card-header">
                                <h4 class="m-b-0 text-white">
                                    <i class="fa fa-print" aria-hidden="true"></i> Reporte Generado
                                    <span class="float-right">
                                        <i class="fa fa-user" aria-hidden="true"></i> <span id="user_seller"></span>
                                    </span>

                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table_reporte">
                                        <thead>
                                            <tr>
                                                <th>Boleta #</th>
                                                <th>Recibo</th>
                                                <th>Abono</th>
                                                <th>Saldo</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="card-footer col-md-offset-3 col-md-9">
                                <input type="hidden" id="usuario_cajero" value="{{ auth()->user()->profile->name}} {{ auth()->user()->profile->last_name }}">
                                <span id="user_seller_cc"></span>
                                <button type="submit" id="btn_imprimir_reporte" class="btn btn-warning" >
                                    <span class="color-dark">
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                         Generar PDF</span>
                                </button>

                            </div>
                        </div>

                    </div>
                </div>
@endsection
@push('script')
<script>
    $('.modal').removeClass('fade');
    $("#user_seller_cc").hide();
    $("#btn_imprimir_reporte").hide();

    $("#btn_imprimir_reporte").click(function () {
       let arrayDatos = [];
       let boleta,talonario,abono,saldo,usuario,usuario_seller,usuario_cajero;
       let lottery,usuario_seller_cc;

       // ----------------- array ----------------------
        let convertedIntoArray = [];
        $("table#table_reporte tr").each(function() {
            let rowDataArray = [];
            let actualData = $(this).find('td');
            if (actualData.length > 0) {
                actualData.each(function() {
                    rowDataArray.push($(this).text());
                });
                convertedIntoArray.push(rowDataArray);
            }
        });

        let array_table = JSON.stringify(convertedIntoArray);
            usuario_seller    = $('#user_seller').text();
            usuario_seller_cc = $('#user_seller_cc').text();
            lottery           = $('#lottery_id option:selected').val();
            usuario_cajero    = $('#usuario_cajero').val();

            //console.log(array_table);
            //alert(usuario_seller_id);
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
                        // window.open('{!! storage_path() !!}'+result.filePdf, '_blank');

                        //console.log(result.contar);
                        }

                    },
                    error: function (result) {
                        console.log('Error:', result);
                    }
                });
            event.preventDefault();


   });




    $('#form_abono_boleta').submit(e=>{
            e.preventDefault();
            let lottery_id = $('#lottery_id').val();
            let boleta  = $('#boleta').val();
            let talonario   = $('#talonario').val();
            let valor = $('#valor').val();
            let usuario_cajero = $('#usuario_cajero').val();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                    type: "POST",
                    url: '/payment',
                    data:{
                        lottery_id:lottery_id,
                        boleta:boleta,
                        talonario:talonario,
                        valor:valor,
                        usuario_cajero:usuario_cajero,

                    },
                    success: function (result){
                        console.log(result);
                        if(result.data == 'invalida')
                        {
                            $("#messages").show();

                        }
                        if(result.data == true){

                            let saldo = result.array.saldo;
                            $("#btn_imprimir_reporte").show();
                            $('#user_seller').html(result.array.seller);
                            $('#user_seller_cc').html(result.array.vendedorCc);

                            $('#table_reporte').append(
                                    "<tr>\
                                        <td id='ticket'>"+result.array.boleta+"</td>\
                                        <td id='talonario'>"+result.array.talonario +"</td>\
										<td id='abono'>$"+result.array.valor  +"</td>\
                                        <td id='saldo'>$"+saldo+"</td>\
									</tr>");


                         //window.location.href = '/admin/boleteria/'+lottery;
                        //console.log(result.contar);
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


</script>
@endpush
