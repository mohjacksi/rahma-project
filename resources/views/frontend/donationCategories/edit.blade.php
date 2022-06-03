@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.donationCategory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.donation-categories.update", [$donationCategory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.donationCategory.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $donationCategory->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.donationCategory.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="special" value="0">
                                <input type="checkbox" name="special" id="special" value="1" {{ $donationCategory->special || old('special', 0) === 1 ? 'checked' : '' }}>
                                <label for="special">{{ trans('cruds.donationCategory.fields.special') }}</label>
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

        </div>
    </div>
</div>
@endsection