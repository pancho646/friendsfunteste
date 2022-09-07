<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\FriendsNotifyMail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Client::get();
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
    public function store(ClientRequest $request)
    {
        //
        $client = new Client;
        //$client->create($request->all());
        $client->nome=$request->nome;
        $client->sobrenome=$request->sobrenome;
        $client->rg=$request->rg;
        $client->telefone=$request->telefone;
        $client->email=$request->email;
        $client->cep=$request->cep;
        $client->rua=$request->rua;
        $client->numero=$request->numero;
        $client->complemento=$request->complemento;
        $client->barrio=$request->barrio;
        $client->cidade=$request->cidade;
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image/',$filename);
            $client->avatar ='image/'.$filename;
        }
        else{
            $client->avatar=$request->avatar;
        }
        
        //    return response()->json("hola");
        $client->save();
        Mail::to($request->email)->send(new FriendsNotifyMail($client));
        return response()->json($request);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
        return $client;
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
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, int $id)
    {
        //
        
        //Client::find($id)->update([$request->all()]);
        $p=Client::find($id);
        $p->nome=$request->nome;
        $p->sobrenome=$request->sobrenome;
        $p->rg=$request->rg;
        $p->nome=$request->nome;
        $p->telefone=$request->telefone;
        $p->email=$request->email;
        $p->cep=$request->cep;
        $p->rua=$request->rua;
        $p->numero=$request->numero;
        $p->complemento=$request->complemento;
        $p->barrio=$request->barrio;
        $p->cidade=$request->cidade;
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('image/',$filename);
            $p->avatar ='image/'.$filename;
        }
        else{
            $p->avatar=$request->avatar;
        }
        $p->save();
        return response()->json($p);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Client::find($id)->delete();
        
        return response()->json($id);
    }
}
