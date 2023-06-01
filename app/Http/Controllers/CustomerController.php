<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->lat = $request->lat;
        $customer->long = $request->long;
        $customer->initial_date = $request->initial_date;
        $expirationDate = date('Y-m-d', strtotime('+1 year', strtotime($request->initial_date)));
        $customer->expirationdate = $expirationDate;
        $today_date=date('Y-m-d');
        $customer->today_date = $today_date;
        if ($today_date === $expirationDate) {
            $customer->expire = true;
        } else {
            $customer->expire = false;
        }
    
        $customer->user_id= $request->user_id;
        $customer->save();
      
        // Return a response or perform additional actions
        return response()->json(['message' => 'Customer created successfully', 'data' => $customer]);
    }
    public function get()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }
    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json(['data' => $customer], 200);
    }

    
}
