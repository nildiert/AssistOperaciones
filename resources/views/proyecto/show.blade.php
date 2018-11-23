@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="card">
                {{-- {{dd($proyectos)}} --}}
                {{-- @foreach($proyectos as $proyecto) --}}
                
                
                <div class="card-body">
                  <table class="">
                    <tbody>
                      <tr>
                        <td>
                          <span class="card-title">PROYECTO: </span> 
                        </td>
                        <td>
                            <strong > {{$proyectos->ProyectoNombre}}</strong>
                            <input type="hidden" id="nombreProyecto" value="{{$proyectos->ProyectoNombre}}">
                        </td>

                      </tr>
                      <tr>
                          <td>
                              <span class="">GERENTE:   </span>
                            </td>
                            <td>
                              @foreach($gerentes as $gerente)

                                 <a href="" class="text-primary">{{$gerente->GerenteNombre}}</a>

                                 
                              @endforeach
                            </td>
                      </tr>
                    </tbody>
                  </table>
                        <div class="mt-1 card-text">
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
                    <div class="card-text">
                      <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                          <tr>
                            @if($facturas == NULL)
                              <td>No se han encontrado facturas</td>
                            @else
                              @foreach($facturas as $factura)
                              <tr>

                                <td><a href="">{{$factura->FactProyecCodigo}}</a></td>
                                <td>{{$factura->FactProyecTipo}}</td>
                                <td>{{$factura->FactProyecFechaIni}}</td>
                              </tr>
                              @endforeach
                            @endif
                          </tr>
                        </tbody>
                        
                      </table>
                    </div>
    
                </div>
            </div>
        </div>

        
    </div>
    <div class="d-flex justify-content-end">
            <a href="{{Route('proyecto.index')}}" class="btn btn-info mt-2">Volver</a>
                </div>
</div>



<div class="modal fade modal-asignacion " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nueva asignación </h5>  <br>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button><br>
            </div>
            <div class="modal-body">
              {!!Form::open(['action'=>'asignacionController@store'])!!}
              <div class="row d-flex">
                <div class="col-4 ">
                    {!!Form::select('Factura',$listaFacturas,'Selecciona factura', ['class'=>'form-control mb-2 ','id'=>'factura','placeholder'=>'Seleccione factura'])!!}
                </div>
                <div class="col-4">
                    {!!Form::text('nombreAsignacion',null,['class'=>'form-control','readonly', 'id'=>'asigCodigo'])!!}
                </div>
                <div class="col-4  justify-content-end">
                  <a href="#"  id ="agregar" class="btn btn-info ml-5">Agregar recurso</a>
                </div>
              </div>
              <table class="table">
                  
                <thead>
                  <th>Recurso</th>
                    <th>Ubicación</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Porcentaje</th>
                    <th>Comentarios</th>
                    <th></th>
                    
                  </thead>
                  <tbody id="contenido">
                    
                    
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="input" id="guardarAsignacion" class="btn btn-primary">Guardar</button>
                {!!Form::close()!!}
            </div>
      </div>
    </div>
  </div>



      <div class="modal fade modal-facturacion" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva facturación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      
                  {!!Form::open(['action'=>'factProyecController@store'])!!}
    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Tipo:</label>
                      {!!Form::select('FactProyecTipo',['Orden de compra'=>'Orden de compra','Factura'=>'Factura'],'Selecciona tipo', ['class'=>'form-control mb-1','id'=>'cliente','placeholder'=>'Selecciona cliente'])!!}
                      <label for="asigCodigo" class="col-form-label">Código:</label>
                      {!!Form::text('FactProyecCodigo',null,['class'=>'form-control'])!!}
                      
                      <label for="message-text" class="col-form-label">Inicio:</label>
                      {!!Form::date('FactProyecFechaIni',now(),['class'=>'form-control', 'id'=>'message-text'])!!}
                      
                      <label for="message-text" class="col-form-label">Date:</label>
                      {!!Form::date('FactProyecFechaFin',now(),['class'=>'form-control', 'id'=>'message-text'])!!}
                      {!!Form::text('proyecto_id',$proyectos->id,['class'=>'form-control', 'id'=>'message-text','hidden'])!!}
                    </div>
    
                  
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
                {!!Form::close()!!}
              </div>
            </div>
          </div>
        </div>



{{-- ESTOS DOS FORMULARIOS GUARDAN LOS DATOS PARA COLOCARLE EL NOMBRE A LA ASIGNACIÓN          --}}

        {!!Form::hidden('codProyec',$cantProyectos,['class'=>'form-control','id'=>'codigoProyecto'])!!}

      @foreach($nombres as $nombre)
        {!!Form::hidden('linNegCod',$nombre->linNegCod,['class'=>'form-control','id'=>'linNegCod'])!!}
        {!!Form::hidden('cliCod',$nombre->cliCod,['class'=>'form-control','id'=>'cliCod'])!!}
      @endforeach

<script>
  



    $(document).ready(function(){

      var codigoProyecto =$("#codigoProyecto").val();
      var nombreProyecto = $("#nombreProyecto").val();
      var nombreAsignacion ="";
      var codLineaNegocio = $("#linNegCod").val();
      var CodigoCliente =  $("#cliCod").val();
      var vlorFactura = $('#factura option:selected').val();
      var contenido = `
<tr>
  <td>{!!Form::select('personas_PersonasID[]',$recursos,'Selecciona recurso', ['class'=>'form-control','placeholder'=>'Selecciona Recurso'])!!}        </td>
  <td>{!!Form::select('asignacionUbicacion[]',['Cliente'=>'Cliente','Oficina'=>'Oficina','Oficina/Cliente'=>'Oficina/Cliente'],'Cliente',['class'=>'form-control','placeholder'=>'Selecciona ubicación'])!!}</td>
  <td>{!!Form::date('asigFechaIni[]',now(),['class'=>'form-control'])!!}</td>
  <td>{!!Form::date('asigFechaFin[]',now(),['class'=>'form-control'])!!}</td>
  <td>{!!Form::number('asigPorcentaje[]','100',['class'=>'form-control'])!!}</td>
  <td>{!!Form::text('asigObservaciones[]',NULL,['class'=>'form-control','placeholder'=>'comentarios'])!!}</td>
  <input type="hidden" name="factproyec_FactProyecID[]" class="form-control factproyec_FactProyecID" value="${vlorFactura}" >  
  <input type="hidden" name="asigCodigo[]" class="form-control asigCodigo" value="${nombreAsignacion}" >  
</tr>`

              

            $('#presupuesto').number(true);
            $("#agregar").click(function(){
              $("#contenido").after(contenido);
            });
            $("#factura").change(function(){
                  vlorFactura = $('#factura option:selected').text();
                  $(".factproyec_FactProyecID").val(vlorFactura);
                  codLineaNegocio = $("#linNegCod").val();
                  CodigoCliente =  $("#cliCod").val();
                  codigoProyecto =$("#codigoProyecto").val();
                  nombreAsignacion = ""+codLineaNegocio+"-"+CodigoCliente+"-"+codigoProyecto+"-"+vlorFactura+"-"+nombreProyecto;
                  $("#asigCodigo").removeAttr("readonly");
                  $("#asigCodigo").val(nombreAsignacion);

              });
              
            $("#guardarAsignacion").click(function(){
              vlorFactura = $('#factura').val();
                  $(".factproyec_FactProyecID").val(vlorFactura);
                  $(".asigCodigo").val(nombreAsignacion);

                  
            });
    });



</script>

@endsection
