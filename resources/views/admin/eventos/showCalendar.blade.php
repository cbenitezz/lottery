<div class="container">

    <div class="row header-calendar"  >

      <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
        <a  href="{{ route('mes.eventos',['month' => $data['last']]) }}" style="margin:10px;">
          <i class="icon-arrow-left-circle" style="font-size:30px;color:white;"></i>
        </a>
        <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
        <a  href="{{ route('mes.eventos',['month' => $data['next']]) }}" style="margin:10px;">
          <i class="icon-arrow-right-circle" style="font-size:30px;color:white;"></i>
        </a>
      </div>

    </div>
    <div class="row">
      <div class="col header-col">Lunes</div>
      <div class="col header-col">Martes</div>
      <div class="col header-col">Miercoles</div>
      <div class="col header-col">Jueves</div>
      <div class="col header-col">Viernes</div>
      <div class="col header-col">Sabado</div>
      <div class="col header-col">Domingo</div>
    </div>
    <!-- inicio de semana -->
    @foreach ($data['calendar'] as $weekdata)
      <div class="row">
        <!-- ciclo de dia por semana -->
        @foreach  ($weekdata['datos'] as $dayweek)

        @if  ($dayweek['mes']==$mes)
          <div class="col box-day">
            {{ $dayweek['dia']  }}
            <!-- evento -->

            @foreach  ($dayweek['evento'] as $event)

              @if ($event->publicar == 1) @php  $publicar ="btn btn-success m-1"; @endphp
              @else
                 @php $publicar ="btn btn-secondary m-1"; @endphp
              @endif
              <button type="button" class="{{$publicar}}" data-toggle="modal" data-target="#Modal-evento-{{ $event->id }}">
                {{ Str::limit($event->name, 8) }}  <span class="badge badge-light">{{ $event->id }}</span>
              </button>
              @include('admin.eventos.modaleditevento')
            @endforeach
          </div>
        @else
        <div class="col box-dayoff">
        </div>
        @endif


        @endforeach
      </div>
    @endforeach



  </div> <!-- /container -->