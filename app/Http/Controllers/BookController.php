<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Day;
use App\Models\DateBarber;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Get all entries from the DateBarber table
        $days = DateBarber::all();
    
        // Retrieve the service based on the given ID
        $services = Service::findOrFail($id);
    
        // Organize the data by date with associated times and their statuses
        $daysData = $days->groupBy('date')->map(function ($day) {
            return $day->map(function ($entry) {
                return [
                    'time' => $entry->time,
                    'status' => $entry->status
                ];
            });
        });
     
        // Convert the collection to an array for JavaScript
        $daysDataArray = $daysData->toArray();
    
        return view('book', compact('services', 'daysDataArray'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
