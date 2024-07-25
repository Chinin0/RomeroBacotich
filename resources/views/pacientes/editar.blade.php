@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>!Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type= "button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">$times;</span>
                                    </button>    
                                </div>
                            @endif

                            {!! Form::model($paciente, ['method' => 'PUT', 'enctype'=>'multipart/form-data','route' => ['pacientes.update', $paciente->id]]) !!}
                            <div class="row">




                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        {!! Form::text('nombre',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="especie">Especie</label>
                                        {!! Form::text('especie',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="raza">Raza</label>
                                        {!! Form::text('raza',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sexo">sexo</label>
                                        {!! Form::text('sexo',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="color">color</label>
                                        {!! Form::text('color',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="f_nacimiento">f_nacimiento</label>
                                        {!! Form::date('f_nacimiento',null,array('class'=>'form-control')) !!}
                                    </div>
                                </div>
    
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <select name="propietario" class="form-control">
                                            @foreach ($propietarios as $propietario)
                                                <option value="{{ $propietario->id }}">{{ $propietario->nombre.' '.$propietario->app_apm }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
    

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-sm-3 preview-image-video-container float-right mt-1">
                                        @csrf
                                        <input type="file" name="perfil" id="imagen-input" onchange="previewImage(event)">
                                        <button type="submit">Cargar imagen</button>
                                        <img id="imagen-preview" src="{{asset( $propietario->perfil)}}" 
                                        alt="Vista previa de la imagen" 
                                        style="display: none;"
                                        class="img-thumbnail user-img user-profile-img profilePicture"
                                        >                               
                                    </div>

                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
    
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function(){
            var preview = document.getElementById('imagen-preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>
    @endsection

