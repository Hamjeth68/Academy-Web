@extends('layouts.dashboard.app')

@section('content')
    <h2 class="font-weight-bolder mb-3">Courses</h2>
    @if(auth()->check() && auth()->user()->user_type === '0')
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Course
        </a>
    @endif

    <a href="{{ url('/products/pdf') }}">
        <button type="submit" class="btn btn-primary">
            {{ __('Export PDF') }}
        </button>
    </a>
    <div class="mb-4 font-medium text-sm text-green-600">
        @include('flash-message')
    </div>
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-body">
                    <form action="{{ url('/dashboard/products-add') }}" class="contact100-form validate-form"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="p_title"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Course Title') }}</label>

                            <div class="col-md-6">
                                <input id="p_title" type="text" class="form-control @error('p_title') is-invalid @enderror"
                                       name="p_title" required autocomplete="Product Title" autofocus>

                                @error('p_title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="p_name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="p_name" type="text" class="form-control @error('p_name') is-invalid @enderror"
                                       name="p_name" required autocomplete="Product Name">

                                @error('p_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="p_description"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Course Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="p_description" type="text"
                                          class="form-control @error('p_description') is-invalid @enderror p_description"
                                          id="p_description" name="p_description" required
                                          autocomplete="Product Description"></textarea>

                                @error('p_description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="p_amount"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Course Amount') }}</label>

                            <div class="col-md-6">
                                <input id="p_amount" type="number"
                                       class="form-control @error('p_amount') is-invalid @enderror" name="p_amount" required
                                       autocomplete="Product Amount">

                                @error('PhoneNumber')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Course Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file"
                                       class="form-control @error('image') is-invalid @enderror" name="image" required>
                                <p class="text-muted text-xs">(upload image size should be less than 2MB)</p>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        @foreach ($products as $product)
            <div class="modal fade" id="editProduct{{ $product->id }}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card-body">
                            <form action="{{ route('edit.products', $product->id) }}"
                                  class="contact100-form validate-form" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="p_title"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Course Title') }}</label>

                                    <div class="col-md-6">
                                        <input id="p_title" type="text"
                                               class="form-control  @error('p_title') is-invalid @enderror" name="p_title"
                                               value="{{ old('p_title', $product->p_title) }}" required
                                               autocomplete="Product Title" autofocus>

                                        @error('p_title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="p_name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="p_name" type="text"
                                               class="form-control @error('p_name') is-invalid @enderror" name="p_name"
                                               value="{{ old('p_name', $product->p_name) }}" required
                                               autocomplete="Product Name">

                                        @error('p_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="p_description"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Course Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="p_description" type="text"
                                                  class="form-control @error('p_description') is-invalid @enderror p_description"
                                                  id="p_description" style="height: 300px; width: 430px" name="p_description"
                                                  required autocomplete="Product Description"
                                                  value="{{ $product->p_description }}">
                                                    {{ $product->p_description }}
                                                </textarea>

                                        @error('p_description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="p_amount"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Course Amount') }}</label>

                                    <div class="col-md-6">
                                        <input id="p_amount" type="number"
                                               class="form-control @error('p_amount') is-invalid @enderror" name="p_amount"
                                               value="{{ old('p_amount', $product->p_amount) }}" required
                                               autocomplete="Product Amount">

                                        @error('PhoneNumber')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Course Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                               class="form-control @error('image') is-invalid @enderror" name="image">
                                        <p class="text-muted text-xs">(upload image size should be less than 2MB)</p>
                                        @if($product->image)
                                        <img src="{{ asset('image/'.$product->image) }}" width="100px" class="mt-1">
                                        @endif
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <table class="table-auto-w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">
                <div class="flex-items-center">ID</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex-items-center">Title</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex-items-center">Name</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex-items-center">Description</div>
            </th>
            <th class="px-4 py-2">
                <div class="flex-items-center">Price</div>
            </th>
            @if(auth()->check() && auth()->user()->user_type === '0')
                <th class="px-4 py-2">
                    Actions
                </th>
            @endif
        </tr>
        </thead>

        <body>
        @foreach ($products as $product)
            <tr>
                <td class="border px-2 py-2">{{ $product->id }}</td>
                <td class="border px-2 py-2">{{ $product->p_title }}</td>
                <td class="border px-4 py-2">{{ $product->p_name }}</td>
                <td class="border px-4 py-2"> {!! $product->p_description !!}</td>
                <td class="border px-4 py-2">{{ $product->p_amount }}</td>
                @if(auth()->check() && auth()->user()->user_type === '0')
                    <td class="border px-4 py-2">
                        <div class="col-md-6">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editProduct{{ $product->id }}" type="button">
                                {{ __('Edit Course') }}
                            </button>

                        </div>
                            <div class="col-md-6">
                               <a data-bs-toggle="modal" data-bs-target="#deleteProduct-{{$product->id}}"> <button type="submit" class="btn btn-primary">
                                    {{ __('Delete Course') }}
                                </button></a>
                            </div>
                    </td>
                @endif
            </tr>
            <div class="modal fade" id="deleteProduct-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4> Are you sure want to delete the Course?</h4>
                        </div>
                        <form action="{{ route('delete.product', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn bg-gradient-danger">Delete course</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
        </body>
    </table>
    </div>
@endsection
