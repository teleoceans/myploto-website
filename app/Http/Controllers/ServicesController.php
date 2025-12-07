<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;
use App\Models\Message;
use App\Models\Pet;
use App\Models\Book;
use App\Models\Selection;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        
        foreach($services as $service)
            $service->image = url('/').'/services/'.$service->image;
        return $services;
    }

    public function store(Request $request)
    {
        $services = Service::all();
        
        $this->validate($request, [
            'service_id' => 'required|in:'.$services->implode('id', ', ').'',
            'name' => 'required|max:255',
            'phone_number' => 'required|max:20',
            'city' => 'required|max:30',
            'address' => 'required|max:600',
            'expected_date' => 'required|date_format:Y-m-d',
            'notes' => 'max:600',
            'email' => 'email'
        ]);

        $order = Order::create($request->all());

        return response()->json([
            'message' => "Order stored successfully!",
            'order_data' => $order,
        ], 200);
    }
    
    public function messageStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email',
            'phone_number' => 'required|max:20',
            'message' => 'required|max:600',
        ]);
        
        $message = Message::create($request->all());

        return response()->json([
            'message' => "Message stored successfully!",
            'message_data' => $message,
        ], 200);
    }

    public function payment(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'payment_id' => 'required'
        ]);
        $order = Book::where('id', $request->order_id)->where('user_id', Auth::user()->id)->first();
        if($order) {
            $order->status = 1;
            $order->payment_id = $request->payment_id;
            $order->save();
            return response()->json([
                'message' => "Paid successfully!",
            ], 200);
        } else {
            return response()->json([
                'message' => "User not related to this order.",
            ], 500);
        }
    }

    public function addPet(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'gender' => 'required|in:male,female',
            'breed' => 'required',
            'age' => 'required',
            'weight' => 'required',
        ]);
        
        $user_id = Auth::user()->id;

        $pet = new Pet;
        $pet->user_id = $user_id;
        $pet->name = $request->name;
        $pet->type = $request->type;
        $pet->gender = $request->gender;
        $pet->breed = $request->breed;
        $pet->age = $request->age;
        $pet->weight = $request->weight;
        $pet->notes = $request->notes;
        $pet->save();

        return $pet;
    }
    
    public function removePet($id) {
        Pet::where('id', $id)->where('user_id', Auth::user()->id)->first()->delete();
        return response()->json([
                'error' => "This pet has been deleted successfully!",
            ], 200);
    }

    public function bookService(Request $request)
    {
        $this->validate($request, [
            'service_id' => 'required',
            'pet_id' => 'required',
            'from_date' => 'required|string',
            'service_location' => 'required',
            'trip_type' => 'nullable|in:one_way,two_way',
            'training_type' => 'nullable|exists:selections,id',
            'groom_type' => 'nullable|exists:selections,id',
        ]);


        // CHECK IF PET ASSIGNED TO THE LOGGED IN USER
        $user_id = Auth::user()->id;
        $checker = Pet::where('id', $request->pet_id)->where('user_id', $user_id)->first();
        if($checker == null)
            return response()->json([
                'error' => "This pet does not belong to this user!",
            ], 503);
            
            $service = Service::find($request->service_id);

        $book = new Book;
        $book->user_id = $user_id;
        $book->service_id = $request->service_id;
        $book->price = $service->price;
        $book->service_location = $request->service_location;
        $book->pet_id = $request->pet_id;
        $book->from_date = $request->from_date;
        $book->to_date = $request->to_date;
        $book->from_time = $request->from_time;
        $book->to_time = $request->to_time;
        $book->trip_type = $request->trip_type;
        $book->pick_up_location = $request->pick_up_location;
        $book->drop_off_location = $request->drop_off_location;
        $book->training_type = $request->training_type;
        $book->pet_issue = $request->pet_issue;
        $book->notes = $request->notes;
        $book->groom_type = $request->groom_type;
        $book->grooming_additional = $request->grooming_additional;
        $book->save();

        return $book;
    }

    public function selections(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|in:training,grooming',
        ]);

        return Selection::where('type', $request->type)->get();
    }
    
    
    public function getPetTypes(Request $request){
        dd($request->all());
    }
    
}
