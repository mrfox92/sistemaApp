@extends('layouts.app')


@section('contenido')
    <div class="ml-2 mr-2">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="jumbotron">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{{ __("Crear nuevo") }}</button>
                    <a href="{{ route('propietarios.prueba') }}" class="btn btn-success">{{ __("Crear Propietario Prueba") }}</a>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="registro" method="POST" action="{{ route('propietarios.store') }}">
            @csrf
            {{--  --}}
            <div class="form-group">
                <label for="">Nombres Propietario</label>
                <input class="form-control"
                    name="nom_prop"
                    type="text"
                    value="{{ old('nom_prop') }}"
                    placeholder="Ingrese nombres del propietario"
                >
                <span class="text-danger">
                    <strong id="nom_prop_error"></strong>
                </span>
            </div>
            <div class="form-group">
                <label for="">Apellidos Propietario</label>
                <input class="form-control"
                    name="ape_prop"
                    type="text"
                    value="{{ old('ape_prop') }}"
                    placeholder="Ingrese apellidos del propietario"
                >
                <span class="text-danger">
                    <strong id="ape_prop_error"></strong>
                </span>
            </div>
            <div class="form-group">
                <label for="">Dirección</label>
                <input class="form-control"
                    type="text"
                    name="direccion_prop"
                    value="{{ old('direccion_prop') }}"
                    placeholder="Ingrese dirección del propietario"
                >
                <span class="text-danger">
                    <strong id="direccion_prop_error"></strong>
                </span>
            </div>
            <div class="form-group">
                <label for="">Teléfono</label>
                <input class="form-control"
                    type="text"
                    name="fono_prop"
                    value="{{ old('fono_prop') }}"
                    placeholder="Ingrese teléfono del propietario"
                >
                <span class="text-danger">
                    <strong id="fono_prop_error"></strong>
                </span>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control"
                    type="text"
                    name="email_prop"
                    value="{{ old('email_prop') }}"
                    placeholder="Ingrese correo del propietario"
                >
                <span class="text-danger">
                    <strong id="email_prop_error"></strong>
                </span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Guardar" id="submitForm">
            </div>
          {{--  --}}
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom-scripts')
    
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}

<script>
    $(document).ready(function () {

        $('#registro').submit(function(e) {
            e.preventDefault();
            var formularioRegistro = $("#registro");
            var formData = formularioRegistro.serialize();
            $('#nom_prop_error').html("");
            $('#ape_prop_error').html("");
            $('#direccion_prop_error').html("");
            $('#fono_prop_error').html("");
            $('#email_prop_error').html("");
    
            $.ajax({
                url:'/propietarios',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);

                    if(data.errors) {
                        if(data.errors.nom_prop){
                            $( '#nom_prop_error' ).html( data.errors.nom_prop[0] );
                        }
                        if(data.errors.ape_prop){
                            $( '#ape_prop_error' ).html( data.errors.ape_prop[0] );
                        }
                        if(data.errors.direccion_prop){
                            $( '#direccion_prop_error' ).html( data.errors.direccion_prop[0] );
                        }
                        if(data.errors.fono_prop){
                            $( '#fono_prop_error' ).html( data.errors.fono_prop[0] );
                        }
                        if(data.errors.email_prop){
                            $( '#email_prop_error' ).html( data.errors.email_prop[0] );
                        }
                        
                    }

                    if(data.success) {
                        $('#success-msg').removeClass('hide');
                        setInterval(function(){ 
                            $('#SignUp').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 3000);
                    }
                },
            });
        });
    });
</script>
@endpush