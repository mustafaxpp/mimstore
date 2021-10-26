
<main class="page bg-white">
    <section class="shopping-cart dark">
        <div class="container">
           <div class="block-heading">
             <h2 class="main_color">Your Shopping Cart</h2>
           </div>
           <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            @php
                                $total = 0 ;
                            @endphp
                            @if (session()->get("cart"))
                            @forelse (session()->get("cart") as $product_id =>$qty)
                            @php
                                $product = App\Models\Product::findOrFail($product_id);
                            @endphp

                            <div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{-- <img class="img-fluid mx-auto d-block image" src="assets/img/image.jpg"> --}}
                                        <img class="img-fluid mx-auto d-block image" src="{{ url('storage/' . $product->image) }}" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <a href="#">{{ $product->name }}</a>
                                                        <div class="product-info">
                                                            <div>Quantity: <span class="value">{{ $qty  }}</span></div>
                                                            <div>Peace Price : <span class="value">{{$product->price}}</span></div>
                                                            {{-- <div>Memory: <span class="value">32GB</span></div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Quantity:</label>
                                                    <div class="input-group bootstrap-touchspin">
                                                        <span class="input-group-btn">
                                                            <button wire:click="removeFromCart({{$product->id}})" class="main_bg btn btn-default bootstrap-touchspin-down" type="button">
                                                                -
                                                            </button>
                                                        </span>
                                                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;">
                                                            </span>
                                                            <input type="text" name="" value="{{$qty}}" min="1" max="1000" class="input-qty form-control text-center" style="display: block;">
                                                            <span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;">
                                                            </span>
                                                            <span class="input-group-btn">
                                                                <button wire:click="add({{$product->id}})" class="main_bg btn btn-default bootstrap-touchspin-up" type="button">
                                                                    +
                                                                </button>
                                                            </span>
                                                    </div>

                                                </div>
                                                <div class="col-md-3 price">
                                                    <span>${{$product->price * $qty}}
                                                        @php
                                                            $total = $total +=  $product->price * $qty;
                                                        @endphp
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty

                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Subtotal</span><span class="price">$ {{$total}}</span></div>
                            <div class="summary-item"><span class="text">Discount</span><span class="price">- $30</span></div>
                            <div class="summary-item"><span class="text">Shipping</span><span class="price">$30</span></div>
                            <div class="summary-item"><span class="text">Total</span><span class="price">$ {{$total - 30 + 30  }}</span></div>
                            <button data-toggle="modal" data-target="#staticBackdrop" type="button" class="btn main_bg text-light btn-lg btn-block">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
                {{-- Check out --}}
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body ">
                                <div class="d-flex justify-content-between align-items-center"> <span class="text-uppercase">Pay Now</span> <i class="fab fa-window-close" data-dismiss="modal"></i> </div>
                                <div class="mt-3 text-center fee align-items-center">
                                    <h3 class="mb-0 font-weight-light">Total : </span><span class="price">$ {{$total - 30 + 30  }}</span></h3>
                                </div>
                                <div class="inputbox"> <small>Your Address </small> <input type="text" class="form-control" name=""> </div>
                                <div class="mt-3"> <small>Payment Method</small>
                                    <div class="d-flex flex-row">
                                        <label class="radio1">
                                            {{-- Paypal Button --}}
                                            <div id="paypal-button-container"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3 mr-2">
                                    <div class="row g-2">
                                        <div class="col-md-12">
                                        </div>
                                    </div>
                                </div>

                                <hr class="mr-2 mt-4">
                                <div class="mt-3 mr-2 d-flex justify-content-end align-items-center"> <a href="#" class="cancel" data-dismiss="modal">Cancel</a> <button class=" ml-2 btn btn-primary pay">PAY NOW</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Check out --}}
        </div>
        @else
            <div class="text-center border-collapse">
                <span class="text-xl text-danger">¡Your cart is empty!</span>
            </div>
            @endif
   </section>
</main>

