@extends('layouts.app')

@section('content')
<form method="POST" action="/type/{{ $type->id}}">
    <!-- <input type="hidden" name="_method" value="PUT" /> -->
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $type->description}}">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
