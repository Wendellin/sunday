<div class="modal fade" id="editDistrict-{{ $district->id }}" tabindex="-1" aria-labelledby="editDistrictLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editDistrictLabel">Edit {{ $district->name }} District</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.district-update', $district->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body text-start">

                <div class="form-group">
                    <label for="name">District Name</label>
                    <input type="name" class="form-control" id="name" name="name" required value="{{ $district->name }}">
                 </div>

                 <div class="form-group">
                    <label for="name">Province Name</label>
                    <select name="province_id" id="province_id" class="form-control">
                        <option value="{{ $district->province_id }}" selected>{{ $district->provinces->name }}</option>
                        <option disabled>_________________________</option>
                        @forelse ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @empty
                            <option disabled>No Province Available</option>
                        @endforelse
                    </select>
                 </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
