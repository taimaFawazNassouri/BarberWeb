<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\DateBarber;
use App\Events\MyEvent;
use App\Mail\BookingConfirmation;
use App\Mail\BookingConfirmationAdmin;
use App\Mail\BookingConfirmationYasser;
use Illuminate\Support\Facades\Mail;
class CustomerDetailsController extends Controller
{
   
    public function index()
    { 
      
        
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    { 
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'code' => 'required|string|max:5',
            'phone' => 'required|string|max:20',
            'service_name' => 'required|string|max:255',
            'service_price' => 'required|numeric',
            'service_currency' => 'required|string|max:10',
        ]);
    
        try {
                // Store the booking in the database
            $booking = Booking::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'code' => $request->input('code'),
                'phone' => $request->input('phone'),
                'service_name' => $request->input('service_name'),
                'service_price' => $request->input('service_price'),
                'date' => $request->input('selected_date'),
                'time' => $request->input('selected_time'),
                'service_currency' => $request->input('service_currency'),
            ]);
           
           
            $dateBarber = DateBarber::where('date', $request->input('selected_date'))
            ->where('time', $request->input('selected_time'))
            ->first();
    
            if ($dateBarber) {
                $dateBarber->update([
                    'name' => $request->input('service_name'),
                    'name_customer' => $request->input('first_name') . ' ' . $request->input('last_name'),
                    'status' => true,
                ]);
            }
    
            // Mail::to($request->input('email'))->send(new BookingConfirmation($booking));
            // Mail::to('admin@gmai.com')->send(new BookingConfirmationAdmin($booking));
            // Mail::to('yasserkahla@gmai.com')->send(new BookingConfirmationYasser($booking));
            return view('success');
    
        } catch (Exception $e) {
                // Handle any exceptions
                return redirect()->back()->with('error', 'An error occurred while creating the booking: ' . $e->getMessage());
        }
        
    }
    
    public function show(Request $request,String $id)
    { 
        try {
        $booking = Booking::findOrFail($id);
        $booking->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'code' => $request->input('code'),
                'phone' => $request->input('phone'),
                'service_name' => $request->input('service_name'),
                'service_price' => $request->input('service_price'),
                'date' => $request->input('selected_date'),
                'time' => $request->input('selected_time'),
                'service_currency' => $request->input('service_currency'),
        ]);
      
        $dateBarberold = DateBarber::where('date', $request->input('selected_date_old'))
        ->where('time', $request->input('selected_time_old'))
        ->first();
        if ($dateBarberold) {
            $dateBarberold->update([
                'status' => false,
            ]);
        }

        // Mail::to($request->input('email'))->send(new BookingConfirmation($booking));
        // Mail::to('admin@gmai.com')->send(new BookingConfirmationAdmin($booking));
        // Mail::to('yasserkahla@gmai.com')->send(new BookingConfirmationYasser($booking));

        return view('success');

    } catch (Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'An error occurred while creating the booking: ' . $e->getMessage());
    }
    
    }
    
    public function update(Request $request,String $id)
    {
        
    }

  
    public function destroy(string $id)
   {
        $booking = Booking::findOrFail($id);
        $dateBarber = DateBarber::where('date', $booking->date)
        ->where('time', $booking->time)
        ->first();
        if ($dateBarber) {
           $dateBarber->update([
              'status' => false,
           ]);
        }

        $booking->delete();

       return view('deleteSuccess');
   }

}
