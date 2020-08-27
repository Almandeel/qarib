    <!-- Modal -->
    <div class="modal fade" id="showOrderModal" tabindex="-1" role="dialog" aria-labelledby="showOrderModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="showOrderModalLabel">Show Order</h4>
                </div>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Order ID</th>
                        <td id="id"></td>
                    </tr>
                    <tr>
                        <th>Customer</th>
                        <td id="customer"></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td id="phone"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="address"></td>
                    </tr>
                    <tr>
                        <th>Receiver</th>
                        <td id="receiver"></td>
                    </tr>
                    <tr>
                        <th>Receiver Phone</th>
                        <td id="receiver_phone"></td>
                    </tr>
                    <tr>
                        <th>Receiver Address</th>
                        <td id="receiver_address"></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td id="amount"></td>
                    </tr>
                    <tr>
                        <th>Pyment Status</th>
                        <td id="pyment"></td>
                    </tr>
                    <tr>
                        <th>Delivery amount</th>
                        <td id="delivery_amount"></td>
                    </tr>
                    <tr>
                        <th>Market</th>
                        <td id="market"></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td id="description"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <script>
        $('.show-order').click(function () {
            $('#id').text($(this).data('id'))
            $('#customer').text($(this).data('customer'))
            $('#phone').text($(this).data('phone'))
            $('#amount').text($(this).data('amount'))
            $('#pyment').text($(this).data('pyment') ? 'Pay' : 'Non pay')
            $('#market').text($(this).data('market'))
            $('#address').text($(this).data('address'))
            $('#receiver_address').text($(this).data('receiver_address'))
            $('#receiver_phone').text($(this).data('receiver_phone'))
            $('#receiver').text($(this).data('receiver'))
            $('#description').text($(this).data('description'))
            $('#delivery_amount').text($(this).data('delivery_amount'))
        })
    </script>