@extends('layouts.app')

@section('content')
<form method="POST" action="/blacklist">
    @csrf
    <div class="mb-3">
        <label for="domain" class="form-label">Domain</label>
        <input type="text" class="form-control" id="domain" name="domain">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="active" name="active">
        <label class="form-check-label" for="active">Active?</label>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
