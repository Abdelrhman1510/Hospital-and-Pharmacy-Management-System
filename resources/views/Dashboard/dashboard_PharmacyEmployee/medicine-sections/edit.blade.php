<div class="modal fade" id="editSectionModal{{ $section->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editSectionModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <form action="{{ route('medicine-sections.update', $section->id) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="modal-header">
                   <h5 class="modal-title" id="editSectionModalLabel">{{ trans('Dashboard/sections_trans.edit_sections') }}</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="form-group">
                       <label for="name">{{ trans('Dashboard/sections_trans.name_sections') }}</label>
                       <input type="text" name="name" id="name" class="form-control" value="{{ $section->name }}" required>
                   </div>
                   <div class="form-group">
                       <label for="description">{{ trans('Dashboard/sections_trans.description') }}</label>
                       <textarea name="description" id="description" class="form-control">{{ $section->description }}</textarea>
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
