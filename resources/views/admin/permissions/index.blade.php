@extends('layouts.admin')
<div class = "container mt-5">
  <h2 class="text-center">Permissions</h2>
   <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">Create</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($permissions as $permission)  
          <tr>
            <td>{{ $permission->name }} </td>
            <td>
                <a href="{{ route('admin.permissions.edit', $permission->id) }}">Edit</a>         
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>

</div>
</div>