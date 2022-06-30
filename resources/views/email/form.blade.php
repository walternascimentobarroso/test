@extends('layouts.app')

@section('content')
<form method="POST" action="/email">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="valid" name="valid">
        <label class="form-check-label" for="valid">valid?</label>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
