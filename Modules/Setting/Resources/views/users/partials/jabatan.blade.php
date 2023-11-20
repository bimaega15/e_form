<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Kode User</label>
    <input type="text" class="form-control" name="code_profile" placeholder="Kode..." value="{{ isset($profile) ? $profile->code_profile : '' }}">
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Nama Unit</label>
    <select name="unit_id" id="" class="form-select select2" style="width: 100%;">
        <option value="">-- Pilih Unit --</option>
        @foreach ($unit as $item)
        <option value="{{ $item->id }}" {{ isset($profile) ? $profile->unit_id == $item->id ? 'selected' : '' : '' }}>
            {{$item->nama_unit}}
        </option>
        @endforeach
    </select>
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Nama Jabatan</label>
    <select name="jabatan_id" id="" class="form-select select2" style="width: 100%;">
        <option value="">-- Pilih Jabatan --</option>
        @foreach ($jabatan as $item)
        <option value="{{ $item->id }}" {{ isset($profile) ? $profile->jabatan_id == $item->id ? 'selected' : '' : '' }}>
            {{$item->nama_jabatan}}
        </option>
        @endforeach
    </select>
</div>
<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Kategori Office</label>
    <select name="category_office_id" id="" class="form-select select2" style="width: 100%;">
        <option value="">-- Pilih Kategori Office --</option>
        @foreach ($categoryOffice as $item)
        <option value="{{ $item->id }}" {{ isset($profile) ? $profile->category_office_id == $item->id ? 'selected' : '' : '' }}>
            {{$item->nama_category_office}}
        </option>
        @endforeach
    </select>
</div>


<div class="col-span-12 sm:col-span-12 mb-2">
    <label for="" class="form-label">Atasan</label>
    <select name="usersid_atasan" id="" class="form-select select2ServerSide" style="width: 100%;" data-url="{{ route('setting.users.getUsersProfile') }}">
        <option value="">-- Pilih Atasan --</option>
        @foreach ($usersIdAtasan as $item)
        <option value="{{ $item->id }}" {{ isset($profile) ? $profile->usersid_atasan == $item->id ? 'selected' : '' : '' }}>
            {{$item->profile->nama_profile }} | {{$item->profile->jabatan->nama_jabatan }}
        </option>
        @endforeach
    </select>
</div>