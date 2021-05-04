@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre de el archivo</th>
                                    <th scope="col">Seccion</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                @if($file->user_id==Auth::id())
                                <tr>
                                    <th scope="row"> {{$file->id}}</th>
                                    <td><a target="_blank" href="storage/{{Auth::id()}}/{{$file->code_name}}">{{$file->nombre}}</a></td>
                                    <td>{{$file->section}}</td>
                                    <td>
                                        <form action="{{ route('user.files.destroy',$file->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sn btn-outline-danger">Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('create')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@endsection