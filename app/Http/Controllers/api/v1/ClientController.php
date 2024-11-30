<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StoreClientRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Client\ClientResource;
use App\Models\Client;
use App\Models\Group;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientResource::collection(Client::with('groups')->with('individuals')->with('tickets')->get());

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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {   
        $sync = $request['sync'];
        $detach = $request['detach'];
        $groupId = $request['group_id'];
        $individualId = $request['individual_id'];
        $ticketId = $request['ticket_id'];
        $ticket_count = $request['ticket_count'];
        $ticket_current_amount = $request['ticket_current_amount'];


        $fieldsToUpdate = $request->only([
            'client_child_fio',
            'client_child_birth',
            'client_parent_fio',
            'client_parent_phone' ,
            'client_parent_email',
            'client_parent_amount',
            ]);
            $client->fill(array_filter($fieldsToUpdate));
            $client->save();

        if($groupId){
            $client->groups()->attach($groupId);
        };
        if($individualId){
            $client->individuals()->attach($individualId);
        };

        if($ticketId){
            if($sync == true){
                $client->tickets()->syncWithoutDetaching([$ticketId => ['ticket_count' => $ticket_count, 'ticket_current_amount' => $ticket_current_amount]]);
            } elseif($detach == true){
                $client->tickets()->detach($ticketId);
            } else{
                $client->tickets()->attach($ticketId, ['ticket_count' => $ticket_count, 'ticket_current_amount' => $ticket_current_amount]);
            }
         };

         


        $client->refresh();

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
            if($client->delete())
            return response(null, 204);
    }
}
