@extends('layouts.app')

@section('content')
<form method="POST" action="/type">
    @csrf
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
