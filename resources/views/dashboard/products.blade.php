@extends('layouts.dashboard.app')

@section('content')

    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Products
    </a>

    <a href="{{ url('/products/pdf') }}">
        <button type="submit" class="btn btn-primary">
            {{ __('Export PDF') }}
        </button>
    </a>
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-body">
                    <form action="{{ url('/dashboard/products-add') }}" class="contact100-form validate-form"
                        method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="p_title"
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Title') }}</label>

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
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

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
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="p_description" type="text"
                                    class="form-control @error('p_description') is-invalid @enderror" name="p_description"
<<<<<<< HEAD
                                    required autocomplete="Product Description">
                                                                                                                                    </textarea>
=======
                                    required autocomplete="Product Description"></textarea>
>>>>>>> 696de264772ac5a85037d1bf234591d69993d7c6

                                @error('p_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="p_amount"
                                class="col-md-4 col-form-label text-md-right">{{ __('Product Amount') }}</label>

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
                                class="contact100-form validate-form" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="p_title"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Title') }}</label>

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
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

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
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="p_description" type="text"
<<<<<<< HEAD
                                            class="form-control @error('p_description') is-invalid @enderror"
                                            name="p_description" required
                                            autocomplete="Product Description">{ !! $product->p_description !! }
                                                                                                                                    </textarea>
=======
                                            class="form-control @error('p_description') is-invalid @enderror p_description" id="p_description" style="height: 300px; width: 430px"
                                            name="p_description" required autocomplete="Product Description" value="{{$product->p_description}}">
                                            {{$product->p_description}}
                                        </textarea>
>>>>>>> 696de264772ac5a85037d1bf234591d69993d7c6

                                        @error('p_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="p_amount"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Product Amount') }}</label>

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
                <th class="px-4 py-2">
                    Actions
                </th>
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
                    <td class="border px-4 py-2">
                        <div class="col-md-6 offset-md-4">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editProduct{{ $product->id }}" type="button">
                                {{ __('Edit Product') }}
                            </button>

                        </div>
                        <form action="{{ route('delete.product', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Delete Product') }}
                                </button>
                            </div>
                        </form>

                    </td>
                </tr>
            @endforeach
        </body>
    </table>
    </div>
@endsection

{{-- <script>
    $.ajaxSetup({
        headers: {
            'XSRF-TOKEN': $('meta[name="XSRF-TOKEN"]').attr('content')
        }
    });
</script> --}}
