@extends('layouts.backend.index')
@section('title', 'Districts')

@section('content')

<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header justify-content-between">
                <div class="row pt-3">
                    <div class="col-sm-6">
                        <div class="iq-header-title">
                            <h4 class="card-title">Districts</h4>
                         </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createNewDistrict">
                            <i class="fa-solid fa-plus"></i> Add new District
                          </button>
                          @include('admin.district.create')
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
                            <th>PROVINCE</th>
                            <th>CREATED BY</th>
                            <th>EDIT</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($districts as $key=>$district)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($district->name) }}</td>
                                    <td>{{ Str::title($district->provinces->name) }}</td>
                                    <td>{{ Str::title($district->users->name) }} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#editDistrict-{{ $district->id }}">
                                            <i class="fa-solid fa-edit"></i> Edit
                                        </button>
                                        @include('admin.district.edit')
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
