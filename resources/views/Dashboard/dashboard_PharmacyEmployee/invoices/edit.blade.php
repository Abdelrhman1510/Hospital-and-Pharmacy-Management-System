<div class="modal fade" id="editInvoiceModal{{ $invoice->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="modal-header">
                   <h5 class="modal-title" id="editInvoiceModalLabel">{{ trans('Dashboard/invoices_trans.edit_invoice') }}</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="form-group">
                       <label for="invoice_number">{{ trans('Dashboard/invoices_trans.invoice_number') }}</label>
                       <input type="text" name="invoice_number" id="invoice_number" class="form-control"
                              value="{{ $invoice->invoice_number }}" required>
                   </div>
                   <div class="form-group">
                       <label for="customer_name">{{ trans('Dashboard/invoices_trans.customer_name') }}</label>
                       <input type="text" name="customer_name" id="customer_name" class="form-control"
                              value="{{ $invoice->customer_name }}" required>
                   </div>
                   <div class="form-group">
                       <label for="total">{{ trans('Dashboard/invoices_trans.total_amount') }}</label>
                       <input type="number" name="total" id="total" class="form-control"
                              value="{{ $invoice->total }}" required>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save</button>
               </div>
           </form>
       </div>
   </div>
</div>
