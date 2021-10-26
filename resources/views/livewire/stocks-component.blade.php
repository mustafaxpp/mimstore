<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <form>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-2">
                        <label class="form-label" for="form3Example1"> Name</label>
                        <input type="text" wire:model="name" id="form3Example1" class="form-control" />
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- Count input -->
                    <div class="form-outline mb-2">
                        <label class="form-label" for="count"> Count </label>
                        <input type="number" wire:model="count" id="form3Example3" class="form-control" />
                        @error('count') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- Submit button -->
                    <a type="button" wire:click="save" class="btn btn-primary btn-block mb-4"> Save </a>

                </form>
            </div>
            <div class="col-md-8">
                <h3 class="text-center text-danger">
                    <strong>
                        All Stocks Table
                    </strong>
                </h3>
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Count</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\models\Stock::all() as $stock )
                            <tr>
                                <th scope="row">{{ $stock->id }}</th>
                                <td>{{ $stock->name }}</td>
                                <td>{{ $stock->count }}</td>
                                <td><a class='btn btn-success btn-sm text-light' title='edit  {{ $stock->name }}'
                                        wire:click='edit({{ $stock->id }})' role='button'>Edit</a></td>
                                <td><a class='btn btn-danger btn-sm text-light' title='delete  {{ $stock->name }}'
                                        wire:click='delete({{ $stock->id }})' role='button'>X</a></td>
                            </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no Stock yet</td>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
