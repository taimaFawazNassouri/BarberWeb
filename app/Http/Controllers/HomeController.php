<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Day;
use App\Models\Booking;

use App\Models\DateBarber;
class HomeController extends Controller
{
    public function show(){
        $services = Service::all();
        return view('index',compact('services'));
    }
    public function formDetails(Request $request)
    {
        $selected_time = $request->selected_time;
        $selected_date = $request->selected_date;
        $service_name = $request->service_name;
        $service_price = $request->service_price;
        $service_currency = $request->service_currency;
        
        return view('customer_details',compact('selected_time','selected_date','service_name','service_price','service_currency'));
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
        return view('updateBooking',compact('booking','daysDataArray') );
    }
    public function updateBooking(Request $request)
    {  
        $id = $request->id;
        $selected_time = $request->selected_time;
        $selected_date = $request->selected_date;
        $selected_time_old = $request->selected_time_old;
        $selected_date_old = $request->selected_date_old;
        $service_name = $request->service_name;
        $service_price = $request->service_price;
        $service_currency = $request->service_currency;
        
        return view('customer_details_update',compact('selected_time_old','selected_date_old','selected_time','selected_date','service_name','service_price','service_currency','id'));
    }
  
    public function updateForm($id){
        return "jjj";
    }
}
