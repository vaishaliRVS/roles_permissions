@extends('layouts.admin')

<div class = "container mt-5">
  <h2 class="text-center">New Product</h2>
<form method="POST" action = "{{ route('admin.products.store') }}">
  @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" id="" name="name">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Detail</label>
      <input type="text" class="form-control" id="" name="detail">
    </div>
    
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>




