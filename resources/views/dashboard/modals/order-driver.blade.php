    <!-- Modal -->
    <div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="OrderModalLabel">Add Order</h4>
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
                                <label>Warehouse</label>
                                <select id="warehouse" onchange="getOrders(this.value)" name="warehouseorder_id" class="form-control">
                                    @foreach ($user_warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Orders</label>
                                <select id="allOrders" name="order_id" class="form-control">
                                    
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
    });
    
    function getOrders(warehouse_id) {
        alert(warehouse_id);
    }
    
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
    

    getOrders($('#warehouse').val());
</script>