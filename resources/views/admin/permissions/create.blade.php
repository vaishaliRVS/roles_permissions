@extends('layouts.admin')

<form method="POST" action = "{{ route('admin.permissions.store') }}">
  @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" id="" name="name">
    </div>
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>