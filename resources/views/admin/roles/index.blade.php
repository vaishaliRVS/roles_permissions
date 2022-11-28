@extends('layouts.admin')

<div class="container">
     <a class="btn btn-success" href="{{ route('admin.roles.create') }}">Create</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)  
          <tr>
            <td>{{ $role->name }} </td>
            <td>
              @if ($role->name != 'Admin')
                @can('role-edit')
                  <a href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>  
                @endcan 
              @endif
                                              
            </td>        
          </tr>
          @endforeach 
        </tbody>
      </table>

</div>
