<div class="modal fade" id="deleteSectionModal{{ $section->id }}" tabindex="-1" role="dialog"
    aria-labelledby="deleteSectionModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <form action="{{ route('medicine-sections.destroy', $section->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <div class="modal-header">
                   <h5 class="modal-title" id="deleteSectionModalLabel">{{ trans('Dashboard/sections_trans.delete_sections') }}</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Do you want to delete : {{ $section->name }} ?
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-danger">Delete</button>
               </div>
           </form>
       </div>
   </div>
</div>
