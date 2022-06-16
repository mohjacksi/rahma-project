@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.payments.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="project_id">{{ trans('cruds.payment.fields.project') }}</label>
                            <select class="form-control select2" name="project_id" id="project_id">
                                @foreach($projects as $id => $entry)
                                    <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('project'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('project') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.project_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.payment.fields.purpose') }}</label>
                            @foreach(App\Models\Payment::PURPOSE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="purpose_{{ $key }}" name="purpose" value="{{ $key }}" {{ old('purpose', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="purpose_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('purpose'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purpose') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.purpose_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="donor">{{ trans('cruds.payment.fields.donor') }}</label>
                            {{-- <input class="form-control" type="text" name="donor" id="donor" value="{{ old('donor', '') }}"> --}}
                            @if($errors->has('donor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('donor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.donor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">{{ trans('cruds.payment.fields.phone_number') }}</label>
                            {{-- <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}"> --}}
                            @if($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.payment.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', '') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.payment.fields.payment_method') }}</label>
                            @foreach(App\Models\Payment::PAYMENT_METHOD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="payment_method_{{ $key }}" name="payment_method" value="{{ $key }}" {{ old('payment_method', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="payment_method_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="show_my_name" value="0">
                                <input type="checkbox" name="show_my_name" id="show_my_name" value="1" {{ old('show_my_name', 0) == 1 ? 'checked' : '' }}>
                                <label for="show_my_name">{{ trans('cruds.payment.fields.show_my_name') }}</label>
                            </div>
                            @if($errors->has('show_my_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('show_my_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.show_my_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.payment.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
