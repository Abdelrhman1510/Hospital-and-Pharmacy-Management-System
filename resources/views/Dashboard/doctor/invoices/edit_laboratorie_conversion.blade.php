<!-- Modal -->
<div class="modal fade" id="edit_laboratorie_conversion{{$patient_Laboratorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Convert to Laboratory Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Laboratories.update',$patient_Laboratorie->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Requested</label>
                        <textarea class="form-control" name="description" rows="6">{{$patient_Laboratorie->description}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
