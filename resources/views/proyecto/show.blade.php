@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="card">
                {{-- {{dd($proyectos)}} --}}
                {{-- @foreach($proyectos as $proyecto) --}}
                
                
                <div class="card-body">
                        <h4 class="card-title">{{$proyectos->ProyectoNombre}}</h4> 
                        <br>
                        <div class="card-text">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <th style="width: 20%">Inicio</th>
                                    <th style="width: 20%">Fin</th>
                                    <th style="width: 20%">Presupuesto</th>
                                    <th style="width: 40%">Descripción</th>
                                    <th style="width: 30%">Estado</th>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$proyectos->ProyFechaIni}}</td>
                                        <td>{{$proyectos->ProyectoFechaFin}}</td>
                                        <td>$ <span id="presupuesto">{{$proyectos->ProyectoPresupuesto}}</span>  </td>
                                        <td class="filterable-cell">{{$proyectos->ProyectoDescripcion}}</td>
                                            @if($proyectos->ProyectoEstado == 1)
                                               <td class="text-success">Activo</td>
                                            @else
                                              <td class="text-danger">Inactivo</td>
                                            @endif
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
        <hr>
        <div class="col-7 mt-3">

            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h5 class="">ASIGNACIONES</h5> 
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".modal-asignacion">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 mt-3">

            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h5>FACTURACIÓN</h5> 
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".modal-facturacion">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <div class="d-flex justify-content-end">
            <a href="{{Route('proyecto.index')}}" class="btn btn-info mt-2">Volver</a>
                </div>
</div>



<div class="modal fade modal-asignacion" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva asignación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send message</button>
            </div>
          </div>
        </div>
      </div>



<div class="modal fade modal-facturacion" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva orden de compra</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send message</button>
            </div>
          </div>
        </div>
      </div>



<script>
    $(document).ready(function(){
            $('#presupuesto').number(true);
    });

</script>

@endsection
