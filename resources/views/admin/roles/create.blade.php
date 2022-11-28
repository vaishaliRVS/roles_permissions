@extends('layouts.admin')
<div class = "container mt-5">
  <h2 class="text-center">New Role</h2>
  <form method="POST" action = "{{ route('admin.roles.store') }}">
    @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" id="" name="name">
      </div>
      @error('name')  <span class="error"> {{ $message }} </span> @enderror
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>