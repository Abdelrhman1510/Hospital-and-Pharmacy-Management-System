<div class="modal fade" id="deleteInvoiceModal{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteInvoiceModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <form action="{{ route('medicineinvoices.destroy', $invoice->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <div class="modal-header">
                   <h5 class="modal-title" id="deleteInvoiceModalLabel">Delete an Invoice</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Are You sure want to delete : {{ $invoice->invoice_number }} ?
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-danger">Delete</button>
               </div>
           </form>
       </div>
   </div>
</div>
