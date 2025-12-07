<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Arrival Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($messages as $message)
        <tr>
            <th scope="row">#{{ $message->id }}</th>
            <td>{{ $message->name }}</td>
            <td>{{ $message->phone_number }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->created_at->diffForHumans() }} <span></span></td>
            <td>
                <a href="#" class="table-sm-btn btn-xs btn-info" title="View Message"
                data-toggle="modal" data-target="#exampleModal{{ $message->id }}"><i class="fa fa-eye"></i></a>


                <a href="{{ route('admin.messages.delete', $message->id) }}" 
                class="table-sm-btn btn-xs btn-danger" title="Delete Message"><i class="fa fa-trash"></i></a>
            </td>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message From: {{ $message->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $message->message }}
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
{{ $messages->links() }}

