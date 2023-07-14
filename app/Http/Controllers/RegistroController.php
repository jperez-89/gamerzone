<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Queue\SerializesModels;

class RegistroController extends Controller
{
    use SerializesModels;
    private $request;

    public function __construct(Usuario $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['CodigoUsuario' => '']);
        session(['NombreUsuario' => '']);
        session(['RolUsuario' => 0]);
        $invalid = "";

        return view('registro.index', compact('invalid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $rules = array(
                'email' => 'required',
                'nombre' => 'required',
                'password' => 'required',
                'confirmpassword' => 'required'
            );
            $validator = FacadesValidator::make($request, $rules);

            if ($validator->fails()) {
                return Redirect::to('registro')
                    ->withErros($validator)
                    ->withInput();
            }

            $pass1 = $request->password;
            $pass2 = $request->confirmpassword;

            if ($pass1 !== $pass2) {
                session(['CodigoUsuario' => '']);
                session(['NombreUsuario' => '']);
                session(['RolUsuario' => 0]);
                $invalid = "La contraseña y la confirmacion deben ser iguales";

                return redirect()->route('registro.index', compact('invalid'));
            }

            $user = new Usuario;

            $user->id = $request->email;
            $user->nombre = $request->nombre;
            $user->contrasena = base64_encode($request->password);
            $user->codigorol = 2;

            if ($user->save()) {
                $login = Usuario::find($request->email);

                session(['CodigoUsuario' => $login->id]);
                session(['NombreUsuario' => $login->nombre]);
                session(['RolUsuario' => $login->codigorol]);

                return redirect()->route('Home.Index')->with('mensaje', 'Bienvenido ' . $login->nombre)->with('tipo', 'success');;
            } else {
                return redirect()->route('registro.index')->with('mensaje', 'No se logro registrar el usuario')->with('tipo', 'error');
            }
        } catch (\Throwable $th) {
            $invalid = $th;
            return redirect()->route('registro.index')->with('mensaje', $th)->with('tipo', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        //
    }
}
