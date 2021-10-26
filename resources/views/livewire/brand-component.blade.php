<div class="">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <!-- Name input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form3Example1"> Name</label>
                    <input type="text" wire:model="name" id="form3Example1" class="form-control" />
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <!-- Logo input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="logo"> Logo </label>
                    <input type="file" wire:model="logo" id="form3Example3" class="form-control-file" />
                    @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <!-- Submit button -->
                <a type="button" wire:click="save" class="btn btn-primary btn-block mb-4"> Save </a>
            </div>
            <div class="col-md-8">
                <h3 class="text-center text-danger">
                    <strong>
                        All Brands Table
                    </strong>
                </h3>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Logo</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\models\Brand::all() as $brand )
                            <tr>
                                <th>{{ $brand->id }}</th>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <img width="50" src="{{ url('storage/' . $brand->logo) }}" class="img-fluid"
                                        alt="">
                                </td>
                                <td><a class='btn btn-success btn-sm text-light' title='edit {{ $brand->name }}'
                                        wire:click='edit({{ $brand->id }})' role='button'>Edit</a></td>
                                <td><a class='btn btn-danger btn-sm text-light' title='delete {{ $brand->name }}'
                                        wire:click='delete({{ $brand->id }})' role='button'>X</a></td>
                            </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no Brand yet</td>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
