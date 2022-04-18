<?php

namespace App\Http\Controllers;

use App\Http\Requests\Finance\FinanceRequest;
use App\Http\Resources\FinanceResource;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Finance::all();

        return FinanceResource::collection($finances);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinanceRequest $request)
    {
        $data = $request->validated();

        $finance = $request->user()->finances()->create($data);

        return new FinanceResource($finance);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FinanceRequest $request, Finance $finance)
    {
        $data = $request->validated();

        $finance->update($data);

        return new FinanceResource($finance);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $deleted = $finance->delete();

        if ($deleted) :
            return response(null, 204);
        endif;
    }
}
