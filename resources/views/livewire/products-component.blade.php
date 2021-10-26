<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                <!-- Name input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="name"> Name</label>
                    <input type="text" wire:model="name" id="form3Example1" class="form-control" />
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Price input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="price"> Price </label>
                    <input type="number" wire:model="price" id="form3Example3" class="form-control" />
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Category_id input -->
                <label class="form-label" for="name"> Category  </label>
                <select class="form-control rounded mb-2 " wire:model="category_id">
                    <option value="">Select Category</option>
                    @forelse ( \App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>

                <!-- Brand_id input -->
                <label class="form-label" for="name"> Brand </label>
                <select class="form-control rounded mb-2 " wire:model="brand_id">
                    <option value="">Select Brand</option>
                    @forelse ( \App\Models\Brand::all() as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>

                <!-- Stock_id input -->
                <label class="form-label" for="name"> Stock  </label>
                <select class="form-control rounded mb-2 col-form-label" wire:model="stock_id">
                    <option value="">Select Stock</option>
                    @forelse ( \App\Models\Stock::all() as $stock)
                        <option value="{{ $stock->id }}">{{ $stock->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>

                <!-- Image input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="image"> Image </label>
                    <input type="file" wire:model="image" id="form3Example3" class="form-control-file" />
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


                <!-- Submit button -->
                <a type="button" wire:click="save" class="btn btn-primary btn-block mb-4"> Save </a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="col-md-12">
                <h3 class="text-center text-danger">
                    <strong>
                        All Products Table
                    </strong>
                </h3>
                <table class="table table-light table-hover text-center">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category_id</th>
                            <th scope="col">Brand_id</th>
                            <th scope="col">Stock_id</th>
                            <th scope="col" colspan="2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\models\Product::all() as $product )
                            <tr>
                                <th>{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img width="50" src="{{ url( '/storage/'.$product->image) }}" class="img-profile rounded-circle h-10 w-10"></td>
                                <td>{{ $product->category ? $product->category->name : " - " }}</td>
                                <td>{{ $product->brand ? $product->brand->name : " - "}}</td>
                                <td>{{ $product->stock_id ? $product->stock_id : " - " }}</td>
                                <td><a class='btn btn-success btn-sm text-light' title='edit {{ $product->name }}'
                                        wire:click='edit({{ $product->id }})' role='button'>Edit</a></td>
                                <td> <a class='btn btn-danger btn-sm text-light' title='delete {{ $product->name }}'
                                        wire:click='delete({{ $product->id }})' role='button'>X</a></td>
                                </td>
                            </tr>
                        @empty
                        <td colspan="8" class="text-danger text-center"> There is no Product yet</td>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
