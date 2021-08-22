<!doctype html>
<html>

<head>
    <title>Checkout Demo</title>
    <meta name="viewport" content="width=device-width" />
    <title>Checkout Demo</title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
    <script src="https://www.paynimo.com/paynimocheckout/client/lib/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="javascript" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/forge/0.8.2/forge.all.min.js"></script>
</head>

<body>
<script>
    function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
var value = readCookie('user_id');
    var email = readCookie('email');
    var mobile_no = readCookie('mobile_no');
    console.log(value)
    console.log(email)
    console.log(mobile_no)
    rand = Math.floor(Math.random()*90000) + 10000;
    console.log(rand)
</script>
<div class="text-center p-4">
   <span class="mr-4"> Click here... </span> <button class="btn btn-primary" id="btnSubmit" >Make a Payment</button>
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
//L647563|11116666|15||c123|9999999999|test@test.com||||||||||7012066604TKBGHA

            $(document).off('click', '#btnSubmit').on('click', '#btnSubmit', function(e) {
                e.preventDefault();

                var plainText = 'L647563|'+rand+'|15||c123|'+mobile_no+'|'+email+'||||||||||7012066604TKBGHA';
                    var md = forge.md.sha256.create();  
                    md.start();  
                    md.update(plainText, "utf8");  
                    var hashText = md.digest().toHex();  
                    console.log("hash",hashText)

                var configJson = {
                    'tarCall': false,
                    'features': {
                        'showPGResponseMsg': true,
                        'enableExpressPay': true,
                        'enableNewWindowFlow': true,   //for hybrid applications please disable this by passing false
                        'payDetailsAtMerchantEnd':false
                    },
                    'consumerData': {
                        'deviceId': 'WEBSH1',	//possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
                        'token': hashText,
                        'returnUrl': 'http://budca.in/erp/links/public/api/renewalpayments?user_id='+value,
                        'responseHandler': handleResponse,
                        'paymentMode': 'all',
                        'merchantLogoUrl': 'https://www.paynimo.com/CompanyDocs/company-logo-md.png',  //provided merchant logo will be displayed
                        'merchantId': 'L647563',
                        'currency': 'INR',
                        'consumerId': 'c123',
                        'consumerMobileNo': mobile_no,
                        'consumerEmailId': email,
                        'txnId': rand,   //Unique merchant transaction ID
                        'items': [{
                            'itemId': 'FIRST',
                            'amount': '15',
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
