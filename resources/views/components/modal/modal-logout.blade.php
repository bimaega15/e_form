<div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-labelledby="modal_logout" aria-hidden="true">
   <div class="modal-dialog" style="min-width: 650px;">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Form Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="modal-body">
               <p>Apakah anda yakin ingin keluar dari sistem ?</p>
            </div>
            <div class="modal-footer">
               <div class="form-group d-flex justify-content-center" style="width: 100%;">
                  <button type="button" class="btn btn-secondary d-flex align-items-center justify-content-center mr-2" data-dismiss="modal">
                     <i class="zmdi zmdi-close mr-1"></i> Close
                  </button>
                  <button type="submit" class="btn btn-primary mr-2"><i class="zmdi zmdi-mail-send mr-1"></i>
                     Simpan</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>