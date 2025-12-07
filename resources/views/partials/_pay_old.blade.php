@section('stylesheets')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

<div class="container">
    <div class="row">
        <div class="col-lg-6 contact-form3 bg-light h-100">
            <div class="contact-image bg-light">
                <!-- envelope icon-->
                <i class="fas fa-book bg-light"></i>
            </div>
            <h5 class="text-center mt-3">{{ count($orders) }} Orders</h5>

            <p class="text-center" style="margin-top: -20px; padding-top: 0;">We will contact you ASAP!</p>
            <!-- Form Starts -->
            <div id="contact_form">
                <div class="form-group">
                    <form method="POST" action="{{ route('payment.post', 1) }}" class="card-form mt-3 mb-3">
                        @csrf
                        <input type="hidden" name="payment_method" class="payment-method">
                        <input class="StripeElement mb-3 form-control" name="card_holder_name" placeholder="Card holder name" required>
                        <div id="card-element"></div>
                        <div id="card-errors" role="alert"></div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary pay">
                                Purchase
                            </button>
                        </div>
                        <h5>Total: <span id="total">{{ number_format($total, 2) }}</span> AED</h5>
                        <img src="/img/cc.png" style="padding-bottom: 25px">
                    </form>

                    @if(session('message'))
                    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
            <!-- /contact-form-->
        </div>


        <div class="col-lg-6 contact-form3 bg-light h-100">
            <div class="contact-image bg-light">
                <!-- envelope icon-->
                <br>
                <i class="fas">{{ count($orders) }} Orders</i>
            </div>
            @foreach($orders as $order)
            
            @php    
                $service = \App\Models\Service::find($order->service_id);
            @endphp
            <h5 class="text-center mt-3">Service: {{ $service->name }}</h5>

            <div class="row">
                <div class="col-lg-4">
                    Pet Name:
                </div>
                @php
                    $pet = \App\Models\Pet::find($order->pet_id);
                @endphp
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $pet->name }}" disabled>
                </div>

                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Service Date:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->from_date }}" disabled>
                </div>

                @if($order->to_date)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    To Date:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->to_date }}" disabled>
                </div>
                @endif

                @if($order->from_time)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Service Time:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->from_time }}" disabled>
                </div>
                @endif

                @if($order->to_time)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    To Time:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->to_time }}" disabled>
                </div>
                @endif
                
                @if($order->trip_type)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Trip Type:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->trip_type }}" disabled>
                </div>
                @endif
                
                @if($order->pick_up_location)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Pick Up Location:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->pick_up_location }}" disabled>
                </div>
                @endif
                
                @if($order->drop_off_location)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Drop Off Location:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->drop_off_location }}" disabled>
                </div>
                @endif

                
                @if($order->training_type)
                @php $t = \App\Models\Selection::find($order->training_type); @endphp
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Training Type:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $t->name }}" disabled>
                </div>
                @endif
                
                @if($order->grooming_type)
                @php $g = \App\Models\Selection::find($order->grooming_type); @endphp
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Grooming Type:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $g->name }}" disabled>
                </div>
                @endif

                @if($order->grooming_additional)
                <div class="col-lg-12"><hr></div>
                
                <div class="col-lg-4">
                    Grooming Additional:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->grooming_type }}" disabled>
                </div>
                @endif

                
                @if($order->pet_issue)
                <div class="col-lg-12"><hr></div>

                <div class="col-lg-4">
                    Pet Issue:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->pet_issue }}" disabled>
                </div>
                @endif

                
                @if($order->notes)
                <div class="col-lg-12"><hr></div>
                
                <div class="col-lg-4">
                    Notes:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->notes }}" disabled>
                </div>
                @endif
                
                <div class="col-lg-12"><hr></div>
                
                <div class="col-lg-4">
                    Service Price:
                </div>
                <div class="col-lg-8">
                    <input class="form-control" value="{{ $order->price }}" disabled>
                </div>

                <a class="btn btn-danger" href="{{ route('pages.remove_service', $order->id) }}" 
                style="padding: 5px; font-size: 12px"><i class="fas fa-trash"></i> Remove Service</a>
            </div>
            <br><br>
            @endforeach
        </div>
    </div>
</div>

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe("{{ env('STRIPE_KEY') }}")
    let elements = stripe.elements()
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {
        style: style
    })
    card.mount('#card-element')
    let paymentMethod = null
    $('.card-form').on('submit', function(e) {
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}", {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: $('.card_holder_name').val()
                    }
                }
            }
        ).then(function(result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('button.pay').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
            }
        })
        return false
    })
</script>
@endsection