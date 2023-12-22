<div class="modal fade" id="viewUserList-{{ $role->id }}" tabindex="-1" aria-labelledby="viewUserListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewUserListLabel">Users under <strong>{{$role->name}} Role </strong></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>DATE CREATED</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($role->users as $key=>$user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Str::title($user->name) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->toFormattedDayDateString() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No user registred</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>DATE CREATED</th>
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
