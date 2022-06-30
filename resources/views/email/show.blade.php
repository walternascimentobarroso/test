@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">See Email</div>
    <div class="card-body">
        <h5 class="card-title">{{ $email->email }}</h5>
        <div class="card-text"> <strong>Description</strong> {{ $email->description }}</div>
        <div class="card-text">
            <strong>Valid?</strong>
            @if($email->valid)
            <span class="badge bg-success">Yes</span>
            @else
            <span class="badge bg-danger">No</span>
            @endif
        </div>
    </div>
    <div class="card-footer">
        <!-- <button class="btn btn-outline-secondary" onclick="history.back()">Voltar</button> -->
        <a href="/email" class="btn btn-outline-secondary">Back</a>
    </div>
</div>
@endsection
