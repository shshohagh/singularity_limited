@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Role Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('role.update',$role->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-12">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Permissions') }}</label>
                            <div class="col-md-6">
                            </div>
                        </div>
                        @php
                            $permission = json_decode($role->permissions);
                        @endphp
                        @foreach($permissions as $res)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="permissions[]" value="{{ $res->id }}"  @php if(in_array($res->id, $permission)) echo "checked"; @endphp>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{  $res->name }}</label>
                        </div>
                        @endforeach

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
