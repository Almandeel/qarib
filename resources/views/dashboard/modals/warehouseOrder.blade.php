    <!-- Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="orderModalLabel">Order to Warehouse</h4>
                </div>
                <form id="form_order_warehouse" action="{{ route('warehouseorders.store') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Market</label>
                                    <select name="market_id" class="form-control">
                                        <option value="">Select Market</option>
                                        @foreach ($markets as $market)
                                            <option value="{{ $market->id }}">{{ $market->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Warehouse</label>
                                    <select name="warehouse_id" class="form-control">
                                        @foreach ($warehouses_user as $warehouse_user)
                                            <option value="{{ $warehouse_user->warehouse->id }}">{{ $warehouse_user->warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>


<script>

$('.order').click(function() {
    $('#form_order_warehouse input[name="order_id"]').remove();
    //$('#form_order_warehouse').append("<input type='hidden' name='order_id' value="+ $(this).data('order') + " />")
})
</script>