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
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required|date',
            ]);
            if ($validated) {
                Holiday::create($request->all());
                return response('Created', 201)->header('Content-Type', 'application/json');
            } else {
                throw new Exception('The title, description, location and date fields are mandatory.');
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $holiday = Holiday::find($id);
            if (!$holiday) {
                throw new Exception('Data not found');
            }
            return response($holiday, 200)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 404)
            ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required|date',
            ]);
            $holiday = Holiday::find($id);
            if (!$validated) {
                throw new Exception('The title, description, location and date fields are mandatory.');
            }
            if (!$holiday) {
                throw new Exception('Data not found');
            }
            $holiday->update($request->all());
            return response($holiday, 200)
                ->header('Content-Type', 'application/json');;
        } catch (Exception $e) {
            return response($e->getMessage(), 404)
            ->header('Content-Type', 'application/json');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $holiday = Holiday::find($id);
            if (!$holiday) {
                throw new Exception('Data not found');
            }
            $holiday->delete();
            return response('Deleted', 202)
                ->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response($e->getMessage(), 404)
            ->header('Content-Type', 'application/json');
        }
    }
}
