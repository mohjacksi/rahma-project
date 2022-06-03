@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.donationCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.donation-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.donationCategory.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donationCategory.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('special') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="special" value="0">
                    <input class="form-check-input" type="checkbox" name="special" id="special" value="1" {{ old('special', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="special">{{ trans('cruds.donationCategory.fields.special') }}</label>
                </div>
                @if($errors->has('special'))
                    <div class="invalid-feedback">
                        {{ $errors->first('special') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.donationCategory.fields.special_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection