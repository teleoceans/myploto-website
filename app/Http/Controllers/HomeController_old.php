<?php

namespace App\Http\Controllers;

use App\Message;
use App\Order;
use App\Faq;
use App\Service;
use App\Book;
use App\Post;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Book::where('status', 1)->orderBy('user_id', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
        $counter = Book::where('status', 1)->count();
        return view('home')->withOrders($orders)->withCounter($counter);
    }

    public function orderAccept($order_id)
    {
        $order = Book::find($order_id);
        $order->status = 2;
        $order->save();

        Session::flash('success', 'Order Accepted Successfully!');
        return redirect()->back();
    }

    public function accepted()
    {
        $orders = Book::where('status', 2)->orderBy('user_id', 'DESC')->orderBy('created_at', 'DESC')->paginate(20);
        $counter = Book::where('status', 2)->count();
        return view('admin.pages.accepted_orders')->withOrders($orders)->withCounter($counter);
    }

    public function orderDelete($order_id)
    {
        $order = Book::find($order_id);
        $order->delete();

        Session::flash('success', 'Order Deleted Successfully!');
        return redirect()->back();
    }

    public function messages()
    {
        $messages = Message::orderBy('id', 'DESC')->paginate(20);
        $counter = Message::count();

        return view('admin.pages.messages')->withMessages($messages)->withCounter($counter);
    }

    public function messagesDelete($message_id)
    {
        $message = Message::find($message_id);
        $message->delete();

        Session::flash('success', 'Message Deleted Successfully!');
        return redirect()->back();
    }
    
    public function faq()
    {
        $faq = Faq::orderBy('id', 'DESC')->paginate(20);
        $counter = Faq::count();
        return view('admin.pages.faq')->withFaq($faq)->withCounter($counter);
    }

    public function faqDelete($faq_id)
    {
        $faq_id = Faq::find($faq_id);
        $faq_id->delete();

        Session::flash('success', 'FAQ Deleted Successfully From Android And IOS Apps!');
        return redirect()->back();
    }

    public function faqCreate()
    {
        return view('admin.pages.faq_create');
    }

    public function faqStore(Request $request)
    {
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Session::flash('success', 'New FAQ added Successfully to Android And IOS Apps!');
        return redirect()->back();
    }



    public function services()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(20);
        $counter = Service::count();
        return view('admin.pages.services')->withServices($services)->withCounter($counter);
    }

    public function servicesDelete($service_id)
    {
        $service = Service::find($service_id);
        $service->delete();

        Session::flash('success', 'Service Deleted Successfully From Android And IOS Apps!');
        return redirect()->back();
    }

    public function servicesCreate()
    {
        return view('admin.pages.services_create');
    }

    public function servicesStore (Request $request)
    {
        $image = $this->fileUploadHelper($request->image, 'services');
        $web_image = $this->fileUploadHelper($request->web_image, 'services');

        $service = new Service;
        $service->image = $image;
        $service->web_image = $web_image;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        Session::flash('success', 'New Service added Successfully to Android And IOS Apps!');
        return redirect()->back();
    }

    public function servicesEdit($service_id)
    {
        $service = Service::find($service_id);

        return view('admin.pages.services_edit')->withService($service);
    }

    public function servicesUpdate ($service_id, Request $request)
    {
        $image = null;
        $web_image = null;
        if($request->image)
            $image = $this->fileUploadHelper($request->image, 'services');
        if($request->web_image)
            $web_image = $this->fileUploadHelper($request->web_image, 'services');

        $service = Service::find($service_id);
        if($image)
            $service->image = $image;
        if($web_image)
            $service->web_image = $web_image;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();

        Session::flash('success', 'Service updated Successfully in Android And IOS Apps!');
        return redirect()->back();
    }




    

    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(20);
        $counter = Post::count();
        return view('admin.pages.blog')->withPosts($posts)->withCounter($counter);
    }

    public function blogDelete($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();

        Session::flash('success', 'Blog Post Deleted Successfully From Website!');
        return redirect()->back();
    }

    public function blogCreate()
    {
        return view('admin.pages.blog_create');
    }

    public function blogStore (Request $request)
    {
        $image = $this->fileUploadHelper($request->image, 'blog');

        $post = new Post;
        $post->image = $image;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        Session::flash('success', 'New Blog Post added Successfully to website!');
        return redirect()->back();
    }

    public function blogEdit($post_id)
    {
        $post = Post::find($post_id);

        return view('admin.pages.blog_edit')->withPost($post);
    }

    public function blogUpdate ($post_id, Request $request)
    {
        $image = null;
        if($request->image)
            $image = $this->fileUploadHelper($request->image, 'blog');

        $post = Post::find($post_id);
        if($image)
            $post->image = $image;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        Session::flash('success', 'Blog Post updated Successfully in the website!');
        return redirect()->back();
    }


    function fileUploadHelper($file, $path) {
        //GET THE ORIGINAL FILE NAME
        $file_original_name = $file->getClientOriginalName();

        //REMOVE THE SPACES FROM THE ORIGINAL FILE NAME
        $file_original_name_without_spaces = str_replace(' ', '', $file_original_name);

        //ADDING RANDOM STRINGS TO THE UPLOADED FILE
        $file_name = md5($file_original_name_without_spaces . microtime() . time()).$file_original_name_without_spaces;

        //STORING THE UPLOADED FILE IN THE FOLDER
              
        $file -> move(public_path($path . '/' , $file_name));
        // $file -> move('/'.$path.'/', $file_name);

        //RETURNING THE UPLOADED FILE NAME
        return $file_name;
    }
}
