<div class="modal fade" id="deleteMedicine{{ $medicine->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteMedicineModalLabel" aria-hidden="true">

   <div class="modal-dialog" role="document">
       <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST">
           @csrf
           @method('DELETE')
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="deleteMedicineModalLabel">Delete Medicine</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>Are you sure you want to delete <strong>{{ $medicine->name }}</strong>?</p>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-danger">Delete</button>
               </div>
           </div>
       </form>
   </div>
</div>
