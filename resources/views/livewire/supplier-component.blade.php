<div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-2">
                      <div class="col">
                        <div class="form-outline mb-2">
                            <label  class="form-label" for="form3Example4"> Name </label>
                          <input wire:model='name' value="{{ old('name') }}" type="text" id="form3Example4" class="form-control" />
                          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                      <div class="form-outline mb-2">
                        <label  class="form-label" for="form3Example4"> Number </label>
                      <input wire:model='number' value="{{ old('number') }}" type="text" id="form3Example4" class="form-control" />
                      @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                      </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-2">
                        <label class="form-label" for="form3Example3"> Phone </label>
                      <input wire:model='phone' value="{{ old('phone') }}" type="text" id="form3Example3" class="form-control" />
                      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-2">
                        <label class="form-label" for="form3Example4"> Email</label>
                      <input wire:model='email' value="{{ old('email') }}" type="email" id="form3Example4" class="form-control" />
                      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- Submit button -->
                    <button wire:click='save' class="btn btn-primary btn-block mb-4"> Save </button>
            </div>
            <div class="col-md-8">
                <h3 class="text-center text-danger">
                    <strong>
                        <u>
                            All Suppliers Data
                        </u>
                    </strong>
                </h3>
                <table class="table table-light table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">number</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\Models\Supplier::all() as $supplier)
                        <tr>
                          <td>{{$supplier->id}}</td>
                          <td class="text-primary">{{$supplier->name}}</td>
                          <td>{{$supplier->email}}</td>
                          {{-- user phone --}}
                          @if ($supplier->phone)
                          <td class="text-danger">{{$supplier->phone}}</td>
                          @else
                          <td class="text-danger"> - </td>
                          @endif
                          {{-- user number --}}
                              @if ($supplier->number)
                              <td class="text-danger">{{$supplier->number}}</td>
                              @else
                              <td class="text-center"> - </td>
                              @endif
                              <td> <a class="btn btn-success btn-sm text-light" wire:click='edit({{$supplier->id}})' > Edit </a> </td>
                              <td> <a class="btn btn-danger btn-sm text-light" wire:click='delete({{$supplier->id}})' > X </a> </td>
                        </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no Suppier yet</td>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

</div>
