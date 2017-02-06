<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Servidor;
use DB;
use App\Http\Controllers\Controller;

class Servidores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $servers = Servidor::with('user')->orderBy('servidor')->get();  
        return view ('servidores.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servidores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $servidor = new Servidor;
            $servidor->servidor       = Input::get('servidor');
            $servidor->ip             = Input::get('ip');
            $servidor->id_usuario     = Input::get('id_usuario');
            $servidor->save();
            
            return Redirect::to('servidores.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $servers = Servidor::with('user')->orderBy('servidor')->get();   
        
        return view ('servidores.show', compact('servers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servidor $servidor)
    {
        return view('servidores.edit', compact('servidor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servidor $servidor)
    {
        $servidor->update($request->all());
        
        return redirect('servidores');
    }

    public function atualizar(Request $request, Servidor $servidor)
    {
        $servidor->update($request->all());
        
        return redirect('servidores.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            DB::table("servidors")->where('id',$id)->delete();
            return redirect('servidores.show')->with('success','Servidor deletado com sucesso!');
    }
}
