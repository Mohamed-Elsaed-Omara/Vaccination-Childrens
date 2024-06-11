<!-- Modal -->
<div class="modal fade" id="delete{{ $vaccin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف تطيعم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('Vaccination/'.$vaccin->id) }}" method="POST">
                @method('DELETE')
                @csrf
            <div class="modal-body">
                <h5>هل انت متأكد من حذف هذا التطعيم؟</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button type="submit" class="btn btn-danger">حذف</button>
            </div>
            </form>
        </div>
    </div>
</div>