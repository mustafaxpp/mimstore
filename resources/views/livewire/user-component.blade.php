<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">
                    <strong>
                           All Users Table
                    </strong>
                </h3>
                <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse (\App\Models\User::all() as $user)
                      <tr>
                        <th>{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        {{-- user mobile --}}
                            @if ($user->mobile)
                            <td>{{$user->mobile}}</td>
                            @else
                            <td class="text-center"> - </td>
                            @endif
                        {{-- user Role --}}
                            @if ($user->role =="admin")
                            <b> <td class="text-danger text-uppercase">{{$user->role}}</td> </b>
                            @else
                            <td class="text-success">{{$user->role}}</td>
                            @endif
                            <td> <a class="btn btn-success btn-sm text-light" wire:click='edit({{$user->id}})' > Edit </a> </td>
                            <td> <a class="btn btn-danger btn-sm text-light" wire:click='delete({{$user->id}})' > X </a> </td>
                      </tr>
                      @empty

                      @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
