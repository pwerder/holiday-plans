<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Exception;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Holiday::all(), 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Holiday::create($request->all());
        } catch (Exception $e) {
            return  $e->getMessage();
        }

        return response('Created ', 201)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $holiday = Holiday::find($id);

        return response($holiday, 200)
            ->header('Content-Type', 'application/json');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $holiday = Holiday::find($id);
        $holiday->update($request->all());
        return response($holiday, 200)
            ->header('Content-Type', 'application/json');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();
        return response('Deleted', 202)
            ->headers('Content-Type', 'application/json');
    }
}
