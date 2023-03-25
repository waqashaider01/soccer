@extends('frontend.layouts.app')
@push('styles')
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 py-5 mx-auto">
                <div class="text-center mb-2" style="border-bottom:1px solid red">
                    <h1>Create Subscription</h1>
                </div>
                {{-- <div class="row">
                    <div class="col-6">
                        <form action="{{ url('create-subscription/'.$price.'/'.$duration_month) }}" method="POST" id="payment-form"
                            data-secret="{{ $intent->client_secret }}">
                            @csrf

                            <h3>Billing Information</h3>

                            <input type="hidden" value="{{ $plan }}" name="plan" id="product-group">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="state">State/Province</label>
                                    <input type="text" name="state" id="state" class="form-control"
                                        placeholder="State" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="zip">Zip/Postal Code</label>
                                    <input type="text" name="zip" id="zip" class="form-control"
                                        placeholder="Zip" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="state">Recurring Amount</label>
                                    <input type="number" name="rec_amount" id="state" class="form-control"
                                        placeholder="Amount" required>
                                </div>

                                <div class="form-group col-6">
                                    <label for="zip">Subscription Plan</label>
                                    <select name="sub_plan" id="country" class="form-control" required>
                                        @if (is_array($durations) || is_object($durations))
                                            @foreach ($durations as $duration)
                                                <option value="{{ $duration }}">{{ $duration }} Month</option>
                                            @endforeach
                                        @else
                                            <option value="{{ $durations }}">{{ $durations }}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="card-element">
                                    <h4> Credit or debit card </h4>
                                </label>
                                <div class="mt-2" id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button type="submit" class="mt-2 btn btn-primary" id="card-button">
                                Subscribe
                            </button>

                            <hr><br>

                            <div class="mt-2">
                                <a href="{{ route('paywithpaypal', $planId) }}" class="btn btn-primary">Pay with Paypal</a>
                            </div>

                        </form>
                    </div>
                    <div class="col-6 text-center">
                        <p class="mb-5">We would like to assist in the best possible way with interviews, news stories and
                            reviews. For Media Enquiry, please <a href="{{ route('contact-us') }}"><span
                                    style="color: red">Contacts US</span></a></p>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <h3 class="panel-title">Payment Details</h3>
                            </div>
                            <div class="panel-body">

                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif

                                <form role="form"
                                    action="{{ url('create-subscription/' . $price . '/' . $duration_month) }}"
                                    method="post" class="require-validation" data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ config('services.stripe.public') }}" id="payment-form">
                                    @csrf

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input class='form-control'
                                                size='4' type='text'>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-control" required>
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="state">State/Province</label>
                                            <input type="text" name="state" id="state" class="form-control"
                                                placeholder="State" required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="zip">Zip/Postal Code</label>
                                            <input type="text" name="zip" id="zip" class="form-control"
                                                placeholder="Zip" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="state">Recurring Amount</label>
                                            <input type="number" name="rec_amount" id="state" class="form-control"
                                                placeholder="Amount" required>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="zip">Subscription Plan</label>
                                            <select name="sub_plan" id="country" class="form-control" required>
                                                @if (is_array($durations) || is_object($durations))
                                                    @foreach ($durations as $duration)
                                                        <option value="{{ $duration }}">{{ $duration }} Month
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option value="{{ $durations }}">{{ $durations }}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group card required'>
                                            <label class='control-label'>Payment Method</label>
                                            <select name="Payment_method" id="Payment_method" class="form-control" required>
                                                <option value="">Select Payment</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="debit_card">Debit Card</option>
                                                <option value="master_card">Master Card</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group card required'>
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' size='20' type='text'>
                                        </div>
                                    </div>
                                    {{-- <input type="hidden" name="amount" value="{{}}"> --}}

                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                                type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                type='text'>
                                        </div>
                                    </div>
                                    <input type="hidden" id="card_no" name="card_no">
                                    <input type="hidden" id="cvc" name="cvc">
                                    <input type="hidden" id="exp_month" name="exp_month">
                                    <input type="hidden" id="exp_year" name="exp_year">

                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay
                                                Now</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {


            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var cardNumber = $('.card-number').val();
            var cardCvc = $('.card-cvc').val();
            var cardExpiryMonth = $('.card-expiry-month').val();
            var cardExpiryYear = $('.card-expiry-year').val();
            $("#card_no").val(cardNumber);
            $("#cvc").val(cardCvc);
            $("#exp_month").val(cardExpiryMonth);
            $("#exp_year").val(cardExpiryYear);

        });
    </script>

    {{-- <script>
        var stripe = Stripe('{{config('services.stripe.pubic')}}');

        var elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
            }
        };

        var card = elements.create("card", {
            style: style
        });
        card.mount("#card-element");

        card.addEventListener('change', ({
            error
        }) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        var cardHolderName = document.getElementById('name');
        var clientSecret = form.dataset.secret;

        form.addEventListener('submit', async function(ev) {
            ev.preventDefault();

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                // Send the token to your server
                stripeTokenHandler(setupIntent);
            }

            // stripe.createToken(card).then(function(result) {
            //     if (result.error) {
            //         // Inform the user if there was an error
            //         var errorElement = document.getElementById('card-errors');
            //         errorElement.textContent = result.error.message;
            //     } else {
            //         // Send the token to your server
            //         stripeTokenHandler(result.token);
            //     }
            // });

        });

        function stripeTokenHandler(setupIntent) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', setupIntent.payment_method);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script> --}}
@endsection
