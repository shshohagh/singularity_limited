@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a style="text-decoration:none;" href="{{ route('user.create') }}">{{ __('Add New User') }}</a></div>

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
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">User Type</th>
      <th scope="col">Role</th>
      <th scope="col">Date</th>
      <th width="20%" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $res)
    <tr>
      <th scope="row">{{ $res->id }}</th>
      <td>{{ $res->name }}</td>
      <td>{{ $res->mobile }}</td>
      <td>{{ $res->address }}</td>
      <td>{{ $res->email }}</td>
      <td>{{ $res->user_type }}</td>
      <td>{{ $res->role->name }}</td>
      <td>{{ $res->created_at }}</td>
      <td>

      <table><tr><td>
        <a class="" href="{{ route('user.edit',$res->id) }}"><span class='btn btn-primary'>Edit</span></a>
      </td><td>
        <form method="POST" action="{{ route('user.destroy',$res->id) }}">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-danger"> {{ __('Delete') }}</button>
        </form>

</td></tr></table>

     </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot><tr><td> {{ $users->appends(request()->query())->links('layouts.pagination') }}</td></tr></tfoot>
</table>
      

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
