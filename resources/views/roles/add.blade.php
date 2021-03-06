@extends('turtle::layouts.modal')

@section('title', 'Add Role')
@section('content')
    <form method="POST" action="{{ route('roles.add') }}" novalidate>
        {{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <div>
                    <label>Permissions</label>
                    <button type="button" class="btn btn-light btn-xs ml-1" data-check-all="permissions[]">Check All</button>
                    <button type="button" class="btn btn-light btn-xs" data-check-none="permissions[]">Check None</button>
                </div>
                <ul class="list-group list-group-hover">
                    @foreach ($group_permissions as $group => $permissions)
                        <li class="list-group-item">
                            <div class="mt-1 mb-2">{{ $group }}</div>
                            @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="permissions[]" class="form-check-input" value="{{ $permission->id }}"> {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection