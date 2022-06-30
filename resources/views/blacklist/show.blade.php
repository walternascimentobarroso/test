@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">See Domain</div>
    <div class="card-body">
        <h5 class="card-title">{{ $blacklist->domain }}</h5>
        <div class="card-text"> <strong>Valor</strong> R$ {{ $blacklist->description }}</div>
        <div class="card-text">
            <strong>Active?</strong>
            @if($blacklist->active)
            <span class="badge bg-success">Yes</span>
            @else
            <span class="badge bg-danger">No</span>
            @endif
        </div>
    </div>
    <div class="card-footer">
        <!-- <button class="btn btn-outline-secondary" onclick="history.back()">Voltar</button> -->
        <a href="/blacklist" class="btn btn-outline-secondary">Back</a>
    </div>
</div>
@endsection
