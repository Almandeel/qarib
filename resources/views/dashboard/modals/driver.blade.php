    <!-- Modal -->
    <div class="modal fade" id="DriversModal" tabindex="-1" role="dialog" aria-labelledby="DriversModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title float-right" id="DriversModalLabel">اضافة مندوب </h4>
                </div>
                <form id="form_driver" action="{{ route('drivers.store') }}" method="post">
                    @csrf 

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="number" class="form-control" name="phone" placeholder="رقم الهاتف" required>
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label>العنوان </label>
                            <input type="text" class="form-control" name="address" placeholder="العنوان" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المرتب </label>
                                    <input type="number" class="form-control" name="salary" placeholder="المرتب">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العمولة </label>
                                    <input type="number" class="form-control" name="commission" placeholder="العمولة">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>عدد الطلبات </label>
                                    <input type="number" class="form-control" name="max_orders" placeholder="عدد الطلبات ">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>نوع العربة </label>
                            <input type="text" class="form-control" name="car" placeholder="نوع العربة" required>
                        </div>
    
                        
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
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