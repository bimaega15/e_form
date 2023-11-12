<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label for="logo_settings">Logo Perusahaan</label>
            <input type="file" class="form-control" name="logo_settings">
            @if (isset($settings))
            @if ($settings != null)
            <div id="load_logo_settings">
                <a class="photoviewer" href="{{ asset('upload/settings/logo/'.$settings->logo_settings) }}" data-gallery="photoviewer" data-title="{{ $settings->logo_settings }}" target="_blank">
                    <img src="{{ asset('upload/settings/logo/'.$settings->logo_settings) }}" alt="upload gambar" height="100px" class="rounded">
                </a>
            </div>
            @endif
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="icon_settings">Icon Perusahaan</label>
            <input type="file" class="form-control" name="icon_settings">
            @if (isset($settings))
            @if ($settings != null)
            <div id="load_icon_settings">
                <a class="photoviewer" href="{{ asset('upload/settings/icon/'.$settings->icon_settings) }}" data-gallery="photoviewer" data-title="{{ $settings->icon_settings }}" target="_blank">
                    <img src="{{ asset('upload/settings/icon/'.$settings->icon_settings) }}" alt="upload gambar" height="100px" class="rounded">
                </a>
            </div>
            @endif
            @endif

        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="perusahaan_settings">Gambar Perusahaan</label>
            <input type="file" class="form-control" name="perusahaan_settings">
            @if (isset($settings))
            @if ($settings != null)
            <div id="load_perusahaan_settings">
                <a class="photoviewer" href="{{ asset('upload/settings/perusahaan/'.$settings->perusahaan_settings) }}" data-gallery="photoviewer" data-title="{{ $settings->perusahaan_settings }}" target="_blank">
                    <img src="{{ asset('upload/settings/perusahaan/'.$settings->perusahaan_settings) }}" alt="upload gambar" height="100px" class="rounded">
                </a>
            </div>
            @endif
            @endif

        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="nama_settings">Nama Perusahaan</label>
            <input type="text" class="form-control" name="nama_settings" placeholder="Nama perusahaan..." value="{{ isset($settings) ? $settings->nama_settings : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="alamat_settings">Alamat</label>
            <textarea name="alamat_settings" class="form-control" placeholder="Alamat perusahaan...">{{ isset($settings) ? $settings->alamat_settings : '' }}</textarea>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="deskripsi_settings">Deskripsi</label>
            <textarea name="deskripsi_settings" class="form-control" placeholder="Deskripsi...">{{ isset($settings) ? $settings->deskripsi_settings : '' }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="bahasa_settings">Bahasa</label>
            <select name="bahasa_settings" class="form-control select2" id="">
                <option value="">-- Pilih Bahasa --</option>
                @foreach ($bahasa as $item)
                <option value="{{$item->id}}" {{ isset($settings) ? $settings->bahasa_settings == $item->id ? 'selected' : '' : '' }}>{{$item->nama_datastatis}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="zonawaktu_settings">Zona Waktu</label>
            <select name="zonawaktu_settings" class="form-control select2ServerSide" id="">
                <option value="">-- Pilih Zona Waktu --</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="nohp_settings">No. Handphone</label>
            <input type="number" class="form-control" name="nohp_settings" placeholder="No. Handphone..." value="{{ isset($settings) ? $settings->nohp_settings : '' }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="email_settings">Email</label>
            <input type="text" class="form-control" name="email_settings" placeholder="Email..." value="{{ isset($settings) ? $settings->email_settings : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label for="facebook_settings">Facebook</label>
            <input type="text" class="form-control" name="facebook_settings" placeholder="Facebook..." value="{{ isset($settings) ? $settings->facebook_settings : '' }}">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="instagram_settings">Instagram</label>
            <input type="text" class="form-control" name="instagram_settings" placeholder="Instagram..." value="{{ isset($settings) ? $settings->instagram_settings : '' }}">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="linkedin_settings">Linked IN</label>
            <input type="text" class="form-control" name="linkedin_settings" placeholder="Linked IN..." value="{{ isset($settings) ? $settings->linkedin_settings : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="whatsapp_settings">Whats App</label>
            <input type="text" class="form-control" name="whatsapp_settings" placeholder="Whats App..." value="{{ isset($settings) ? $settings->whatsapp_settings : '' }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="youtube_settings">Youtube</label>
            <input type="text" class="form-control" name="youtube_settings" placeholder="Youtube..." value="{{ isset($settings) ? $settings->youtube_settings : '' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="longitude_settings">Longitude</label>
            <input type="text" class="form-control" name="longitude_settings" placeholder="Longitude..." value="{{ isset($settings) ? $settings->longitude_settings : '' }}">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="latitude_settings">Latitude</label>
            <input type="text" class="form-control" name="latitude_settings" placeholder="Latitude..." value="{{ isset($settings) ? $settings->latitude_settings : '' }}">
        </div>
    </div>
</div>