@extends('layouts.admin')

<form method="POST" action = "{{ route('admin.roles.update', $role) }}">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" id="" name="name" value="{{ $role->name }} ">
    </div>
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<div>
  Role Permission
  @if ($role->permissions)
      @foreach ($role->permissions as $role_permission)
        <form method="POST" action = "{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('Are you sure?');">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-primary">{{ $role_permission->name }}</button>
        </form>      
      @endforeach
  @endif
</div>

<form method="POST" action = "{{ route('admin.roles.permissions', $role->id) }}">
  @csrf
    <div class="mb-3">
      <select name="permission" id="permission" >
        @foreach ($permissions as $permission)            
          <option value="{{ $permission->name }}">{{ $permission->name }}</option>
        @endforeach
      </select>
    </div>
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Assign</button>
</form>