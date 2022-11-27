osaveAddress = function() {
    if (typeof(Storage) !== "undefined") {
        if (is_login == 1) {
            return;
        }

        //var card_district = document.getElementById('card-district');
        //var card_ward = document.getElementById('card-ward');
        var shipment_district = document.getElementById('shipment-district');
        var shipment_ward = document.getElementById('shipment-ward');


        //sessionStorage.setItem('card_fullname', document.getElementById('card-fullname').value.trim());
        //sessionStorage.setItem('card_address', document.getElementById('card-address').value.trim());
        sessionStorage.setItem('card_email', document.getElementById('card-email').value.trim());
        //sessionStorage.setItem('card_phone', document.getElementById('card-phone').value.trim());
        //sessionStorage.setItem('card_province', document.getElementById('card-province').value.trim());
        //sessionStorage.setItem('card_district', document.getElementById('card-district').value.trim());
        //sessionStorage.setItem('card_ward', document.getElementById('card-ward').value.trim());
        //sessionStorage.setItem('card_district_source', card_district.innerHTML);
        //sessionStorage.setItem('card_ward_source', card_ward.innerHTML);

        //sessionStorage.setItem('same_billing_info', document.getElementById('same-billing-info').checked);

        sessionStorage.setItem('shipment_name', document.getElementById('shipment-name').value.trim());
        sessionStorage.setItem('shipment_address', document.getElementById('shipment-address').value.trim());
        sessionStorage.setItem('shipment_phone', document.getElementById('shipment-phone').value.trim());
        sessionStorage.setItem('shipment_province', document.getElementById('shipment-province').value.trim());
        sessionStorage.setItem('shipment_district', shipment_district.value.trim());
        sessionStorage.setItem('shipment_ward', document.getElementById('shipment-ward').value.trim());
        sessionStorage.setItem('shipment_district_source', shipment_district.innerHTML);
        sessionStorage.setItem('shipment_ward_source', shipment_ward.innerHTML);
    }
};

loadAddress = function() {
    if (typeof(Storage) !== "undefined") {
        if (is_login == 1) {
            return;
        }

        //load card info
        /*
        document.getElementById('card-fullname').value = sessionStorage.getItem('card_fullname');
        document.getElementById('card-address').value = sessionStorage.getItem('card_address');
        document.getElementById('card-email').value = sessionStorage.getItem('card_email');
        document.getElementById('card-phone').value = sessionStorage.getItem('card_phone');
        if (sessionStorage.getItem('card_province')) {
            document.getElementById('card-province').value = sessionStorage.getItem('card_province');
        }

        var card_district = document.getElementById('card-district');
        if (sessionStorage.getItem('card_district_source')) {
            card_district.innerHTML  = sessionStorage.getItem('card_district_source');
            card_district.value = "";
            if (sessionStorage.getItem('card_district')) {
                card_district.value = sessionStorage.getItem('card_district');
            }
        }

        var card_ward = document.getElementById('card-ward');
        if (sessionStorage.getItem('card_ward_source')) {
            card_ward.innerHTML = sessionStorage.getItem('card_ward_source');
            card_ward.value = "";
            if (sessionStorage.getItem('card_ward')) {
                card_ward.value = sessionStorage.getItem('card_ward');
            }
        }

        if (sessionStorage.getItem('same_billing_info')) {
            document.getElementById('same-billing-info').checked = true;
        }
        */

        //load shipment info
        document.getElementById('shipment-name').value = sessionStorage.getItem('shipment_name');
        document.getElementById('shipment-address').value = sessionStorage.getItem('shipment_address');
        document.getElementById('card-email').value = sessionStorage.getItem('card_email');
        document.getElementById('shipment-phone').value = sessionStorage.getItem('shipment_phone');
        if (sessionStorage.getItem('shipment_province')) {
            document.getElementById('shipment-province').value = sessionStorage.getItem('shipment_province');
        }


        var shipment_district = document.getElementById('shipment-district');
        if (sessionStorage.getItem('shipment_district_source')) {
            shipment_district.innerHTML = sessionStorage.getItem('shipment_district_source');
            shipment_district.value = "";
            if (sessionStorage.getItem('shipment_district')) {
                shipment_district.value = sessionStorage.getItem('shipment_district');
            }
        }

        var shipment_ward = document.getElementById('shipment-ward');
        if (sessionStorage.getItem('shipment_ward_source')) {
            shipment_ward.innerHTML = sessionStorage.getItem('shipment_ward_source');
            shipment_ward.value = "";
            if (sessionStorage.getItem('shipment_ward')) {
                shipment_ward.value = sessionStorage.getItem('shipment_ward');
            }
        }
    }
};

removeAddress = function() {
    if (typeof(Storage) !== "undefined") {
        /*
        sessionStorage.removeItem('card_fullname');
        sessionStorage.removeItem('card_address');
        sessionStorage.removeItem('card_email');
        sessionStorage.removeItem('card_phone');
        sessionStorage.removeItem('card_province');
        sessionStorage.removeItem('card_district');
        sessionStorage.removeItem('card_ward');
        sessionStorage.removeItem('card_district_source');
        sessionStorage.removeItem('card_ward_source');
        sessionStorage.removeItem('same_billing_info');
        */
        sessionStorage.removeItem('shipment_name');
        sessionStorage.removeItem('shipment_address');
        sessionStorage.removeItem('card_email');
        sessionStorage.removeItem('shipment_phone');
        sessionStorage.removeItem('shipment_province');
        sessionStorage.removeItem('shipment_district');
        sessionStorage.removeItem('shipment_ward');
        sessionStorage.removeItem('shipment_district_source');
        sessionStorage.removeItem('shipment_ward_source');

    }
};

if (is_login == "0") {
    loadAddress();
}

function loadCardDistrict(provinceid) {
    var cardDistrict = document.getElementById('card-district');
    var cardWard = document.getElementById('card-ward');
    cardDistrict.innerHTML = '<option value=""><?php echo $lang_text_select_district_town ?></option>';
    cardWard.innerHTML = '<option value=""><?php echo $lang_text_select_district_town ?></option>';

    if (provinceid != "") {
        showloading('<?php echo $lang_text_pleasewait ?>');

        var formData = new FormData();
        formData.append('provinceid', provinceid);

        xhr("<?php echo HTTP_SERVER?>?route=module/payment/getDistrict", formData, function(res){
            endloading();

            var response = JSON.parse(res);
            if (response['status'] == 'failed') {
                validator.showErrors(response['errors']);
            } else {
                var districts = response['districts'];

                var html = '<option value=""><?php echo $lang_text_select_district_town ?></option>';
                for (var districtid in districts) {
                    if (districts.hasOwnProperty(districtid)) {
                        html += '<option value="' + districtid + '">' + districts[districtid] + '</option>';
                    }
                }
                cardDistrict.innerHTML = html;

                loadCardWard(cardDistrict.value);
            }
        });
    }
}

function loadShipmentDistrict(provinceid) {
    var shipmentDistrict = document.getElementById('shipment-district');
    var shipmentWard = document.getElementById('shipment-ward');
    shipmentDistrict.innerHTML = '<option value=""><?php echo $lang_text_select_district_town ?></option>';
    shipmentWard.innerHTML = '<option value=""><?php echo $lang_text_select_district_town ?></option>';

    if (provinceid != "") {
        showloading('<?php echo $lang_text_pleasewait ?>');

        var formData = new FormData();
        formData.append('provinceid', provinceid);

        xhr("<?php echo HTTP_SERVER?>?route=module/payment/getDistrict", formData, function(res){
            endloading();

            var response = JSON.parse(res);
            if (response['status'] == 'failed') {
                validator.showErrors(response['errors']);

            } else {
                var districts = response['districts'];

                var html = '<option value=""><?php echo $lang_text_select_district_town ?></option>';
                for (var districtid in districts) {
                    if (districts.hasOwnProperty(districtid)) {
                        html += '<option value="' + districtid + '">' + districts[districtid] + '</option>';
                    }
                }
                shipmentDistrict.innerHTML = html;

                loadShipmentWard(shipmentDistrict.value);
            }
        });
    }
}

function loadCardWard(districtid) {
    var cardWard = document.getElementById('card-ward');
    cardWard.innerHTML = '<option value=""><?php echo $lang_text_select_district_town ?></option>';

    if (districtid != "") {
        showloading('<?php echo $lang_text_pleasewait ?>');

        var formData = new FormData();
        formData.append('districtid', districtid);

        xhr("<?php echo HTTP_SERVER?>?route=module/payment/getWard", formData, function(res){
            endloading();

            var response = JSON.parse(res);
            if (response['status'] == 'failed') {
                validator.showErrors(response['errors']);

            } else {

                var html = '<option value=""><?php echo $lang_text_select_ward ?></option>';
                var wards = response['wards'];
                for (var wardid in wards) {
                    if (wards.hasOwnProperty(wardid)) {
                        html += '<option value="' + wardid + '">' + wards[wardid] + '</option>';
                    }
                }

                cardWard.innerHTML = html;
                cardWard.value = "";
            }
        });
    }
}

function loadShipmentWard(districtid) {
    var shipmentWard = document.getElementById('shipment-ward');
    shipmentWard.innerHTML = '<option value=""><?php echo $lang_text_select_district_town ?></option>';

    if (districtid != "") {
        showloading('<?php echo $lang_text_pleasewait ?>');

        var formData = new FormData();
        formData.append('districtid', districtid);

        xhr("<?php echo HTTP_SERVER?>?route=module/payment/getWard", formData, function(res){
            endloading();

            var response = JSON.parse(res);
            if (response['status'] == 'failed') {
                validator.showErrors(response['errors']);

            } else {


                var html = '<option value=""><?php echo $lang_text_select_ward ?></option>';
                var wards = response['wards'];
                for (var wardid in wards) {
                    if (wards.hasOwnProperty(wardid)) {
                        html += '<option value="' + wardid + '">' + wards[wardid] + '</option>';
                    }
                }

                shipmentWard.innerHTML = html;
            }
        });
    }
}

var cardProvince = document.getElementById('card-province');
if (cardProvince) {
    cardProvince.addEventListener('change', (e) => {
        loadCardDistrict(e.target.value);
    });
}

var shipmentProvince = document.getElementById('shipment-province');
if (shipmentProvince) {
    shipmentProvince.addEventListener('change', (e) => {
        loadShipmentDistrict(e.target.value);
    });
}

var cardDistrict = document.getElementById('card-district');
if (cardDistrict) {
    cardDistrict.addEventListener('change', (e) => {
        loadCardWard(e.target.value);
    });
}

var shipmentDistrict = document.getElementById('shipment-district');
if (shipmentDistrict) {
    shipmentDistrict.addEventListener('change', (e) => {
        loadShipmentWard(e.target.value);
    });
}

var softPaymentMethods = document.querySelectorAll('input[name="soft_paymentmethod"]');
softPaymentMethods.forEach(function(softPaymentMethod){
    softPaymentMethod.addEventListener('change', (e) => {
        if (e.target.value == 'bank##P003') {
            animateSlideDown('.bank-checkout-section');
        } else {
            animateSlideUp('.bank-checkout-section');
        }
    });
});

getShippingPrice = function() {
    showloading('<?php echo $lang_text_pleasewait ?>');

    var shipmentDistrict = document.getElementById('shipment-district');
    var districtid = shipmentDistrict.value;

    var couponcodeControl =  document.getElementById('couponcode');
    var couponcode = couponcodeControl.value;

    var formData = new FormData();
    formData.append('districtid', districtid);
    formData.append('couponcode', couponcode);

    xhr("<?php echo HTTP_SERVER?>?route=module/payment/getShippingPrice", formData, function(res){
        endloading();
        var response = JSON.parse(res);

        var optionStandardDelivery = document.getElementById('radio-J001');
        if (response['status'] == 'failed') {
            optionStandardDelivery.setAttribute('price', 'call');
        } else {
            optionStandardDelivery.setAttribute('price', response['price']);
        }

        calcTotalPrice();
    });
};

var orderScrollable = document.querySelector('.order-scrollable');
var orderScrollTable = document.querySelector('.order-scroll-table');
var orderWrapperHeight = orderScrollable.scrollHeight;
var orderContentHeight = orderScrollTable.scrollHeight;
if (orderContentHeight > orderWrapperHeight) {
    var orderScrollTableHeader = document.querySelector('.order-scroll-table-header');
    orderScrollTableHeader.classList.add('has-scroll');

    var totalItems = document.querySelectorAll('.total-item');
    totalItems.forEach(function(item){
        item.classList.add('has-scroll');
    });
}

calcTotalPrice = function() {
    //discount price
    var discountCouponValue = document.getElementById('discount-coupon-value');
    var discount_amount = discountCouponValue.innerHTML.trim();
    var discount_amount_value = 0;
    if (discount_amount.length > 0) {
        discount_amount_value = parseFloat(discount_amount);
    }

    var jSubTotal = document.getElementById('subtotal');
    var subtotal = parseFloat(jSubTotal.value);
    if ((subtotal - discount_amount_value) >= min_freeship_price) {
        var option = document.getElementById('radio-J001');
        option.setAttribute('price', '0');
    }

    var jTotalTax = document.getElementById('totaltax');
    var totaltax = parseFloat(jTotalTax.value);

    //shipprice
    var shipprice = 0;
    var jshipppingprice = document.getElementById('shippingprice');

    var jobcodeChecked = document.querySelector('input[name="jobcode"]:checked');
    var price_text = jobcodeChecked.getAttribute('price');
    if (price_text === 'call') {
        jshipppingprice.innerHTML = '<?php echo $lang_text_call ?>';
    } else {
        shipprice = parseInt(price_text) || 0;
        jshipppingprice.innerHTML = (shipprice).formatMoney() + '<?php echo CURRENCY_CODE ?>';
    }

    var newprice = subtotal + totaltax + shipprice - discount_amount_value;
    var jcarttotal = document.getElementById('carttotal');
    jcarttotal.innerHTML = (newprice).formatMoney();
};

var jobcodes = document.querySelectorAll('input[name="jobcode"]');
jobcodes.forEach(function(item) {
    item.addEventListener('change', function(){
        calcTotalPrice();
    });
});


processPayment = function() {
    if (validatorPaymentForm.valid()) {
        getShippingPrice();

        var checkoutLocation = document.getElementById('checkout-location');
        var checkoutPayment = document.getElementById('checkout-payment');
        checkoutLocation.classList.add('d-none');
        checkoutPayment.classList.remove('d-none');

        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

        if (is_login == "0") {
            saveAddress();
        }

        if (document.getElementById('shipment-province').value != 'P79') {
            var optionFastDelivery = document.getElementById('radio-J002');
            if (optionFastDelivery) {
                optionFastDelivery.parentNode.parentNode.parentNode.removeChild(optionFastDelivery.parentNode.parentNode);
            }
        }
    }
};

goToAddress = function() {
    var checkoutLocation = document.getElementById('checkout-location');
    var checkoutPayment = document.getElementById('checkout-payment');
    checkoutLocation.classList.remove('d-none');
    checkoutPayment.classList.add('d-none');
};


var jcouponcode = document.getElementById('couponcode');
["keyup", "change"].forEach((evt) => {
    jcouponcode.addEventListener(evt, (e) => {
        document.querySelector('.invalid-couponcode').style.display = 'none';

        document.getElementById('coupon-info-sucess').style.display = 'none';
        document.getElementById('lb-couponcode').innerHTML = '';
        document.getElementById('lb-discount-coupon-amount').innerHTML = '';
        document.getElementById('discount-coupon-value').innerHTML = '';

        calcTotalPrice();
    }, false);
});


document.getElementById('btnApplyPromotionCode').addEventListener('click', function() {
    showloading('<?php echo $lang_text_pleasewait ?>');

    var jPaymentForm = document.getElementById("paymentForm");
    var formData = new FormData(jPaymentForm);

    xhr("<?php echo HTTP_SERVER?>?route=module/payment/checkCouponCode", formData, function(res){
        endloading();
        var response = JSON.parse(res);
        var errors = response['errors'];
        if (response['status'] == 'failed') {
            for (var error_code in errors) {
                if (errors.hasOwnProperty(error_code)) {
                    if (error_code == 'couponcode') {
                        document.querySelector('.invalid-couponcode').style.display = 'table-row';
                        document.getElementById('couponcode-error').innerHTML = errors[error_code];

                        document.getElementById('coupon-info-sucess').style.display = 'none';
                        document.getElementById('lb-couponcode').innerHTML = '';
                        document.getElementById('lb-discount-coupon-amount').innerHTML = '';
                        document.getElementById('discount-coupon-value').innerHTML = '';
                    } else {
                        var json = {};
                        json[error_code] = errors[error_code];
                        validator.showErrors(json);
                    }
                }
            }

        } else {
            document.querySelector('.invalid-couponcode').style.display = 'none';
            document.getElementById('coupon-info-sucess').style.display = 'block';


            document.getElementById('lb-couponcode').innerHTML = '<?php echo $lang_text_code ?>:&nbsp;' + response['couponcode'];
            document.getElementById('lb-discount-coupon-amount').innerHTML = "-" + response['discount_coupon_format'];
            document.getElementById('discount-coupon-value').innerHTML = response['discount_coupon'];

            document.getElementById('radio-J001').setAttribute('price', response['shipping_price']);
        }

        calcTotalPrice();
    });
});
