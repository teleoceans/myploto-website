<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Question</th>
      <th scope="col">Creation Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($faq as $f)
        <tr>
            <th scope="row">#{{ $f->id }}</th>
            <td>{{ $f->question }}</td>
            <td>{{ $f->created_at->diffForHumans() }}</td>
            <td>
                <a href="#" class="table-sm-btn btn-xs btn-info" title="View Answer"
                data-toggle="modal" data-target="#exampleModal{{ $f->id }}"><i class="fa fa-eye"></i></a>


                <a href="{{ route('admin.faq.delete', $f->id) }}" 
                class="table-sm-btn btn-xs btn-danger" title="Delete FAQ"><i class="fa fa-trash"></i></a>
            </td>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $f->quesiton }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $f->answer }}
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
{{ $faq->links() }}

