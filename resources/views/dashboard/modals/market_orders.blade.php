    <!-- Modal -->
    <div class="modal fade" id="marketOrderModal" tabindex="-1" role="dialog" aria-labelledby="marketOrderModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="marketOrderModalLabel">اضافة طلب</h4>
                </div>
                <div class="add-order">
                    <form id="form_add_orders" action="{{ route('market.orderstore') }}" method="post">
                        @csrf 
                        <div class="modal-body">
                            <div class="orders">
                                <div class="location">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>من</label>
                                                <select id="from" onchange="deleivery_amount()" name="from" class="form-control" required>
                                                    <option value="">المدينة </option>
                                                    <option value="1">الخرطوم</option>
                                                    <option value="2">امدرمان</option>
                                                    <option value="3">بحري</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الى</label>
                                                <select id="to" name="to" onchange="deleivery_amount()" class="form-control" required>
                                                    <option value="">المدينة </option>
                                                    <option value="1">الخرطوم</option>
                                                    <option value="2">امدرمان</option>
                                                    <option value="3">بحري</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>قيمة الطلب </label>
                                    <input type="number" class="form-control" name="amount" placeholder="قيمة الطلب " required>
                                </div>
                                <div class="form-group">
                                    <label>حالة دفع القيمة </label>
                                    <select name="payment_status" class="form-control" required>
                                        <option value="">الحالة </option>
                                        <option value="1">تم دفع القيمة</option>
                                        <option value="0">لم يتم الدفع </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>تفاصيل الطلب</label>
                                    <input type="text" class="form-control" name="description" placeholder="تفاصيل الطلب " required>
                                </div>
                                <div class="form-group">
                                    <label>قيمة التوصيل </label>
                                    <input readonly type="text" id="delivery_amount" class="form-control" name="delivery_amount" placeholder="قيمة التوصيل " value="0" required>
                                </div>
                            </div>

                            <div class="address ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رقم هاتف العميل </label>
                                            <input type="number" value="{{ auth()->user()->phone }}" class="form-control" name="phone" placeholder="رقم هاتف العميل " required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> عنوان الاستلام</label>
                                            <input type="text" value="{{ auth()->user()->address }}" class="form-control" name="address" placeholder=" عنوان الاستلام " required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رقم هاتف المستلم </label>
                                            <input type="number" class="form-control" name="receiver_phone" placeholder="رقم هاتف المستلم " required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>عنوان التسليم </label>
                                            <input type="text" class="form-control" name="receiver_address" placeholder="عنوان التسليم" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>اسم العميل </label>
                                    <input type="text" class="form-control" name="customer" placeholder="اسم العميل " required>
                                </div>
                            </div> --}}
                            
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>اسم المستلم </label>
                                    <input type="text" class="form-control" name="receiver" placeholder="اسم المستلم " required>
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary next">التالى</button>
                            <button type="button" class="btn btn-primary priv ">السابق</button>
                            <button type="submit" class="btn btn-success submit ">حفظ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script>
    $('.next').click(function () {
        $('.orders').fadeOut()
        $('.address').fadeIn()
        // buttons
        $('.submit').fadeIn();
        $('.priv').fadeIn();
        $('.next').fadeOut();
    });

    $('.priv').click(function () {
        $('.address').fadeOut()
        $('.orders').fadeIn()

        // buttons
        $('.submit').fadeOut();
        $('.priv').fadeOut();
        $('.next').fadeIn();
    });


    function deleivery_amount() {
        let from = $('#from').val()
        let to = $('#to').val()

        if(from == to) {
            console.log(200)
            $('input[name="delivery_amount"]').val(200);
        }else {
            console.log(250)
            $('input[name="delivery_amount"]').val(250);
        }
    }

    $(function () {
        $('.address').fadeOut()
        $('.submit').fadeOut();
        $('.priv').fadeOut();
    })
</script>