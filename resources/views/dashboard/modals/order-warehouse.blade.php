    <!-- Modal -->
    <div class="modal fade" id="OrderWarehouseModal" tabindex="-1" role="dialog" aria-labelledby="OrderWarehouseModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="OrderWarehouseModalLabel">Add Order</h4>
                </div>
                <div class="add-order">
                    <form id="form_driver_orders" action="{{ route('driverorders.store') }}" method="post">
                        @csrf 
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Driver</label>
                                <select name="driver_id" class="form-control">
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Orders</label>
                                <select  multiple="multiple" name="order_id[]" class="form-control">
                                    @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">Order ID : {{ $order->order_number }}</option>
                                    @endforeach
                                </select>
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
    </div>


    


<script>
    
    $('.order').click(function() {
        //clear inputs
        $('#form_driver_orders input.hidden').remove()

        var warehouse_id = $(this).data('warehouse');
        var order_id = $(this).data('order');
        $('#form_driver_orders').append(`<input class="hidden" type="hidden" name="warehouseorder_id" value="${warehouse_id}" />`)

        function getOrders(warehouse_id) {
            $.ajax({
                url: "{{ route('get.orders') }}"  + '?warehouse_id=' + warehouse_id,
                dataType: 'json'
            }).done(function(orders) {
                $('#allOrders').html('');
                orders.forEach(order => {
                    $('#allOrders').append(`<option value="${order.order_id}"> Order ID :  ${order.order_id} </option>`)
                });
            });
        }

    });
</script>