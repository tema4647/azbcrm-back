<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Client\ClientResource;
use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientResource::collection(Client::with('groups')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $fieldsValue = $request->all();
      $client = Client::create([
          "client_child_fio" => $fieldsValue['client_child_fio'],
          "client_child_birth" => $fieldsValue['client_child_birth'],
          "client_parent_fio" => $fieldsValue['client_parent_fio'],
          "client_parent_phone" => $fieldsValue['client_parent_phone'],
          "client_parent_email" => $fieldsValue['client_parent_email'],
          "client_parent_amount" => $fieldsValue['client_parent_amount']
       ]);
       
      // добавляем группу у клиента 
      $group = $fieldsValue['group_id'];
      $client->groups()->attach($group);
      return new ClientResource($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ClientResource(Client::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $client = Client::with('groups')->findOrFail($id);
        $fieldsValue = $request->all();

        $client->client_child_fio = $fieldsValue['client_child_fio'];
        $client->client_child_birth = $fieldsValue['client_child_birth'];
        $client->client_parent_fio = $fieldsValue['client_parent_fio'];
        $client->client_parent_phone = $fieldsValue['client_parent_phone'];
        $client->client_parent_email = $fieldsValue['client_parent_email'];
        $client->client_parent_amount = $fieldsValue['client_parent_amount'];

        // обновляем связану модель
        $group = $fieldsValue['group_id'];
        $client->groups()->sync($group);
        $client->save();
        $client->refresh();

        return new ClientResource($client);
        // return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $clients = Client::findOrFail($id);
        if($clients->delete())
        
        return response(null, 204);

    }
}
