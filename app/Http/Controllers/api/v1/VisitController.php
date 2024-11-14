<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Visit\VisitResource;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return VisitResource::collection(Visit::get());
        
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
        $visits = Visit::create([
            "client_id" => $fieldsValue['client_id'],
            "service_id" => $fieldsValue['service_id'],
            "visit_date" => $fieldsValue['visit_date'],
         ]);

      return new VisitResource($visits);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function show(Visits $visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visits $visits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visits  $visits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visits $visits)
    
        {
            $visits = Visit::findOrFail($id);
            if($visits->delete()) return response(null, 204);
    
        }
    
}
