<div class="grid grid-cols-12 gap-4 gap-y-3">
    <div class="col-span-12 sm:col-span-12 mb-2">
        <h5>Pengaturan Account Email</h5>
        <hr>
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Email address</label>
        <input type="text" class="form-control" name="setting_acountemail" placeholder="Email pengirim..." value="{{ isset($settings) ? $settings->setting_acountemail : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Password</label>
        <input type="text" class="form-control" name="setting_acountpassword" placeholder="Password..." value="{{ isset($settings) ? $settings->setting_acountpassword : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Nama Pengirim</label>
        <input type="text" class="form-control" name="setting_namapengirim" placeholder="Nama pengirim..." value="{{ isset($settings) ? $settings->setting_namapengirim : '' }}">
    </div>
    <div class="mt-4"></div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <h5>Pengaturan Pesan Email</h5>
        <hr>
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Subject</label>
        <input type="text" class="form-control" name="setting_subject" placeholder="Subject..." value="{{ isset($settings) ? $settings->setting_subject : '' }}">
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Isi Content</label>
        <textarea class="form-control" name="setting_contentemail" placeholder="Isi Content...">{{ isset($settings) ? $settings->setting_contentemail : '' }}</textarea>
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Text Penutup</label>
        <textarea class="form-control" name="setting_penutupemail" placeholder="Penutup...">{{ isset($settings) ? $settings->setting_penutupemail : '' }}</textarea>
    </div>
    <div class="col-span-12 sm:col-span-12 mb-2">
        <label for="" class="form-label">Text Copyright</label>
        <input type="text" class="form-control" name="setting_copyright" placeholder="Copyright..." value="{{ isset($settings) ? $settings->setting_copyright : '' }}">
    </div>
</div>