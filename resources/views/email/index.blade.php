@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- <a href="/email/create" class="btn btn-outline-success">Add</a> -->
<hr />
<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Description</th>
            <th>Valid?</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lists as $list)
        <tr>
            @php
            $style = $list->valid ? 'none' : 'line-through';
            @endphp
            <td style="text-decoration: {!! $style !!}">{{ $list->id }}</td>
            <td style="text-decoration: {!! $style !!}">{{ $list->email}}</td>
            <td style="text-decoration: {!! $style !!}">{{ $list->description}}</td>
            <td style="text-decoration: {!! $style !!}">{{ $list->valid ? 'Yes' : 'No'}}</td>
            <td><a href="/email/{{ $list->id}}" class="btn btn-outline-info">See</a></td>
            <!-- <td>
                <a href="/email/{{ $list->id}}/edit" class="btn btn-outline-warning">Edit</a>
                
                <button type="button" class="btn btn-outline-danger removeItem" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$list->id}}" data-item="{{$list->item}}">
                    Delete
                </button>
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<form method="POST" id="formRemove">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The register <strong id="showItem"></strong> will be deleted.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    let removeItems = document.querySelectorAll('.removeItem');
    removeItems.forEach(removeItem => {
        removeItem.addEventListener('click', changeRoute);
    });

    function changeRoute({
        target: {
            dataset
        }
    }) {
        formRemove.action = `/email/${dataset.id}`;
        showItem.innerText = dataset.item;
    }
</script>

{{ $lists->links()}}
@endsection
