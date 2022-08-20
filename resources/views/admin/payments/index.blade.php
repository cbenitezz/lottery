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
                                    <input type="hidden" id="usuario" value="{{ auth()->user()->profile->name}} {{ auth()->user()->profile->last_name }}">
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
                                                           pattern="\d{4}"
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
                                                    <label class="control-label">Talonario #</label>
                                                    <input type="text"
                                                           required
                                                           maxlength="5"
                                                           pattern="\d{5}"
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
                                                             <strong> Boleta Pagada ! </strong></small>
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
                                                <th>Talonario</th>
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
                                <button type="submit" id="btn_imprimir_reporte" class="btn btn-warning" >
                                    <span class="color-dark">
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                         Imprimir</span>
                                </button>

                            </div>
                        </div>

                    </div>
                </div>
@endsection
@push('script')
<script>
    $('.modal').removeClass('fade');
    $("#btn_imprimir_reporte").hide();

    $("#btn_imprimir_reporte").click(function () {
       let arrayDatos = [];
       let boleta,talonario,abono,saldo,usuario;
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
            usuario = $('#user_seller').val();
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
                        usuario,
                    },
                    success: function (result){
                        console.log(result);

                        if(result == true){

                           // imprimir();
                         //window.location.href = '/admin/boleteria/'+lottery;
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
            let usuario = $('#usuario').val();
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
                        usuario:usuario,

                    },
                    success: function (result){
                        console.log(result);
                        if(result.data == 'invalida')
                        {
                            $("#messages").show();

                        }
                        if(result.data == true){

                            let saldo = 90000-result.array.valor;
                            $("#btn_imprimir_reporte").show();
                            $('#user_seller').html(result.array.seller);

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
