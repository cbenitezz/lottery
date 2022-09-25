@extends('layouts.dashboard.app')
@section('content')


<!-- Start Page Content -->
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-bag f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">Activos:{{$lotteryActive}}
                        <span class="label label-rouded label-warning ">{{$lotteries}}</span>
                    </h2>
                    <p class="m-b-0">Número de Sorteos</p>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-pink p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{$customer}}</h2>

                    <p class="m-b-0">Número de Clientes</p>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{$seller}}</h2>

                    <p class="m-b-0">Número de Vendedores</p>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-money f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <h2 class="color-white">{{number_format($paidTicketTotal)}}</h2>

                    <p class="m-b-0">Total Recaudado</p>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-title">

                <h4>Boletas Asignadas por Sorteo</h4>

            </div>
            <div class="card-body">
                <div class="current-progress">

                        @foreach ($lotteriesTicket as $lottery)

                        @php
                        $tickectsAsignados = 0;
                        @endphp

                        <div class="progress-content">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="progress-text">{{ substr($lottery->name, 0, 7)}}
                                    <span class="label label-rouded label-primary pull-right">{{$lottery->id}}</span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="current-progressbar">
                                    <div class="progress">
                                        @php
                                            $totalTickects=count($lottery->tickets);
                                            $porcentaje = 0;
                                        @endphp

                                        @foreach ($lottery->tickets as $ticket )
                                            @if($ticket->status==1)
                                                @php
                                                $tickectsAsignados +=1;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                           $porcentaje = ($tickectsAsignados*100)/$totalTickects;
                                           $porcentaje = round($porcentaje,0);
                                        @endphp

                                        <div class="progress-bar progress-bar-primary w-{{ $porcentaje }}" role="progressbar" aria-valuenow="{{ $porcentaje }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $porcentaje }}%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row -->
                        </div>


                        @endforeach




                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4">

    <div class="card">
            <div class="card-title">
                <h4>Recaudo por Sorteo</h4>
            </div>
            <div class="card-body">
                <div class="current-progress">

                    @foreach ($lotteriesTicket as $lottery)

                    @php
                    $tickectsAcumulado = 0;
                    @endphp

                    <div class="progress-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="progress-text">{{ substr($lottery->name, 0, 7)}}
                                <span class="label label-rouded label-warning pull-right">{{$lottery->id}}</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="current-progressbar">
                                <div class="progress">
                                    @php
                                        $totalTickects=900000000;
                                        $porcentaje = 0;
                                    @endphp

                                    @foreach ($lottery->tickets as $ticket )
                                        @if($ticket->paid_ticket>0)
                                            @php
                                            $tickectsAcumulado = $tickectsAcumulado + $ticket->paid_ticket;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @php
                                       $porcentaje = ($tickectsAcumulado*100)/$totalTickects;
                                       $porcentaje = round($porcentaje,0);
                                    @endphp

                                    <div class="progress-bar progress-bar-warning w-{{ $porcentaje }}" role="progressbar" aria-valuenow="{{ $porcentaje }}" aria-valuemin="0" aria-valuemax="100" style="color: black">
                                        $ {{ number_format($tickectsAcumulado) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                    </div>


                    @endforeach




                </div><!-- end current-progress -->

            </div>
        </div>
    </div>
    <div class="col-lg-4">

    <div class="card">
            <div class="card-title">
                <h4>Top Vendedores</h4>

            </div>
            <div class="card-body">
                <div class="current-progress">
                    @php
                       $top =0;
                    @endphp
                    @foreach ($bestSellers as $key=>$value)


                      @if ($top == 6)
                      @break
                      @endif

                    <div class="progress-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="progress-text">{{ substr($key, 0, 15)}}

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="current-progressbar">
                                <div class="progress">
                                    @php
                                        $top +=1;
                                        $porcentaje = 0;
                                    @endphp



                                    <div class="progress-bar progress-bar-warning w-{{ $porcentaje }}" role="progressbar" aria-valuenow="{{ $porcentaje }}" aria-valuemin="0" aria-valuemax="100" style="color: black">
                                        $ {{ number_format($value,2,'.',',') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                    </div>


                    @endforeach




                </div><!-- end current-progress -->
            </div>
        </div>
    </div>

</div>
@endsection
@push('script')

@endpush

@push('style')



@endpush
