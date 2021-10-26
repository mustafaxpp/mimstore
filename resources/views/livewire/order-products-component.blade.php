<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">

                <!-- Order_id input -->
                <label class="form-label" for="order_id"> Order </label>
                <select class="form-control rounded mb-2 " wire:model="order_id">
                    <option value="">Select Order_id</option>
                    @forelse ( \App\Models\OrderProduct::all() as $order)
                        <option value="{{ $order->id }}">{{$order->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>

                <!-- Product_id input -->
                <label class="form-label" for="name"> Product </label>
                <select class="form-control rounded mb-2 " wire:model="brand_id">
                    <option value="">Select Product_id</option>
                    @forelse ( \App\Models\OrderProduct::all() as $Product)
                        <option value="{{ $Product->id }}">{{ $Product->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>

                <!-- Submit button -->
                <a type="button" wire:click="save" class="btn btn-primary btn-block mb-4"> Save </a>
            </div>
            <div class="col-md-8">
                <h3 class="text-center">
                    <strong>
                        All OrderProducts Table
                    </strong>
                </h3>
                <table class="table table-light table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">order_id</th>
                            <th scope="col">product_id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\models\OrderProduct::all() as $orpr )
                            <tr>
                                <th>{{ $orpr->order_id }}</th>
                                <td>{{ $orpr->product_id }}</td>
                                <td><a class='btn btn-success btn-sm text-light' title='edit {{ $order->id }}">{{$order->name }}'
                                        wire:click='edit({{ $order->id }}">{{$order->name }})' role='button'>Edit</a></td>
                                <td> <a class='btn btn-danger btn-sm text-light' title='delete {{ $orpr->product_id }}'
                                        wire:click='delete({{ $orpr->product_id }}' role='button'>X</a></td>
                                </td>
                            </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no OrderProduct yet</td>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
