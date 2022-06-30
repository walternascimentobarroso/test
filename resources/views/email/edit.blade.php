@extends('layouts.app')

@section('content')
<form method="POST" action="/email/{{ $email->id}}">
    <!-- <input type="hidden" name="_method" value="PUT" /> -->
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $email->email}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $email->description}}">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="valid" name="valid" {{ $email->valid ? 'checked' : ''}}>
        <label class="form-check-label" for="valid">valid?</label>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
