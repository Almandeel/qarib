    <!-- Modal -->
    <div class="modal fade" id="warehousesModal" tabindex="-1" role="dialog" aria-labelledby="warehousesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="warehousesModalLabel">Add warehouse</h4>
                </div>
                <form id="form_market" action="{{ route('warehouses.store') }}" method="post">
                    @csrf 
                    <div class="modal-body">

                        <div class="form-group">
                            <label>name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                        </div>

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

$('.warehouse').click(function() {

	if($(this).hasClass("update")){
        $('#form_market').attr('action', $(this).data('action'))
        $('#form_market').append('<input type="hidden" name="_method" value="PUT">')

        $('.modal-title').text('Edit Warehouses')

        //set data to inputs
        $('#form_market input[name="name"]').val($(this).data('name'))

    }else {
        $('#form_items').attr('action', '{{ route("warehouses.store") }}' )
        $('.modal-title').text('Add Warehouses')
        
        //delete data from inputs
        $('#form_market input[name="name"]').val('')
    }

            

})
</script>