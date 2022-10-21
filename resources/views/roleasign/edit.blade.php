@extends('layouts.admin.app')

@section('content')

    @if(session('status'))
        <div class="alert alert-{{ session('status') }}" role="alert">
            <i class="mdi mdi-{{ session('icon') }} me-2"></i>
            {{ session('response') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control"> {{ $user->FirstName }}</p>

            <h2 class="h5">Listado de Roles</h2>
            {!! Form::model($user,['route' => ['roleasign.update', $user->IdUser], 'method' => 'PUT']) !!}
                @foreach($roles as $rol)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]',$rol->id,null,['class'=>'mr-1']) !!}
                            {{ $rol->name }}
                        </label>

                    </div>
                @endforeach
                {!! Form::submit('Asignar Rol',['class'=> 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection
