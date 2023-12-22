@extends('layouts.backend.index')
@section('title', 'Roles')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            <h4 class="card-title">Roles</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        {{-- <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createNewRole">
                            <i class="fa-solid fa-plus"></i> Add new Role
                          </button>
                          @include('admin.role.create') --}}
                    </div>
                </div>
             </div>
             <div class="iq-card-body">

                <div class="table-responsive">
                   <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                         <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>COUNT</th>
                            <th>CREATED BY</th>
                            <th>EDIT</th>
                            <th>VIEW</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($roles as $key=>$role)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($role->name) }}</td>
                                    <td>{{ $role->users->count() }}</td>
                                    <td>{{ Str::title($role->createdbys->name) }} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#editRole-{{ $role->id }}">
                                            <i class="fa-solid fa-edit"></i> Edit
                                        </button>
                                        @include('admin.role.edit')
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#viewUserList-{{ $role->id }}">
                                            <i class="fa-solid fa-eye"></i> Users
                                        </button>
                                        @include('admin.role.show')
                                    </td>
                                </tr>
                            @empty
                                    {{-- <tr>
                                        <td colspan="4">No Session added</td>
                                    </tr> --}}
                            @endforelse
                      </tbody>
                      <tfoot>
                         <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>COUNT</th>
                            <th>CREATED BY</th>
                            <th>EDIT</th>
                            <th>VIEW</th>
                         </tr>
                      </tfoot>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
