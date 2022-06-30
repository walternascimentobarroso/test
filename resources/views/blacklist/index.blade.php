@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<a href="/blacklist/create" class="btn btn-outline-success">Add</a>
<hr />
<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Domain</th>
            <th>Description</th>
            <th>Active</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lists as $list)
        <tr>
            @php
            $style = $list->active ? 'none' : 'line-through';
            @endphp
            <td style="text-decoration: {!! $style !!}">{{ $list->id }}</td>
            <td style="text-decoration: {!! $style !!}">{{ $list->domain}}</td>
            <td style="text-decoration: {!! $style !!}">{{ $list->description}}</td>
            <td style="text-decoration: {!! $style !!}">{{ $list->active ? 'Yes' : 'No'}}</td>
            <td>
                <a href="/blacklist/{{ $list->id}}" class="btn btn-outline-info">See</a>
                <a href="/blacklist/{{ $list->id}}/edit" class="btn btn-outline-warning">Edit</a>
                <!-- <form action="/blacklist/{{ $list->id}}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form> -->
                <button type="button" class="btn btn-outline-danger removeItem" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$list->id}}" data-item="{{$list->item}}">
                    Delete
                </button>
            </td>
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
        formRemove.action = `/blacklist/${dataset.id}`;
        showItem.innerText = dataset.item;
    }
</script>

{{ $lists->links()}}
@endsection