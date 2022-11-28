@extends('layouts.admin')

<div class = "container mt-5">
  <h2 class="text-center">New Permission</h2>
<form method="POST" action = "{{ route('admin.permissions.update', $permission) }}">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" id="" name="name" value="{{$permission->name}}">
    </div>
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">update</button>
</form>
</div>

<div class = "container mt-5">
    Roles
  @if ($permission->roles)
      @foreach ($permission->roles as $permission_role)
        <form method="POST" action = "{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}" onsubmit="return confirm('Are you sure?');">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn text-primary">{{ $permission_role->name }}</button>
        </form>      
      @endforeach
  @endif
</div>

<div class = "container mt-5">
  <h2 class="text-center">Assign Role</h2>
<form method="POST" action = "{{ route('admin.permissions.roles', $permission->id) }}">
  @csrf
    <div class="mb-3">
      <select name="role" class="form-control" id="role" >
        @foreach ($roles as $role)            
          <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
      </select>
    </div>
    @error('role')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Assign</button>
</form>
</div>