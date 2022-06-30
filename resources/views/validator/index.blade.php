@extends('layouts.app')

@section('content')
@if($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<form method="POST" action="/validator/check">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection
