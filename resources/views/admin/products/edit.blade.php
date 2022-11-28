@extends('layouts.admin')

<form method="POST" action = "{{ route('admin.products.update', $product) }}">
  @csrf
  @method('PUT')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" id="" name="name" value="{{ $product->name }} ">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Detail</label>
        <input type="text" class="form-control" id="" name="detail"  value="{{ $product->detail }} ">
      </div>
    @error('name')  <span class="error"> {{ $message }} </span> @enderror
    <button type="submit" class="btn btn-primary">Update</button>
</form>
