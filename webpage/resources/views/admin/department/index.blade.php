@extends('layouts.backend.index')
@section('title', 'Departments')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            <h4 class="card-title">Appointment Sessions</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createNewDepartment">
                            <i class="fa-solid fa-plus"></i> Add new Department
                          </button>
                          @include('admin.department.create')
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
                            <th>TEAM MEMBERS</th>
                            <th>CREATED BY</th>
                            <th>EDIT</th>
                            <th>VIEW</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($depts as $key=>$dept)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($dept->name) }}</td>
                                    <td>{{ $dept->doctors->count() }}</td>
                                    <td>{{ Str::title($dept->users->name) }} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#editDepartment-{{ $dept->id }}">
                                            <i class="fa-solid fa-edit"></i> Edit
                                        </button>
                                        @include('admin.department.edit')
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#viewDepartmentMembers-{{ $dept->id }}">
                                            <i class="fa-solid fa-eye"></i> Members
                                        </button>
                                        @include('admin.department.show')
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
                            <th>TEAM MEMBERS</th>
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
