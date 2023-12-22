<div class="modal fade" id="viewProvinceDistrict-{{ $province->id }}" tabindex="-1" aria-labelledby="viewProvinceDistrictLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewProvinceDistrictLabel">Districts in <strong>{{$province->name}} Province </strong></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>No of DOCTORS</th>
                            <th>No of PATIENTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($province->districts as $key=>$district)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Str::title($district->name) }}</td>
                                <td>{{ $district->doctors->count() }}</td>
                                <td>{{ $district->patients->count() }}</td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>DOCTORS</th>
                            <th>PATIENTS</th>
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
