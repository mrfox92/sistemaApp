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
          <form id="registro" method="POST" action="{{ route('propietarios.crear') }}" novalidate>
              @csrf
              {{--  --}}
              <div class="container jumbotron border col">
                  <div><caption><h5>Información Propietario</h5></caption></div>
                  <div>
                      <label for="">Nombres Propietario</label>
                      <input class="form-control{{ $errors->has('nom_prop') ? ' is-invalid' : '' }}"
                          name="nom_prop"
                          type="text"
                          value="{{ old('nom_prop') }}"
                          placeholder="Ingrese nombres del propietario"
                      >
                      @if ( $errors->has('nom_prop') )
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('nom_prop') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div>
                      <label for="">Apellidos Propietario</label>
                      <input class="form-control{{ $errors->has('ape_prop') ? ' is-invalid' : '' }}"
                          name="ape_prop"
                          type="text"
                          value="{{ old('ape_prop') }}"
                          placeholder="Ingrese apellidos del propietario"
                      >
                      @if ( $errors->has('ape_prop') )
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('ape_prop') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div>
                      <label for="">Dirección</label>
                      <input class="form-control{{ $errors->has('direccion_prop') ? ' is-invalid' : '' }}"
                          type="text"
                          name="direccion_prop"
                          value="{{ old('direccion_prop') }}"
                          placeholder="Ingrese dirección del propietario"
                      >
                      @if ( $errors->has('direccion_prop') )
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('direccion_prop') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div>
                      <label for="">Teléfono</label>
                      <input class="form-control{{ $errors->has('fono_prop') ? ' is-invalid' : '' }}"
                          type="text"
                          name="fono_prop"
                          value="{{ old('fono_prop') }}"
                          placeholder="Ingrese teléfono del propietario"
                      >
                      @if ( $errors->has('fono_prop') )
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('fono_prop') }}</strong>
                          </span>
                      @endif
                  </div>
                  <div>
                      <label for="">Email</label>
                      <input class="form-control{{ $errors->has('email_prop') ? ' is-invalid' : '' }}"
                          type="text"
                          name="email_prop"
                          value="{{ old('email_prop') }}"
                          placeholder="Ingrese correo del propietario"
                      >
                      @if ( $errors->has('email_prop') )
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('email_prop') }}</strong>
                          </span>
                      @endif
                  </div>
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