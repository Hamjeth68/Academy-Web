@extends('layouts.dashboard.app')

@section('content')
    {{-- @foreach ($user as $item) --}}
    <h2 class="font-weight-bolder mb-4">Profile</h2>
    <div class="container">
        <div class="mb-4 font-medium text-sm text-green-600">
            @include('flash-message')
        </div>
    <h3>Update Password</h3>
    <form action="{{ url('/admin/' . auth()->user()->id) }}" class="contact100-form validate-form mb-2 mt-3" method="post">
        @csrf
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>



        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Password') }}
                </button>
            </div>
        </div>
    </form>

        @if(auth()->user()->user_type === '0')
        <div>
        <h3>Create User</h3>
            <form  action="{{ url('/createUser') }}" method="POST" class="contact100-form validate-form mb-2 mt-3">
                @csrf

                <div class="form-group row">
                    <label for="p_title"
                           class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                    <div class="col-md-3">
                        <select id="type" class="form-control @error('type') is-invalid @enderror"
                               name="type" required>
                            <option value="2">Admin</option>
                            <option value="3">Coordinator</option>
                        </select>
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_title"
                           class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" required autocomplete="Product Title" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="p_title"
                           class="col-md-4 col-form-label text-md-right">{{ __('User Email') }}</label>

                    <div class="col-md-6">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" required autocomplete="User Email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                               autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create User') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <div class="mb-5 mt-2">
            <h3>Users</h3>
            <table class="table-auto-w-full">
                <thead>
                <tr>
                    <th class="border px-4 py-2">
                        <div class="flex-items-center">ID</div>
                    </th>
                    <th class="border px-4 py-2">
                        <div class="flex-items-center">User Name</div>
                    </th>
                    <th class="border px-4 py-2">
                        <div class="flex-items-center">User Email</div>
                    </th>
                    <th class="border px-4 py-2">
                        <div class="flex-items-center">User Type</div>
                    </th>
                    <th class="border px-4 py-2">
                        Actions
                    </th>
                </tr>
                </thead>

                @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">
                            {{$user->id}}
                        </td>
                        <td class="border px-4 py-2">
                            {{$user->name}}
                        </td>
                        <td class="border px-4 py-2">
                            {{$user->email}}
                        </td>
                        <td class="border px-4 py-2">
                            {{$user->user_type_name}}
                        </td>
                        <td class="border px-4 py-2">
                                <a data-bs-toggle="modal" data-bs-target="#editUser-{{$user->id}}">
                                    <button
                                        class="btn btn-primary btn-xs"
                                        data-title="Edit"
                                        value="" onclick="">
                                        <span class="fas fa fa-pen"></span>
                                    </button>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteUser-{{$user->id}}">
                                    <button
                                        class="btn btn-danger btn-xs"
                                        data-title="Delete"
                                        value="" onclick="">
                                        <span class="fas fa fa-trash"></span>
                                    </button>
                                </a>
                        </td>
                    </tr>

                    <div class="modal fade" id="editUser-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('/editUser/' .$user->id) }}" class="contact100-form validate-form"
                                          method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="p_title"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                                            <div class="col-md-3">
                                                <select id="type" class="form-control @error('type') is-invalid @enderror"
                                                        name="type" required>
                                                    <option value="2" {{isset($user->user_type) && $user->user_type == '2' ? 'selected' : ''}}>Admin</option>
                                                    <option value="3" {{isset($user->user_type) && $user->user_type == '3' ? 'selected' : ''}}>Coordinator</option>
                                                </select>
                                                @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="p_title"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{isset($user->name) ? $user->name : ''}}" required autocomplete="Product Title" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="p_title"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('User Email') }}</label>

                                            <div class="col-md-6">
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{isset($user->email) ? $user->email : ''}}" required autocomplete="User Email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update User Details') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit User Password Details</h5>
                                    </div>

                                    <form action="{{ url('/editUserPassword/' .$user->id) }}" class="contact100-form validate-form mt-3"
                                          method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                                       autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update User Password') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteUser-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   <h4> Are you sure want to delete the user?</h4>
                                </div>
                                <form action="{{ url('/deleteUser/' .$user->id) }}" method="post">
                                    @csrf
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-gradient-danger">Delete User</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
        @endif
    </div>

    {{-- @endforeach --}}
@endsection
