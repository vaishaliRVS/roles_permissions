@extends('layouts.admin')
<div class="container">
  <a class="btn btn-success" href="{{ route('admin.products.create') }}">Create</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Detail</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)  
          <tr>
            <td>{{ $product->name }} </td>
            <td>{{ $product->detail }} </td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>         
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
</div>