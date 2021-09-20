@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

     <!--Page Title-->
    <section class="page-title" style="background-image:url(https://via.placeholder.com/1920x400)">
        <div class="auto-container">
            <h1>Checkout</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

     <!--CheckOut Page-->
    <section class="checkout-page">
        <form class="form" method="POST" action="{{route('cart.order')}}">
          @csrf
        <div class="auto-container">
            <!--Default Links-->
            <!-- <div class="default-links">
                <div class="message-box with-icon info"><div class="icon-box"><span class="icon fa fa-info"></span></div> Have a coupon? <a href="#">Click here to enter your code</a></div>
            </div> -->
            
            <!--Checkout Details-->
            <div class="checkout-form">
                <form method="post" action="checkout.html">
                    <div class="row clearfix">
                        <!--Column-->
                        <div class="column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title">
                                    <h3>Billing details</h3>
                                    <p>Please register in order to checkout more quickly</p>
                                </div>

                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">First name <sup>*</sup></div>
                                    <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="">
                                     @error('first_name')
                                                <span class='text-danger'>{{$message}}</span>
                                     @enderror
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Last name <sup>*</sup></div>
                                    <input type="text" name="last_name" value="{{old('lat_name')}}" placeholder="">
                                    @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                     @enderror
                                </div>
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Phone <sup>*</sup></div>
                                    <input type="text" name="phone" maxlenght="10" value="{{old('phone')}}" placeholder="">
                                     @error('phone')
                                                <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Email Address <sup>*</sup></div>
                                    <input type="email" name="email" value="{{old('email')}}" placeholder="">
                                     @error('email')
                                                <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <!--Form Group-->
                               <!--  <div class="form-group">
                                    <div class="field-label">Company name (optional)</div>
                                    <input type="text" name="field-name" value="" placeholder="">
                                </div> -->
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Country <sup>*</sup></div>
                                    <select name="country" class="select2 sortby-select" autocomplete="country">
                                        <option value="">Select a country&hellip;</option>
                                        <option value="AX" >&#197;land Islands</option>
                                        <option value="AF" >Afghanistan</option>
                                        <option value="AL" >Albania</option>
                                        <option value="DZ" >Algeria</option>
                                        <option value="AS" >American Samoa</option>
                                        <option value="AD" >Andorra</option>
                                        <option value="AO" >Angola</option>
                                        <option value="AI" >Anguilla</option>
                                        <option value="AQ" >Antarctica</option>
                                        <option value="AG" >Antigua and Barbuda</option>
                                        <option value="AR" >Argentina</option>
                                        <option value="AM" >Armenia</option>
                                        <option value="AW" >Aruba</option>
                                        <option value="AU" >Australia</option>
                                        <option value="AT" >Austria</option>
                                        <option value="AZ" >Azerbaijan</option>
                                        <option value="BS" >Bahamas</option>
                                        <option value="BH" >Bahrain</option>
                                        <option value="BD" >Bangladesh</option>
                                        <option value="BB" >Barbados</option>
                                        <option value="BY" >Belarus</option>
                                        <option value="PW" >Belau</option>
                                        <option value="BE" >Belgium</option>
                                        <option value="BZ" >Belize</option>
                                        <option value="BJ" >Benin</option>
                                        <option value="BM" >Bermuda</option>
                                        <option value="BT" >Bhutan</option>
                                        <option value="BO" >Bolivia</option>
                                        <option value="BQ" >Bonaire, Saint Eustatius and Saba</option>
                                        <option value="BA" >Bosnia and Herzegovina</option>
                                        <option value="BW" >Botswana</option>
                                        <option value="BV" >Bouvet Island</option>
                                        <option value="BR" >Brazil</option>
                                        <option value="IO" >British Indian Ocean Territory</option>
                                        <option value="VG" >British Virgin Islands</option>
                                        <option value="BN" >Brunei</option>
                                        <option value="BG" >Bulgaria</option>
                                        <option value="BF" >Burkina Faso</option>
                                        <option value="BI" >Burundi</option>
                                        <option value="KH" >Cambodia</option>
                                        <option value="CM" >Cameroon</option>
                                        <option value="CA" >Canada</option>
                                        <option value="CV" >Cape Verde</option>
                                        <option value="KY" >Cayman Islands</option>
                                        <option value="CF" >Central African Republic</option>
                                        <option value="TD" >Chad</option>
                                        <option value="CL" >Chile</option>
                                        <option value="CN" >China</option>
                                        <option value="CX" >Christmas Island</option>
                                        <option value="CC" >Cocos (Keeling) Islands</option>
                                        <option value="CO" >Colombia</option>
                                        <option value="KM" >Comoros</option>
                                        <option value="CG" >Congo (Brazzaville)</option>
                                        <option value="CD" >Congo (Kinshasa)</option>
                                        <option value="CK" >Cook Islands</option>
                                        <option value="CR" >Costa Rica</option>
                                        <option value="HR" >Croatia</option>
                                        <option value="CU" >Cuba</option>
                                        <option value="CW" >Cura&ccedil;ao</option>
                                        <option value="CY" >Cyprus</option>
                                        <option value="CZ" >Czech Republic</option>
                                        <option value="DK" >Denmark</option>
                                        <option value="DJ" >Djibouti</option>
                                        <option value="DM" >Dominica</option>
                                        <option value="DO" >Dominican Republic</option>
                                        <option value="EC" >Ecuador</option>
                                        <option value="EG" >Egypt</option>
                                        <option value="SV" >El Salvador</option>
                                        <option value="GQ" >Equatorial Guinea</option>
                                        <option value="ER" >Eritrea</option>
                                        <option value="EE" >Estonia</option>
                                        <option value="ET" >Ethiopia</option>
                                        <option value="FK" >Falkland Islands</option>
                                        <option value="FO" >Faroe Islands</option>
                                        <option value="FJ" >Fiji</option>
                                        <option value="FI" >Finland</option>
                                        <option value="FR" >France</option>
                                        <option value="GF" >French Guiana</option>
                                        <option value="PF" >French Polynesia</option>
                                        <option value="TF" >French Southern Territories</option>
                                        <option value="GA" >Gabon</option>
                                        <option value="GM" >Gambia</option>
                                        <option value="GE" >Georgia</option>
                                        <option value="DE" >Germany</option>
                                        <option value="GH" >Ghana</option>
                                        <option value="GI" >Gibraltar</option>
                                        <option value="GR" >Greece</option>
                                        <option value="GL" >Greenland</option>
                                        <option value="GD" >Grenada</option>
                                        <option value="GP" >Guadeloupe</option>
                                        <option value="GU" >Guam</option>
                                        <option value="GT" >Guatemala</option>
                                        <option value="GG" >Guernsey</option>
                                        <option value="GN" >Guinea</option>
                                        <option value="GW" >Guinea-Bissau</option>
                                        <option value="GY" >Guyana</option>
                                        <option value="HT" >Haiti</option>
                                        <option value="HM" >Heard Island and McDonald Islands</option>
                                        <option value="HN" >Honduras</option>
                                        <option value="HK" >Hong Kong</option>
                                        <option value="HU" >Hungary</option>
                                        <option value="IS" >Iceland</option>
                                        <option value="IN"  selected='selected'>India</option>
                                        <option value="ID" >Indonesia</option>
                                        <option value="IR" >Iran</option>
                                        <option value="IQ" >Iraq</option>
                                        <option value="IE" >Ireland</option>
                                        <option value="IM" >Isle of Man</option>
                                        <option value="IL" >Israel</option>
                                        <option value="IT" >Italy</option>
                                        <option value="CI" >Ivory Coast</option>
                                        <option value="JM" >Jamaica</option>
                                        <option value="JP" >Japan</option>
                                        <option value="JE" >Jersey</option>
                                        <option value="JO" >Jordan</option>
                                        <option value="KZ" >Kazakhstan</option>
                                        <option value="KE" >Kenya</option>
                                        <option value="KI" >Kiribati</option>
                                        <option value="KW" >Kuwait</option>
                                        <option value="KG" >Kyrgyzstan</option>
                                        <option value="LA" >Laos</option>
                                        <option value="LV" >Latvia</option>
                                        <option value="LB" >Lebanon</option>
                                        <option value="LS" >Lesotho</option>
                                        <option value="LR" >Liberia</option>
                                        <option value="LY" >Libya</option>
                                        <option value="LI" >Liechtenstein</option>
                                        <option value="LT" >Lithuania</option>
                                        <option value="LU" >Luxembourg</option>
                                        <option value="MO" >Macao S.A.R., China</option>
                                        <option value="MK" >Macedonia</option>
                                        <option value="MG" >Madagascar</option>
                                        <option value="MW" >Malawi</option>
                                        <option value="MY" >Malaysia</option>
                                        <option value="MV" >Maldives</option>
                                        <option value="ML" >Mali</option>
                                        <option value="MT" >Malta</option>
                                        <option value="MH" >Marshall Islands</option>
                                        <option value="MQ" >Martinique</option>
                                        <option value="MR" >Mauritania</option>
                                        <option value="MU" >Mauritius</option>
                                        <option value="YT" >Mayotte</option>
                                        <option value="MX" >Mexico</option>
                                        <option value="FM" >Micronesia</option>
                                        <option value="MD" >Moldova</option>
                                        <option value="MC" >Monaco</option>
                                        <option value="MN" >Mongolia</option>
                                        <option value="ME" >Montenegro</option>
                                        <option value="MS" >Montserrat</option>
                                        <option value="MA" >Morocco</option>
                                        <option value="MZ" >Mozambique</option>
                                        <option value="MM" >Myanmar</option>
                                        <option value="NA" >Namibia</option>
                                        <option value="NR" >Nauru</option>
                                        <option value="NP" >Nepal</option>
                                        <option value="NL" >Netherlands</option>
                                        <option value="NC" >New Caledonia</option>
                                        <option value="NZ" >New Zealand</option>
                                        <option value="NI" >Nicaragua</option>
                                        <option value="NE" >Niger</option>
                                        <option value="NG" >Nigeria</option>
                                        <option value="NU" >Niue</option>
                                        <option value="NF" >Norfolk Island</option>
                                        <option value="KP" >North Korea</option>
                                        <option value="MP" >Northern Mariana Islands</option>
                                        <option value="NO" >Norway</option>
                                        <option value="OM" >Oman</option>
                                        <option value="PK" >Pakistan</option>
                                        <option value="PS" >Palestinian Territory</option>
                                        <option value="PA" >Panama</option>
                                        <option value="PG" >Papua New Guinea</option>
                                        <option value="PY" >Paraguay</option>
                                        <option value="PE" >Peru</option>
                                        <option value="PH" >Philippines</option>
                                        <option value="PN" >Pitcairn</option>
                                        <option value="PL" >Poland</option>
                                        <option value="PT" >Portugal</option>
                                        <option value="PR" >Puerto Rico</option>
                                        <option value="QA" >Qatar</option>
                                        <option value="RE" >Reunion</option>
                                        <option value="RO" >Romania</option>
                                        <option value="RU" >Russia</option>
                                        <option value="RW" >Rwanda</option>
                                        <option value="ST" >S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                                        <option value="BL" >Saint Barth&eacute;lemy</option>
                                        <option value="SH" >Saint Helena</option>
                                        <option value="KN" >Saint Kitts and Nevis</option>
                                        <option value="LC" >Saint Lucia</option>
                                        <option value="SX" >Saint Martin (Dutch part)</option>
                                        <option value="MF" >Saint Martin (French part)</option>
                                        <option value="PM" >Saint Pierre and Miquelon</option>
                                        <option value="VC" >Saint Vincent and the Grenadines</option>
                                        <option value="WS" >Samoa</option>
                                        <option value="SM" >San Marino</option>
                                        <option value="SA" >Saudi Arabia</option>
                                        <option value="SN" >Senegal</option>
                                        <option value="RS" >Serbia</option>
                                        <option value="SC" >Seychelles</option>
                                        <option value="SL" >Sierra Leone</option>
                                        <option value="SG" >Singapore</option>
                                        <option value="SK" >Slovakia</option>
                                        <option value="SI" >Slovenia</option>
                                        <option value="SB" >Solomon Islands</option>
                                        <option value="SO" >Somalia</option>
                                        <option value="ZA" >South Africa</option>
                                        <option value="GS" >South Georgia/Sandwich Islands</option>
                                        <option value="KR" >South Korea</option>
                                        <option value="SS" >South Sudan</option>
                                        <option value="ES" >Spain</option>
                                        <option value="LK" >Sri Lanka</option>
                                        <option value="SD" >Sudan</option>
                                        <option value="SR" >Suriname</option>
                                        <option value="SJ" >Svalbard and Jan Mayen</option>
                                        <option value="SZ" >Swaziland</option>
                                        <option value="SE" >Sweden</option>
                                        <option value="CH" >Switzerland</option>
                                        <option value="SY" >Syria</option>
                                        <option value="TW" >Taiwan</option>
                                        <option value="TJ" >Tajikistan</option>
                                        <option value="TZ" >Tanzania</option>
                                        <option value="TH" >Thailand</option>
                                        <option value="TL" >Timor-Leste</option>
                                        <option value="TG" >Togo</option>
                                        <option value="TK" >Tokelau</option>
                                        <option value="TO" >Tonga</option>
                                        <option value="TT" >Trinidad and Tobago</option>
                                        <option value="TN" >Tunisia</option>
                                        <option value="TR" >Turkey</option>
                                        <option value="TM" >Turkmenistan</option>
                                        <option value="TC" >Turks and Caicos Islands</option>
                                        <option value="TV" >Tuvalu</option>
                                        <option value="UG" >Uganda</option>
                                        <option value="UA" >Ukraine</option>
                                        <option value="AE" >United Arab Emirates</option>
                                        <option value="GB" >United Kingdom (UK)</option>
                                        <option value="US" >United States (US)</option>
                                        <option value="UM" >United States (US) Minor Outlying Islands</option>
                                        <option value="VI" >United States (US) Virgin Islands</option>
                                        <option value="UY" >Uruguay</option>
                                        <option value="UZ" >Uzbekistan</option>
                                        <option value="VU" >Vanuatu</option>
                                        <option value="VA" >Vatican</option>
                                        <option value="VE" >Venezuela</option>
                                        <option value="VN" >Vietnam</option>
                                        <option value="WF" >Wallis and Futuna</option>
                                        <option value="EH" >Western Sahara</option>
                                        <option value="YE" >Yemen</option>
                                        <option value="ZM" >Zambia</option><option value="ZW" >Zimbabwe</option>
                                    </select>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Street address <sup>*</sup></div>
                                    <input type="text" name="address1" value="{{old('address1')}}" placeholder="House number and street name">
                                    @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="address2" value="{{old('address2')}}" placeholder="Apartment,suite,unit etc. (optional)">
                                </div>
                                
                                <!--Form Group-->
                              <!--   <div class="form-group">
                                    <div class="field-label">Town / City <sup>*</sup></div>
                                    <input type="text" name="field-name" value="" placeholder="" required="">
                                </div>
                                 -->
                                <!--Form Group-->
                              <!--   <div class="form-group">
                                    <div class="field-label">State / County <sup>*</sup></div>
                                    <input type="text" name="field-name" value="" placeholder="" required="">
                                </div> -->
                                
                                <!--Form Group-->
                                <div class="form-group">
                                    <div class="field-label">Postcode/ ZIP <sup>*</sup></div>
                                    <input type="text" name="post_code" value="{{old('post_code')}}" placeholder="">
                                    @error('post_code')
                                                <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title">
                                    <h3>Additional information</h3>
                                </div>
                            
                                <!--Form Group-->
                                <div class="form-group ">
                                    <div class="field-label">Order notes (optional)</div>
                                    <textarea name="message" placeholder="Notes about your order,e.g. special notes for delivery." >{{old('notes')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Checkout Details-->
            
            <!--Order Box-->
            <div class="order-box">
                <table>
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(Helper::getAllProductFromCart())
                                    @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                        <tr class="cart-item">
                            <td class="product-name">{{$cart->product['title']}}&nbsp;
                                <strong class="product-quantity">× {{$cart->quantity}}</strong>
                            </td> 
                            <td class="product-total">
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{number_format($cart['price'],2)}}</span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td><span class="amount">${{number_format(Helper::totalCartPrice(),2)}}</span></td>
                        </tr>
                         @php
                            $total_amount=Helper::totalCartPrice();
                                if(session('coupon')){
                                    $total_amount=$total_amount-session('coupon')['value'];
                                    }
                         @endphp
                        <tr class="order-total">
                            <th>Total</th>
                            <td><strong class="amount">${{number_format($total_amount,2)}}</strong> </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!--End Order Box-->
            
            <!--Payment Box-->
            <div class="payment-box">
                <div class="upper-box">
                    <!--Payment Options-->
                   <div class="payment-options">
                        <ul>
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment_method" value="banktransfer" id="payment-2" checked="">
                                    <label for="payment-2"><strong>Direct Bank Transfer</strong><span class="small-text">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</span></label>
                                </div>
                            </li>
                          
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment_method" value="cod" id="payment-3">
                                    <label for="payment-3"><strong>Cash on Delivery</strong><span class="small-text">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</span></label>
                                </div>
                            </li>
                        </ul>
                        <div class="text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy.</a></div>
                    </div>
                </div>
                <div class="lower-box">
                    <a href="#" class="theme-btn"> <button type="submit" class="btn">Proceed to checkout</button></a>
                </div>
            </div>
            <!--End Payment Box-->
        </div>
        </form>
    </section>
    <!--End CheckOut Page-->
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush