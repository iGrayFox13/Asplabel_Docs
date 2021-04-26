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

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right">Seccion :</label>
                    <div class="col-md-6">
                        <select class="form-control " name="carpeta">

                            <option value="IngCiv">Ingenieria civil</option>
                            <option value="IngInd">Ingenieria industrial</option>
                            <option value="IngSis">Ingenieria de sistemas</option>
                            <option value="IngMec">Ingenieria mecanica</option>
                            <option value="Derecho">Derecho</option>
                            <option value="IngMec">Fisioterapia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right">Archivo :</label>
                    <div class="col-md-6">
                        <input type="file" name="files">
                        
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>