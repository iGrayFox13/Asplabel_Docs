<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = File::latest()->get();
        return view('index', compact('files'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;
        $files = $request->file('files');
        $section = $request->carpeta;
        $user_id = Auth::id();
        $mensaje = "";
        $mensaje2 = "";


        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $ext = explode(".", $file->getClientOriginalName());
                $fileName=encrypt(Str::slug($ext[0])). '.'.$file->getClientOriginalExtension();

                if ($ext[1] == 'pdf') {
                    if (Storage::putFileAs('/public/' . $section . '/', $file, $fileName) && Storage::putFileAs('/public/' . $user_id . '/', $file, $fileName)) {

                        File::create([
                            'nombre' => $file->getClientOriginalName(),
                            'user_id' => $user_id,
                            'code_name'=>$fileName,
                            'section' => $section,
                        ]);
                        $mensaje = "Todos los archivos se cargaron correctamente";
                    }
                }
                if ($ext[1] != 'pdf') {
                    $mensaje2 = "Los archivos que no son pdf no se pudieron subir";
                }
            }
        } else {
            $mensaje = "Debes seleccionar un archivo";
        }


        if ($mensaje2 == "" && $mensaje == "Todos los archivos se cargaron correctamente") {
            Alert::success('EXITO', $mensaje);
        } else if ($mensaje2 == "Los archivos que no son pdf no se pudieron subir") {
            Alert::info('CUIDADO', $mensaje2);
        } else if ($mensaje == "Debes seleccionar un archivo") {
            Alert::error('ERROR', $mensaje);
        }

        return back();
    }

    public function destroy(Request $request, $id){

        $file=File::whereId($id)->firstOrFail();

        unlink(public_path('storage'.'/'.$file->user_id.'/'.$file->code_name));
        unlink(public_path('storage'.'/'.$file->section.'/'.$file->code_name));

        $file->delete();
        
        Alert::success('EXITO', "Se ha eliminado el archivo correctamente");

        return back();
    }
}
