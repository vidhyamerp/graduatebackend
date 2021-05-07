<!doctype html>
<html>

<head>
    <title>Checkout Demo</title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
    <script src="https://www.paynimo.com/paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="javascript" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
</head>

<body>
<div class="text-center p-4">
    <button class="btn btn-primary" id="btnSubmit" >Make a Payment</button>
</div>
    <script type="text/javascript" src="https://www.paynimo.com/paynimocheckout/server/lib/checkout.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            function handleResponse(res) {
                if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
                    // success block
                } else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
                    // initiated block
                } else {
                    // error block
                }
            };

            $(document).off('click', '#btnSubmit').on('click', '#btnSubmit', function(e) {
                e.preventDefault();

                var configJson = {
                    'tarCall': false,
                    'features': {
                        'showPGResponseMsg': true,
                        'enableAbortResponse': true,
                        'enableExpressPay': true,
                        'enableNewWindowFlow': true    //for hybrid applications please disable this by passing false
                    },
                    'consumerData': {
                        'deviceId': 'WEBSH2',	//possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
                        'token': '6ee363fc850b38e5c885d2953a1cbddc99982b2a03c8db04c528cab6bf8e999551a7f676e146cdf717b47866e4530dc48995b0861a0c7206c8e2404024ed05e2',
                        'returnUrl': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',    //merchant response page URL
                        'responseHandler': handleResponse,
                        'paymentMode': 'all',
                        'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                        'merchantId': 'L3348',
                        'currency': 'INR',
                        'consumerId': 'c964634',
                        'consumerMobileNo': '9876543210',
                        'consumerEmailId': 'test@test.com',
                        'txnId': '1481197581115',   //Unique merchant transaction ID
                        'items': [{
                            'itemId': 'test',
                            'amount': '10',
                            'comAmt': '0'
                        }],
                        'customStyle': {
                            'PRIMARY_COLOR_CODE': '#3977b7',   //merchant primary color code
                            'SECONDARY_COLOR_CODE': '#FFFFFF',   //provide merchant's suitable color code
                            'BUTTON_COLOR_CODE_1': '#1969bb',   //merchant's button background color code
                            'BUTTON_COLOR_CODE_2': '#FFFFFF'   //provide merchant's suitable color code for button text
                        }
                    }
                };

                $.pnCheckout(configJson);
                if(configJson.features.enableNewWindowFlow){
                    pnCheckoutShared.openNewWindow();
                }
            });
        });
    </script>
</body>

</html>