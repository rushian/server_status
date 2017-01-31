<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->validate($request,[
            'servidor' =>  'required|min:3',
            'ip' =>  'required|min:8'
        ]);
        //$servidor = new Servidor($request->all());
        
        $this->save($servidor);
        //$card->addNote($note, 1);

        return back();
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
    public function edit($id)
    {
        //
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
