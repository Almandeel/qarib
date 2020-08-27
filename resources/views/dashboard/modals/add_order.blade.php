    <!-- Modal -->
    <div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addOrderModalLabel">Add Order</h4>
                </div>
                <div class="add-order">
                    <form id="form_add_orders" action="{{ route('orders.store') }}" method="post">
                        @csrf 
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" class="form-control" name="customer" placeholder="Customer Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Customer Phone</label>
                                        <input type="number" class="form-control" name="phone" placeholder="Customer Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Customer Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Customer Address" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Receiver Name</label>
                                        <input type="text" class="form-control" name="receiver" placeholder="Receiver Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Receiver Phone</label>
                                        <input type="number" class="form-control" name="receiver_phone" placeholder="Receiver Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Receiver Address</label>
                                        <input type="text" class="form-control" name="receiver_address" placeholder="Receiver Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Order Amount</label>
                                <input type="number" class="form-control" name="amount" placeholder="Order Amount" required>
                            </div>
                            <div class="form-group">
                                <label>Payment status</label>
                                <select name="payment_status" class="form-control" required>
                                    <option value="">Payment status</option>
                                    <option value="1">Pay</option>
                                    <option value="0">Non Pay</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Delivery amount</label>
                                <input type="number" class="form-control" name="delivery_amount" placeholder="Delivery amount" required>
                            </div>
                            <div class="form-group">
                                <label>Order Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Order Description" required>
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
        $('#addOrderModal #form_add_orders input[name="warehouse_id"]').remove();
        $('#addOrderModal #form_add_orders').append(`<input type="hidden" name="warehouse_id" value="${$(this).data('warehouse_id')}">`)
    });
    
    // function getOrders(warehouse_id) {
    //     alert(warehouse_id);
    // }
    
    // function getOrders(warehouse_id) {
    //     $.ajax({
    //         url: "{{ route('get.orders') }}"  + '?warehouse_id=' + warehouse_id,
    //         dataType: 'json'
    //     }).done(function(orders) {
    //         $('#allOrders').html('');
    //         orders.forEach(order => {
    //             $('#allOrders').append(`<option value="${order.order_id}"> Order ID :  ${order.order_id} </option>`)
    //         });
    //     });
    // }
    

    // getOrders($('#warehouse').val());
</script>