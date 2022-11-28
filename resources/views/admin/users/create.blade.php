@extends('layouts.admin')

<form method="POST" action = "{{ route('admin.users.store') }}">
  @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" id="" name="name">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" id="" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Password</label>
      <input type="password" class="form-control" id="" name="password">
    </div>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Role</label>
        <select name="roles" id="">
          @foreach ($roles as $role)
            <option value="{{ $role }}">{{ $role }}</option>              
          @endforeach
        </select>
    </div>
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>




