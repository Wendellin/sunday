@extends('layouts.backend.index')
@section('title', 'Appointments')

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
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createNewSession">
                            <i class="fa-solid fa-plus"></i> Add new Session
                          </button>
                          @include('admin.appointment-time.create')
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
                            <th>START TIME</th>
                            <th>ENDING TIME</th>
                            <th>ACTION</th>
                         </tr>
                      </thead>
                      <tbody>
                            @forelse ($aTimes as $key=>$aTime)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Str::title($aTime->name) }}</td>
                                    <td>{{ $aTime->start_time }} </td>
                                    <td>{{ $aTime->end_time }} </td>
                                    <td>
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#editSession-{{ $aTime->id }}">
                                            <i class="fa-solid fa-edit"></i> Edit
                                        </button>
                                        @include('admin.appointment-time.edit')
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
                            <th>START TIME</th>
                            <th>ENDING TIME</th>
                            <th>ACTION</th>
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
