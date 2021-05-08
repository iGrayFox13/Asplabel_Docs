<div class="modal fade" id="create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>cerrar</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-13">
                    Elige el arhivo que vas a subiry la seccion a la que pertenece, recuerda que solo deben ser archivos de tipo pdf:
                </div>
            </div>
            </ul>

            <form method="POST" action="{{ route('user.file.store') }}" enctype="multipart/form-data" >
                @csrf

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right">Seccion :</label>
                    <div class="col-md-6">
                        <select class="form-control " name="carpeta">
                            <option value="Empresarial">Empresarial</option>
                            <option value="Ingenieria civil">Ingenieria civil</option>
                            <option value="Ingenieria industrial">Ingenieria industrial</option>
                            <option value="Ingenieria de sistemas">Ingenieria de sistemas</option>
                            <option value="Ingenieria mecanica">Ingenieria mecanica</option>
                            <option value="Derecho">Derecho</option>
                            <option value="Fisioterapia">Fisioterapia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right">Archivo :</label>
                    <div class="col-md-6">
                        <input type="file" name="files[]" multiple>
                        
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>