<div>
    <h5>Pengaturan Account Email</h5>
    <div style="width: 100%; height: 1px; background-color: #000; margin-bottom: 15px;"></div>
    <div class="form-group">
        <label for="">Email Address</label>
        <input type="text" class="form-control" name="setting_acountemail" placeholder="Email Pengirim..." value="{{ isset($settings) ? $settings->setting_acountemail : '' }}">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="text" class="form-control" name="setting_acountpassword" placeholder="Password..." value="{{ isset($settings) ? $settings->setting_acountpassword : '' }}">
    </div>
    <div class="form-group">
        <label for="">Nama Pengirim</label>
        <input type="text" class="form-control" name="setting_namapengirim" placeholder="Nama pengirim..." value="{{ isset($settings) ? $settings->setting_namapengirim : '' }}">
    </div>
</div>
<div class="mt-4">
    <h5>Pengaturan Pesan Email</h5>
    <div style="width: 100%; height: 1px; background-color: #000; margin-bottom: 15px;"></div>
    <div class="form-group">
        <label for="">Subject</label>
        <input type="text" class="form-control" name="setting_subject" placeholder="Subject..." value="{{ isset($settings) ? $settings->setting_subject : '' }}">
    </div>
    <div class="form-group">
        <label for="">Isi Content</label>
        <textarea class="form-control" name="setting_contentemail" placeholder="Isi Content...">{{ isset($settings) ? $settings->setting_contentemail : '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Text Penutup</label>
        <textarea class="form-control" name="setting_penutupemail" placeholder="Penutup...">{{ isset($settings) ? $settings->setting_penutupemail : '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="">Text Copyright</label>
        <input type="text" class="form-control" name="setting_copyright" placeholder="Copyright..." value="{{ isset($settings) ? $settings->setting_copyright : '' }}">
    </div>
</div>