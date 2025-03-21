<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Group\GroupResource;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use Illuminate\Http\Request;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return GroupResource::collection(Group::get());
       
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
        $groups = Group::create([
            "group_name" => $fieldsValue['group_name'],
            "service_id" => $fieldsValue['service_id'],
         ]);

      return new GroupResource($groups);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Group::findOrFail($id), 200);

    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $groups = Group::findOrFail($id);
        $groups->fill($request->except(['id']));
        $groups->save();
        return response()->json($groups);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $groups = Group::findOrFail($id);
        if($groups->delete()) return response(null, 204);

    }
}

