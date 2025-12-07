<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;
use App\Models\Message;
use App\Models\Pet;
use App\Models\Post;
use App\Models\Book;
use App\Models\Selection;
use App\Models\User;
use Auth;
use Stripe;
use Session;

class PagesController extends Controller
{
    public function home()
    {
        $services = Service::all();
        return view('welcome')->withServices($services);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function download()
    {
        $s1 = Service::limit(3)->get();
        $s2 = Service::orderBy('id', 'DESC')->limit(3)->get();
        $s3 = Service::find(4);
        return view('download')->withS1($s1)->withS2($s2)->withS3($s3);
    }

    public function services($id)
    {
        $services = Service::all();
        $single = Service::find($id);
        $pets = Pet::where('user_id', Auth::user()->id)->get();
        $trainings = Selection::where('type', 'training')->get();
        $groomings = Selection::where('type', 'grooming')->get();
        return view('services')->withSingle($single)->withServices($services)->withPets($pets)
        ->withGroomings($groomings)
        ->withTrainings($trainings);
    }

    public function servicesBook(Request $request)
    {


        $this->validate($request, [
            'service_id' => 'required',
            'pet_id' => 'required',
            'from_date' => 'required|string',
            'trip_type' => 'nullable|in:one_way,two_way',
            'groom_type' => 'nullable|exists:selections,id',
        ]);

        // CHECK IF PET ASSIGNED TO THE LOGGED IN USER
        $user_id = Auth::user()->id;
        $checker = Pet::whereIn('id', $request->pet_id)->where('user_id', $user_id)->first();
        if($checker == null)
            return response()->json([
                'error' => "This pet does not belong to this user!",
            ], 503);


        for($x = 0; $x < count($request->pet_id); $x++) {
            if($request->training_type) {
                for($y = 0; $y < count($request->pet_id); $y++) {
                    $service = Service::find($request->service_id);
                    $book = new Book;
                    $book->user_id = $user_id;
                    $book->service_id = $request->service_id;
                    $book->pet_id = $request->pet_id[$x];
                    $book->service_location = $request->service_location;
                    $book->from_date = $request->from_date;
                    $book->to_date = $request->to_date;
                    $book->from_time = $request->from_time;
                    $book->to_time = $request->to_time;
                    $book->trip_type = $request->trip_type;
                    $book->pick_up_location = $request->pick_up_location;
                    $book->drop_off_location = $request->drop_off_location;
                    $book->training_type = $request->training_type[$y];
                    $book->pet_issue = $request->pet_issue;
                    $book->notes = $request->notes;
                    $book->groom_type = $request->groom_type;
                    $book->grooming_additional = $request->grooming_additional;
                    $book->price = $request->price;
                    $book->save();
                }
            } else {
                $service = Service::find($request->service_id);
                $book = new Book;
                $book->user_id = $user_id;
                $book->service_id = $request->service_id;
                $book->pet_id = $request->pet_id[$x];
                $book->service_location = $request->service_location;
                $book->from_date = $request->from_date;
                $book->to_date = $request->to_date;
                $book->from_time = $request->from_time;
                $book->to_time = $request->to_time;
                $book->trip_type = $request->trip_type;
                $book->pick_up_location = $request->pick_up_location;
                $book->drop_off_location = $request->drop_off_location;
                $book->pet_issue = $request->pet_issue;
                $book->notes = $request->notes;
                $book->groom_type = $request->groom_type;
                $book->grooming_additional = $request->grooming_additional;
                $book->price = $request->price;
                $book->save();
            }
        }

        return redirect()->route('pages.payment', $book->id);
    }

    public function payment($order_id)
    {
        $orders = Book::where('user_id', Auth::user()->id)->where('status', 0)->get();
        $total = Book::where('user_id', Auth::user()->id)->where('status', 0)->sum('price');

        $user = User::find(Auth::user()->id);
        return view('payment', [
            'total' => $total,
            'orders' => $orders,
            'intent' => $user->createSetupIntent()
        ]);
    }

public function stripePost(Request $request, $order_id)
{
    $orders = Book::where('user_id', Auth::user()->id)->where('status', 0)->get();
    $user = User::find(Auth::user()->id);
    $total = Book::where('user_id', Auth::user()->id)->where('status', 0)->sum('price');

    try {
        // Create or retrieve Stripe customer
        $stripeCustomer = $user->createOrGetStripeCustomer();

        // Create a payment method
        $paymentMethod = $user->addPaymentMethod($request->payment_method);

        // Charge the customer
        $payment = $user->charge($total * 100, $paymentMethod->id);

        // Update user's payment ID
        $user->payment_id = $payment->id;
    } catch (\Exception $exception) {
        return back()->with('error', $exception->getMessage());
    }

    // Update order statuses
    foreach ($orders as $order) {
        $order->status = 1;
        $order->save();
    }

    return redirect()->route('pages.thank-you')->with('message', 'Paid successfully! One of our team will contact you ASAP!');
}

    public function contactSend(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email',
            'phone_number' => 'required|max:20',
            'message' => 'required|max:600',
        ]);

        $message = Message::create($request->all());
        return redirect()->route('pages.thank-you', 'We received your message successfully! <br> One of our team will contact you ASAP!');
    }

    public function thankYou()
    {
        return view('thank-you');
    }

    public function removeService($service_id) {
        $service = Book::where('user_id', Auth::user()->id)->find($service_id);
        $service->delete();
        return redirect()->back();
    }


    // BLOG
    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(12);
        return view('blog')->withPosts($posts);
    }

    public function blogShow($post_id) {
        $post = Post::find($post_id);
        return view('blog-show')->withPost($post);
    }

    // ADD PET
    public function addPet(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'breed' => 'required',
            'type' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'gender' => 'required',
        ]);
        $user = Auth::user();
        $pet = new Pet;
        $pet->user_id = $user->id;
        $pet->name = $request->name;
        $pet->breed = $request->breed;
        $pet->type = $request->type;
        $pet->age = $request->age;
        $pet->weight = $request->weight;
        $pet->gender = $request->gender;
        $pet->notes = $request->notes;
        $pet->size = $request->size;
        $pet->save();

        Session::flash('success', 'Pet saved successfully!');
        return redirect()->back();
    }

    public function removePet($id)
    {
        Pet::where('id', $id)->where('user_id', Auth::user()->id)->first()->delete();
        Session::flash('success', 'Pet removed successfully!');
        return redirect()->back();
    }

    public function listPets()
    {
        return Pet::where('user_id', Auth::user()->id)->get();
    }

    // Login
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return redirect()->route('pages.services');
    }


       public function getPetTypes(Request $request){
        dd($request->all());
    }


}
