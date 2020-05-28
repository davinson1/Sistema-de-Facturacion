<?php

namespace App\Http\Controllers\Usuarios;
use App\Http\Controllers\Controller;

use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\ActualizarUsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Models\Municipios;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Validation\Rule;


use App\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $usuario = User::all();
      return view('usuarios/usuario/usuarios');
    }

    public function ListarUsuarios(){
        $usuario = User::all();
        return view('usuarios/usuario/tabla_usuarios', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipoDocumento = TipoDocumento::get();
      $municipios = Municipios::get();
      $roles = Role::get();
      return view('usuarios/usuario/crear_usuario', compact('roles', 'tipoDocumento', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {
      $foto = $request->file('fotoUsuario')->store('public/fotosusuarios');
      $documento = $request->file('copiaDocumento')->store('public/documentosusuarios');

      if ($request->ajax()) {
        $usuario = new User();
        $usuario->id_tipo_documento = $request->tipoDocumento;
        $usuario->id_municipio = $request->municipio;
        $usuario->name = $request->nombreUsusario;
        $usuario->apellido = $request->apellidoUsusario;
        $usuario->numero_documento = $request->documentoUsusario;
        $usuario->direccion = $request->direccionUsusario;
        $usuario->email = $request->emailUsusario;
        $usuario->foto = $foto;
        $usuario->copia_documento = $documento;
        $usuario->password = Hash::make($request->claveUsusario);
        $usuario->activo = '1';
        $usuario->save();

        $usuario->roles()->sync($request->get('roles'));

        return response()->json([
        "mensaje" => "Usuario creado correctamente."
         ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $tiposDocumento = TipoDocumento::get();
      $municipios = Municipios::get();
      $roles = Role::get();

      return view('usuarios/usuario/editar_usuario', compact('user', 'roles', 'tiposDocumento', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $usuario)
    {
      $data = request()->validate([        
        'tipoDocumento'     => 'required',
        'municipio'         => 'required',
        'nombreUsusario'    => 'required|min:3|max:100',
        'apellidoUsusario'  => 'required|min:3|max:100',
        'documentoUsusario' => 'required|min:6|numeric|unique:users,numero_documento,'.$usuario,
        'emailUsusario'     => 'required|email|unique:users,email,'.$usuario,
        'fotoUsuario'       => 'image',
        'copiaDocumento'    => 'mimes:pdf',
        
        // 'emailUsusario'     => ['required','email',Rule::unique('users', 'email')->ignore($usuario)],
        // 'documentoUsusario'     => ['required','email',Rule::unique('users', 'numero_documento')->ignore($usuario)],
      ]);

      $usuar = User::Find($usuario);

      if ($request->ajax()) {
        // Si el usuario cambia la foto
        if($request->hasFile('foto')){
          // aquí compruebo que exista la foto anterior
          if (\Storage::exists($usuar->foto))
          {
               // aquí la borro
               \Storage::delete($usuar->foto);
          }
          $usuar->foto=\Storage::putFile('public/fotosusuarios', $request->file('foto'));
        }

        // Si el usuario cambia el documento
        if($request->hasFile('copiaDocumento')){
          // aquí compruebo que exista la foto anterior
          if (\Storage::exists($usuar->copia_documento))
          {
               // aquí la borro
               \Storage::delete($usuar->copia_documento);
          }
          $usuar->copia_documento=\Storage::putFile('public/documentosusuarios', $request->file('copiaDocumento'));
        }

        // Contraseña del usuario
        if ($request->claveUsusario != '') {
          $data = request()->validate([            
            'claveUsusario'    => 'min:8|string',
          ]);
          $pass = Hash::make($request->claveUsusario);
        }else{
          $pass = $usuar->password;
        }

        $usuar->id_tipo_documento = $request->tipoDocumento;
        $usuar->id_municipio = $request->municipio;
        $usuar->name = $request->nombreUsusario;
        $usuar->apellido = $request->apellidoUsusario;
        $usuar->numero_documento = $request->documentoUsusario;
        $usuar->direccion = $request->direccionUsusario;
        $usuar->email = $request->emailUsusario;
        $usuar->password = $pass;
        $usuar->activo = '1';
        $usuar->save();

        $usuar->roles()->sync($request->get('roles'));

        return response()->json([
        "mensaje" => "Usuario editado correctamente."
         ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $idUser)
    {
        $idUser->delete();

        return response()->json([
        "mensaje" => "Usuario eliminado correctamente"
         ]);
    }

    public function perfil(User $user)
    {
      $tiposDocumento = TipoDocumento::get();
      $municipios = Municipios::get();
      $roles = auth()->user()->roles;

      return view('usuarios/usuario/perfil_usuario', compact('user', 'roles', 'tiposDocumento', 'municipios'));
    }

    public function editarPerfil(Request $request, $usuario)
    {
      $data = request()->validate([        
        'tipoDocumento'     => 'required',
        'municipio'         => 'required',
        'nombreUsusario'    => 'required|min:3|max:100',
        'apellidoUsusario'  => 'required|min:3|max:100',
        'documentoUsusario' => 'required|min:6|numeric|unique:users,numero_documento,'.$usuario,
        'emailUsusario'     => 'required|email|unique:users,email,'.$usuario,
        'fotoUsuario'       => 'image',
        'copiaDocumento'    => 'mimes:pdf',
        
        // 'emailUsusario'     => ['required','email',Rule::unique('users', 'email')->ignore($usuario)],
        // 'documentoUsusario'     => ['required','email',Rule::unique('users', 'numero_documento')->ignore($usuario)],
      ]);
      $usuar = User::Find($usuario);

      if ($request->ajax()) {
        // Si el usuario cambia la foto
        if($request->hasFile('foto')){
          // aquí compruebo que exista la foto anterior
          if (\Storage::exists($usuar->foto))
          {
               // aquí la borro
               \Storage::delete($usuar->foto);
          }
          $usuar->foto=\Storage::putFile('public/fotosusuarios', $request->file('foto'));
        }

        // Si el usuario cambia el documento
        if($request->hasFile('copiaDocumento')){
          // aquí compruebo que exista la foto anterior
          if (\Storage::exists($usuar->copia_documento))
          {
               // aquí la borro
               \Storage::delete($usuar->copia_documento);
          }
          $usuar->copia_documento=\Storage::putFile('public/documentosusuarios', $request->file('copiaDocumento'));
        }

        // Contraseña del usuario
        if ($request->claveUsusario != '') {
          $data = request()->validate([            
            'claveUsusario'    => 'min:8|string',
          ]);
          $pass = Hash::make($request->claveUsusario);
        }else{
          $pass = $usuar->password;
        }

        $usuar->id_tipo_documento = $request->tipoDocumento;
        $usuar->id_municipio = $request->municipio;
        $usuar->name = $request->nombreUsusario;
        $usuar->apellido = $request->apellidoUsusario;
        $usuar->numero_documento = $request->documentoUsusario;
        $usuar->direccion = $request->direccionUsusario;
        $usuar->email = $request->emailUsusario;
        $usuar->password = $pass;
        $usuar->activo = '1';
        $usuar->save();

        return response()->json([
        "mensaje" => "Usuario editado correctamente."
         ]);
      }
    }
}
