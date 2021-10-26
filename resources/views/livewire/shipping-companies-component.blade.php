<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Company Name</label>
                      <input wire:model='name' type="text" id="form3Example3" class="form-control" />
                    </div>
                    <!-- Number input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3"> Company Number</label>
                      <input wire:model='number' type="text" id="form3Example3" class="form-control" />
                    </div>

                    <!-- Fees input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3"> Fees </label>
                      <input wire:model='fees' type="number" id="form3Example3" class="form-control" />
                    </div>

                    <!-- Submit button -->
                    <button wire:click="save" class="btn btn-primary btn-block mb-4"> Save </button>
            </div>
            <div class="col-8">
                <h3 class="text-center text-danger">
                    <strong>
                        <u>
                            Shipping Companies
                        </u>
                    </strong>
                </h3>
                <table class="table table-light table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company Number</th>
                        <th scope="col">Fees</th>
                        <th colspan="2" scope="col">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\Models\ShippingCompany::all() as $company)
                        <tr>
                          <td>{{$company->id}}</td>
                          <td>{{$company->name}}</td>
                          {{-- company number --}}
                          <td class="text-danger">{{$company->number}}</td>
                          <td class="text-success">{{$company->fees}} .L.E</td>

                              <td> <a class="btn btn-success btn-sm text-light" wire:click='edit({{$company->id}})' > Edit </a> </td>
                              <td> <a class="btn btn-danger btn-sm text-light" wire:click='delete({{$company->id}})' > X </a> </td>
                        </tr>
                        @empty
                        <td colspan="5" class="text-danger text-center"> There is no Shiping Company yet</td>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
