<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <!-- 2 column grid layout with text inputs for the first and last names -->

                <!-- Name input -->
                <div class="form-outline mb-2">
                    <label class="form-label" for="form3Example1"> Name </label>
                    <input type="text" wire:model="name" id="form3Example1" class="form-control" />
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <!-- Category_id -->
                <select class="form-control rounded mb-2" wire:model="category_id">
                    <option value="">Select Category</option>
                    @forelse ( \App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>
                <!-- Submit button -->
                <a type="button" wire:click="save" class="btn btn-primary btn-block mb-4"> Save </a>

            </div>
            <div class="col-md-8">
                <h3 class="text-center text-danger">
                    <strong>
                        All Categories Table
                    </strong>
                </h3>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category_id</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\models\Category::all() as $cat )
                            <tr>
                                <th scope="row">{{ $cat->id }}</th>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->category_id }}</td>
                                <td><a class='btn btn-success btn-sm text-light' title='edit  {{ $cat->name }}'
                                        wire:click='edit({{ $cat->id }})' role='button'>Edit</a></td>
                                <td><a class='btn btn-danger btn-sm text-light' title='delete  {{ $cat->name }}'
                                        wire:click='delete({{ $cat->id }})' role='button'>X</a></td>
                            </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no Category yet</td>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
