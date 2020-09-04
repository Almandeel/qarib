    <!-- Modal -->
    <div class="modal fade" id="MarketsModal" tabindex="-1" role="dialog" aria-labelledby="MarketsModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="MarketsModalLabel">اضافة متجر</h4>
                </div>
                <form id="form_market" action="{{ route('markets.store') }}" method="post">
                    @csrf 
                    <div class="modal-body">

                        <div class="form-group">
                            <label>اسم المتجر</label>
                            <input type="text" class="form-control" name="name" placeholder="اسم المتجر" required>
                        </div>

                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" >
                        </div>

                        <div class="form-group">
                            <label>العمولة</label>
                            <input type="number" class="form-control" name="delivery_cost" placeholder="العمولة " required>
                        </div>

                        {{-- <div class="form-group">
                            <label>password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" >
                        </div> --}}
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

$('.market').click(function() {

	if($(this).hasClass("update")){
        $('#form_market').attr('action', $(this).data('action'))
        $('#form_market').append('<input type="hidden" name="_method" value="PUT">')

        $('.modal-title').text('تعديل')

        //set data to inputs
        $('#form_market input[name="name"]').val($(this).data('name'))
        $('#form_market input[name="email"]').val($(this).data('email'))
        $('#form_market input[name="delivery_cost"]').val($(this).data('cost'))

    }else {
        $('#form_items').attr('action', '{{ route("markets.store") }}' )
        $('.modal-title').text('اضافة')
        
        //delete data from inputs
        $('#form_market input[name="name"]').val('')
        $('#form_market input[name="email"]').val('')
        $('#form_market input[name="delivery_cost"]').val('')
    }

            

})
</script>