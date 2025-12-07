<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Service Location</th>
      <th scope="col">Service Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    @php
        $service = \App\Models\Service::find($order->service_id);
        $user = \App\Models\User::find($order->user_id);
    @endphp
        <tr>
            <th scope="row">#{{ $order->id }}</th>
            <td>{{ $service->name }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $order->service_location }}</td>
            <td>{{ $order->from_date }} <span></span></td>
            <td>
                <a href="#" class="table-sm-btn btn-xs btn-info" title="View Order Info"
                data-toggle="modal" data-target="#exampleModal{{ $order->id }}"><i class="fa fa-eye"></i></a>

                @if($order->status !== 2)
                    <a href="{{ route('admin.orders.accept', $order->id) }}" 
                    class="table-sm-btn btn-xs btn-success" title="Accept Order"><i class="fa fa-check"></i></a>
                @endif

                <a href="{{ route('admin.orders.delete', $order->id) }}" 
                class="table-sm-btn btn-xs btn-danger" title="Delete Order"><i class="fa fa-trash"></i></a>
            </td>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Number: #{{ $order->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="badge badge-success" style="border-radius: 0">PAYMENT ACCEPT ID: {{ $user->stripe_id }}</span>
                        <br><br>
                        <span class="badge badge-info" style="border-radius: 0">Service: {{ $service->name }}</span>
                        <br><br>
                        Name: <span class="badge badge-dark" style="border-radius: 0">{{ $user->name}}</span><br>
                        Email: <span class="badge badge-dark" style="border-radius: 0">{{ $user->email}}</span><br>
                        Phone Number: <span class="badge badge-dark" style="border-radius: 0">{{ $user->phone_number}}</span>
                        <hr>
                        Full Address: 
                        <span class="badge badge-dark" style="border-radius: 0">{{ $order->service_location }}</span>
                        <hr>
                        Expected Service Date: 
                        <span class="badge badge-dark" style="border-radius: 0">{{ $order->from_date }}</span>
                        <hr>
                        Paid: <span class="badge badge-dark" style="border-radius: 0">{{ $order->price }} AED</span>
                        <hr>


                        <!-- SERVICE INFO -->
                        @if($order->to_date)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            To Date:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->to_date }}" disabled>
                        </div>
                        @endif

                        @if($order->from_time)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Service Time:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->from_time }}" disabled>
                        </div>
                        @endif

                        @if($order->to_time)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            To Time:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->to_time }}" disabled>
                        </div>
                        @endif
                        
                        @if($order->trip_type)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Trip Type:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->trip_type }}" disabled>
                        </div>
                        @endif
                        
                        @if($order->pick_up_location)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Pick Up Location:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->pick_up_location }}" disabled>
                        </div>
                        @endif
                        
                        @if($order->drop_off_location)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Drop Off Location:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->drop_off_location }}" disabled>
                        </div>
                        @endif

                        
                        @if($order->training_type)
                        @php $t = \App\Models\Selection::find($order->training_type); @endphp
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Training Type:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $t->name }}" disabled>
                        </div>
                        @endif
                        
                        @if($order->grooming_type)
                        @php $g = \App\Models\Selection::find($order->grooming_type); @endphp
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Grooming Type:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $g->name }}" disabled>
                        </div>
                        @endif

                        @if($order->grooming_additional)
                        <div class="col-lg-12"><hr></div>
                        
                        <div class="col-lg-4">
                            Grooming Additional:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->grooming_type }}" disabled>
                        </div>
                        @endif

                        
                        @if($order->pet_issue)
                        <div class="col-lg-12"><hr></div>

                        <div class="col-lg-4">
                            Pet Issue:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->pet_issue }}" disabled>
                        </div>
                        @endif

                        
                        @if($order->notes)
                        <div class="col-lg-12"><hr></div>
                        
                        <div class="col-lg-4">
                            Notes:
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" value="{{ $order->notes }}" disabled>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </tr>
    @endforeach
  </tbody>
</table>
{{ $orders->links() }}

