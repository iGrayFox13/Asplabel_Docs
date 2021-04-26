@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">

                <div class="card-body">
                    <div>
                        Dale click en el boton para subir un archivo:
                        <div>
                            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                                subir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('create')
    @endsection
    