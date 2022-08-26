@extends('layouts.app')
@section('title')
Permissions
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a style="text-decoration:none;" href="{{ route('permission.create') }}">{{ __('Add New Permission') }}</a></div>

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
      <th scope="col">Date</th>
      <th width="20%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($permissions as $res)
    <tr>
      <th scope="row">{{ $res->id }}</th>
      <td>{{ $res->name }}</td>
      <td>{{ $res->created_at }}</td>
      <td>
        
        <table><tr><td>
        <a class="" href="{{ route('permission.edit',$res->id) }}"><span class='btn btn-primary'>Edit</span></a>
      </td><td>
        <form method="POST" action="{{ route('permission.destroy',$res->id) }}">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-danger"> {{ __('Delete') }}</button>
        </form>

</td></tr></table>
        
     </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot><tr><td> {{ $permissions->appends(request()->query())->links('layouts.pagination') }} </td></tr></tfoot>
</table>

            
        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
