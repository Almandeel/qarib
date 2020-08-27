    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="userModalLabel">user to Warehouse</h4>
                </div>
                <form id="form_user_warehouse" action="{{ route('warehouseusers.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <select name="user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>

$('.user').click(function() {
    $('#form_user_warehouse input[name="warehouse_id"]').remove()
    $('#form_user_warehouse').append("<input type='hidden' name='warehouse_id' value=" + $(this).data('warehouse') + " />")
})
</script>