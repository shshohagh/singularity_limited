@extends('layouts.app')
@section('title')
Outlets
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a style="text-decoration:none;" href="{{ route('outlet.create') }}">{{ __('Add New Outlet') }}</a></div>

                <div class="card-body table-responsive">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Address</th>
      <th scope="col">Visit Date</th>
      <th scope="col">Lat</th>
      <th scope="col">Lon</th>
      <th scope="col">Active</th>
      <th scope="col">Date</th>
      <th width="20%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($outlets as $res)
    <tr>
      <th scope="row">{{ $res->id }}</th>
      <td>{{ $res->name }}</td>
      <td>{{ $res->description }}</td>
      <td>{{ $res->address }}</td>
      <td>{{ $res->visit_date }}</td>
      <td>{{ $res->latitude }}</td>
      <td>{{ $res->longitude }}</td>
      <td>{{ $res->active }}</td>
      <td>{{ $res->created_at }}</td>
      <td>
        
        <table><tr><td>
        <a class="" href="{{ route('outlet.edit',$res->id) }}"><span class='btn btn-primary'>Edit</span></a>
      </td><td>
        <form method="POST" action="{{ route('outlet.destroy',$res->id) }}">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-danger"> {{ __('Delete') }}</button>
        </form>

</td></tr></table>
        
     </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot><tr><td> {{ $outlets->appends(request()->query())->links('layouts.pagination') }} </td></tr></tfoot>
</table>

            
        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
