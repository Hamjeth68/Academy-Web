@extends('layouts.dashboard.app')

@section('content')
    <div>
        @foreach ($currencyrate as $item)
            <div class="modal fade" id="editCurrency{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card-body">
                            <form action="{{ route('edit.currency', $item->id) }}" class="contact100-form validate-form"
                                method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="exchange_rate"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Exchange Rate') }}</label>

                                    <div class="col-md-6">
                                        <input id="exchange_rate" type="text"
                                            class="form-control  @error('exchange_rate') is-invalid @enderror"
                                            name="exchange_rate" value="{{isset($item->exchange_rate) ? $item->exchange_rate : ''}}"
                                            required autocomplete="exchange_rate" autofocus>

                                        @error('exchange_rate')
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
    <h2 class="font-weight-bolder mb-3">Currency</h2>
    <table class="table-auto-w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">
                    <div class="flex-items-center">name</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">code</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">symbol</div>
                </th>
                <th class="px-4 py-2">
                    <div class="flex-items-center">exchange_rate</div>
                </th>
                <th class="px-4 py-2">
                    Actions
                </th>
            </tr>
        </thead>

        <body>
            @foreach ($currencyrate as $currency)
                <tr>
                    <td class="border px-4 py-2">{{ $currency->name }}</td>
                    <td class="border px-4 py-2">{{ $currency->code }}</td>
                    <td class="border px-4 py-2">{{ $currency->symbol }}</td>
                    <td class="border px-4 py-2">{{ $currency->exchange_rate }}</td>
                    <td class="border px-4 py-2">
                        <div class="col-md-6">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editCurrency{{ $item->id }}" type="button">
                                {{ __('Edit Currency') }}
                            </button>

                        </div>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
@endsection
