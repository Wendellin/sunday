<div class="modal fade" id="viewDepartmentMembers-{{ $dept->id }}" tabindex="-1" aria-labelledby="viewDepartmentMembersLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewDepartmentMembersLabel">Members of <strong>{{$dept->name}} Department </strong></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($dept->doctors as $key=>$doctor)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $doctor->users->name }}</td>
                                    <td>{{ $doctor->users->email }}</td>
                                    <td>{{ $doctor->phone_no }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No registed doctor</td>
                                </tr>
                            @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
