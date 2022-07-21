<div class="box box-info padding-1">
    <div class="box-body">

        <div class="mb-3">
            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="full_name" value="{{ $userProfile->full_name }}" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Kota</label>
          <select class="form-control" name="city">
            <option selected disabled>== Pilih Kota ==</option>
            <option value="Bandung">Bandung</option>
            <option value="Bogor">Bogor</option>
            <option value="Jakarta">Jakarta</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" class="form-control" name="image" required>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
