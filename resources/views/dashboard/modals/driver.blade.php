    <!-- Modal -->
    <div class="modal fade" id="DriversModal" tabindex="-1" role="dialog" aria-labelledby="DriversModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title float-right" id="DriversModalLabel">Add Driver</h4>
                </div>
                <form id="form_driver" action="{{ route('drivers.store') }}" method="post">
                    @csrf 

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>phone</label>
                                    <input type="number" class="form-control" name="phone" placeholder="phone" required>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label>address </label>
                            <input type="text" class="form-control" name="address" placeholder="address" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>email </label>
                                    <input type="email" class="form-control" name="email" placeholder="email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>salary </label>
                                    <input type="number" class="form-control" name="salary" placeholder="salary">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>commission </label>
                                    <input type="number" class="form-control" name="commission" placeholder="commission">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>max orders </label>
                                    <input type="number" class="form-control" name="max_orders" placeholder="max orders">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>car </label>
                            <input type="text" class="form-control" name="car" placeholder="car" required>
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

$('.driver').click(function() {
	if($(this).hasClass("update")){
        console.log('update!')
        $('#form_driver').attr('action', $(this).data('action'))
        $('#form_driver').append('<input type="hidden" name="_method" value="PUT">')

        $('#DriversModal .modal-title').text('Edit Driver')

        //set data to inputs
        $('#form_driver input[name="name"]').val($(this).data('name'))
        $('#form_driver input[name="email"]').val($(this).data('email'))
        $('#form_driver input[name="phone"]').val($(this).data('phone'))
        $('#form_driver input[name="salary"]').val($(this).data('salary'))
        $('#form_driver input[name="car"]').val($(this).data('car'))
        $('#form_driver input[name="address"]').val($(this).data('address'))
        $('#form_driver input[name="max_orders"]').val($(this).data('max-orders'))
        $('#form_driver input[name="commission"]').val($(this).data('commission'))

    }else {
        $('#form_items').attr('action', '{{ route("drivers.store") }}' )
        $('.modal-title').text('Add Market')
        
        //delete data from inputs
        $('#form_driver input[name="name"]').val('')
        $('#form_driver input[name="email"]').val('')
        $('#form_driver input[name="delivery_cost"]').val('')
    }

            

})
</script>