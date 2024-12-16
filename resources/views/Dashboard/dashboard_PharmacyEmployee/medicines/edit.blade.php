<div class="modal fade" id="editMedicine{{ $medicine->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editMedicineModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{ route('medicines.update', $medicine->id) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="editMedicineModalLabel">Edit Medicine</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- Medicine Name -->
                   <div class="form-group">
                       <label for="name">Medicine Name</label>
                       <input type="text" class="form-control" name="name" value="{{ $medicine->name }}" required>
                   </div>

                   <!-- Section -->
                   <div class="form-group">
                       <label for="section_id">Section</label>
                       <select class="form-control" name="section_id" required>
                           @foreach($sections as $section)
                               <option value="{{ $section->id }}"
                                   {{ $medicine->medicine_section_id == $section->id ? 'selected' : '' }}>
                                   {{ $section->name }}
                               </option>
                           @endforeach
                       </select>
                   </div>

                   <!-- Price -->
                   <div class="form-group">
                       <label for="price">Price</label>
                       <input type="number" step="0.01" class="form-control" name="price" value="{{ $medicine->price }}" required>
                   </div>

                   <!-- Stock -->
                   <div class="form-group">
                       <label for="stock">Stock</label>
                       <input type="number" class="form-control" name="stock" value="{{ $medicine->stock }}" min="0" required>
                   </div>

                   <!-- Description -->
                   <div class="form-group">
                       <label for="description">Description</label>
                       <textarea class="form-control" name="description" rows="3">{{ $medicine->description }}</textarea>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Save Changes</button>
               </div>
           </div>
       </form>
   </div>
</div>
