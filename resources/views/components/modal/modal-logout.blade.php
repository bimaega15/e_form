<div class="modal fade" id="modal_logout" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="font-medium text-base mr-auto modal-title">Form Logout</h2>
            <a data-tw-dismiss="modal" href="javascript:;" class="btn btn-outline-secondary hidden sm:flex"> <i data-lucide="x" class="w-8 h-8 text-slate-400"></i>
            </a>
         </div>
         <form action="{{ route('logout') }}" method="post">
            @csrf
            <div class="modal-body">
               <p>Apakah anda yakin ingin keluar dari sistem ?</p>
            </div>
            <div class="modal-footer">
               <div class="flex justify-center" style="width: 100%;">
                  <div class="form-group d-flex">
                     <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                        Cancel
                     </button>
                     <button type="submit" class="btn btn-primary w-20">
                        Submit
                     </button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>