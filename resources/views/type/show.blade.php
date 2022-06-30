@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">See Type</div>
    <div class="card-body">
        <div class="card-text"> <strong>Description</strong> {{ $type->description }}</div>
    </div>
    <div class="card-footer">
        <!-- <button class="btn btn-outline-secondary" onclick="history.back()">Voltar</button> -->
        <a href="/type" class="btn btn-outline-secondary">Back</a>
    </div>
</div>
@endsection
