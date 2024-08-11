<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Day;
use App\Models\Booking;
use App\Models\User;
use App\Models\DateBarber;
class HomeController extends Controller
{
    public function home(){
        $services = Service::all();
        return view('index',compact('services'));
    }


    public function showBooking($id)
    {
        $days = DateBarber::all();
        $booking = Booking::findOrFail($id);
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

        $bookingDate = $booking->date; // Assuming $booking has a date field
        $bookingHourMinute = $booking->time; // Assuming $booking has a time field
        $bookingTime = substr($bookingHourMinute, 0, 5);


        return view('updateBooking', compact('booking', 'daysDataArray', 'bookingDate', 'bookingTime'));
    }
    public function login_admin(){
        return view('auth.signin');
    }
    public function signIn(Request $request){
        if(User::where('email',$request->email)->where('password',$request->password)){
            return view('Dashboard.admin');
        }
        return "jjjj";
    }


    public function fetchData(Request $request) {
        try {
            $query = DateBarber::query();
    
            if ($day = $request->input('day')) {
                $query->where('day', 'LIKE', "%$day%");
            }
    
            if ($dateRange = $request->input('dateRange')) {
                $dates = explode(' - ', $dateRange);
                $query->whereBetween('date', [$dates[0], $dates[1]]);
            }
    
            if ($time = $request->input('time')) {
                $query->whereTime('time', $time);
            }
    
            if ($name = $request->input('name')) {
                $query->where('name', 'LIKE', "%$name%");
            }
    
            if ($status = $request->input('status')) {
                $query->where('status', 'LIKE', "%$status%");
            }
    
            $results = $query->select('id','name', 'date', 'time', 'status', 'day', 'month')->get();
    
            // Debug SQL query
            \Log::info($query->toSql());
    
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function updateStatus(Request $request) {
        try {
            $ids = $request->input('ids', []); // Retrieve selected IDs
    
            if (is_array($ids) && count($ids) > 0) {
                // Debugging: Log the received IDs
                \Log::info('Received IDs: ', $ids);
    
                DateBarber::whereIn('id', $ids)->update(['status' => 2]);
    
                return redirect()->back()->with('message', 'Status updated successfully.');
            } else {
                return redirect()->back()->withErrors(['error' => 'No valid IDs provided.']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    
    
    
    
}
