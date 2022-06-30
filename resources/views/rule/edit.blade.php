@extends('layouts.app')

@section('content')
<form method="POST" action="/rule/{{ $rule->id}}">
    <!-- <input type="hidden" name="_method" value="PUT" /> -->
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="rule" class="form-label">Rule</label>
        <input type="text" class="form-control" id="rule" name="rule" value="{{ $rule->rule}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $rule->description}}">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="active" name="active" {{ $rule->active ? 'checked' : ''}}>
        <label class="form-check-label" for="active">Active?</label>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
