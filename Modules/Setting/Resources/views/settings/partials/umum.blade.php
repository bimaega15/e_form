<div class="grid grid-cols-12 gap-4 gap-y-3">
    <div class="col-span-12 sm:col-span-4 mb-2">
        <label for="" class="form-label">Logo Instansi</label>
        <input type="file" class="form-control" name="logo_settings">
        @if (isset($settings))
        @if ($settings != null)
        <div id="load_logo_settings">
            <a class="photoviewer" href="{{ asset('upload/settings/logo/'.$settings->logo_settings) }}" data-gallery="photoviewer" data-title="{{ $settings->logo_settings }}" target="_blank">
                <img src="{{ asset('upload/settings/logo/'.$settings->logo_settings) }}" alt="Upload gambar" height="100px" class="rounded">
            </a>
        </div>
        @endif
        @endif
    </div>
    <div class="col-span-12 sm:col-span-4 mb-2">
        <label for="" class="form-label">Icon</label>
        <input type="file" class="form-control" name="icon_settings">
        @if (isset($settings))
        @if ($settings != null)
        <div id="load_icon_settings">
            <a class="photoviewer" href="{{ asset('upload/settings/logo/'.$settings->icon_settings) }}" data-gallery="photoviewer" data-title="{{ $settings->icon_settings }}" target="_blank">
                <img src="{{ asset('upload/settings/logo/'.$settings->icon_settings) }}" alt="Upload gambar" height="100px" class="rounded">
            </a>
        </div>
        @endif
        @endif
    </div>
    <div class="col-span-12 sm:col-span-4 mb-2">
        <label for="" class="form-label">Gambar</label>
        <input type="file" class="form-control" name="perusahaan_settings">
        @if (isset($settings))
        @if ($settings != null)
        <div id="load_perusahaan_settings">
            <a class="photoviewer" href="{{ asset('upload/settings/logo/'.$settings->perusahaan_settings) }}" data-gallery="photoviewer" data-title="{{ $settings->perusahaan_settings }}" target="_blank">
                <img src="{{ asset('upload/settings/logo/'.$settings->perusahaan_settings) }}" alt="Upload gambar" height="100px" class="rounded">
            </a>
        </div>
        @endif
        @endif
    </div>

    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Nama Instansi</label>
        <input type="text" class="form-control" name="nama_settings" placeholder="Nama instansi..." value="{{ isset($settings) ? $settings->nama_settings : '' }}">
    </div>

    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat_settings" placeholder="Alamat...">{{ isset($settings) ? $settings->alamat_settings : '' }}</textarea>
    </div>
    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi_settings" placeholder="Deskripsi...">{{ isset($settings) ? $settings->deskripsi_settings : '' }}</textarea>
    </div>

    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Bahasa</label>
        <select name="bahasa_settings" id="" class="form-select select2" style="width: 100%;">
            <option value="">-- Pilih Bahasa --</option>
            @foreach ($bahasa as $item)
            <option value="{{ $item->id }}" {{ isset($settings) ? $settings->bahasa_settings == $item->id ? 'selected' : '' : '' }}>
                {{$item->nama_datastatis}}
            </option>
            @endforeach
        </select>
    </div>

    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Zona Waktu</label>
        <select name="zonawaktu_settings" id="" class="form-select select2ServerSide" style="width: 100%;">
            <option value="">-- Pilih Zona Waktu --</option>
        </select>
    </div>

    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">No. Handphone</label>
        <input type="text" class="form-control" name="nohp_settings" placeholder="No. Handphone..." value="{{ isset($settings) ? $settings->nohp_settings : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" name="email_settings" placeholder="Email..." value="{{ isset($settings) ? $settings->email_settings : '' }}">
    </div>

    <div class="col-span-12 sm:col-span-4 mb-2">
        <label for="" class="form-label">Facebook</label>
        <input type="text" class="form-control" name="facebook_settings" placeholder="Facebook..." value="{{ isset($settings) ? $settings->facebook_settings : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-4 mb-2">
        <label for="" class="form-label">Instagram</label>
        <input type="text" class="form-control" name="instagram_settings" placeholder="Instagram..." value="{{ isset($settings) ? $settings->instagram_settings : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-4 mb-2">
        <label for="" class="form-label">Linked IN</label>
        <input type="text" class="form-control" name="linkedin_settings" placeholder="Linked IN..." value="{{ isset($settings) ? $settings->linkedin_settings : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Whats App</label>
        <input type="text" class="form-control" name="whatsapp_settings" placeholder="Linked IN..." value="{{ isset($settings) ? $settings->whatsapp_settings : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Youtube</label>
        <input type="text" class="form-control" name="youtube_settings" placeholder="Youtube..." value="{{ isset($settings) ? $settings->youtube_settings : '' }}">
    </div>

    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Latitude</label>
        <input type="text" class="form-control" name="latitude_settings" placeholder="Latitude..." value="{{ isset($settings) ? $settings->latitude_settings : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-6 mb-2">
        <label for="" class="form-label">Longitude</label>
        <input type="text" class="form-control" name="longitude_settings" placeholder="Longitude..." value="{{ isset($settings) ? $settings->longitude_settings : '' }}">
    </div>
</div>