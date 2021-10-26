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
                        <label  class="form-label" for="form3Example4"> Discreption </label>
                        <textarea wire:model='discreption' value="{{ old('discreption') }}" class="form-control" cols="5" rows="5"></textarea>
                      @error('discreption') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                      </div>
                    </div>
                    <!-- Submit button -->
                    <button wire:click='save' class="btn btn-primary btn-block mb-4"> Save </button>
            </div>
            <div class="col-md-8">
                <h3 class="text-center text-danger">
                    <strong>
                        <u>
                            All Payment Methods Data
                        </u>
                    </strong>
                </h3>
                <table class="table table-light table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discreption</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\Models\PaymentMethod::all() as $payment)
                        <tr>
                          <td>{{$payment->id}}</td>
                          <td class="text-primary">{{$payment->name}}</td>
                          <td>{{$payment->discreption}}</td>

                              <td> <a class="btn btn-success btn-sm text-light" wire:click='edit({{$payment->id}})' > Edit </a> </td>
                              <td> <a class="btn btn-danger btn-sm text-light" wire:click='delete({{$payment->id}})' > X </a> </td>
                        </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no PaymentMethod yet</td>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
