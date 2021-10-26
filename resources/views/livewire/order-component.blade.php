<div >

    <div class="container-table100 mt-5">

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="mb-3">
                            @if (session()->has('message') )
                            <div class="alert alert-{{Session::get('class')}} text-center" role="alert">
                                {{ session('message') }}
                              </div>
                            @endif
                        </div>
                        {{-- اسم صاحب الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label float-right">اسم صاحب الاوردر</label>
                            <input type="text" class="form-control" wire:model="name" id="exampleFormControlInput1" placeholder="اسم صاحب الاوردر">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                          {{-- عنوان صاحب الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label float-right">عنوان صاحب الاوردر</label>
                            <input type="text" class="form-control" wire:model="address" id="exampleFormControlInput1" placeholder="عنوان صاحب الاوردر">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- رقم تليفون صاحب  الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label float-right">رقم صاحب الاوردر</label>
                            <input type="number" class="form-control" wire:model="mobile" id="exampleFormControlInput1" placeholder="رقم صاحب الاوردر">
                            @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- رقم تليفون صاحب  الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label float-right">رقم تاني لصاحب الاوردر</label>
                            <input type="number" class="form-control" wire:model="phone" id="exampleFormControlInput1" placeholder="رقم تاني لصاحب الاوردر">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- تفاصيل الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label float-right">تفاصيل الاوردر</label>
                            <textarea class="form-control" wire:model="details" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('details') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                       @if (Auth::user()->role =='admin')
                         {{--  حالة الاوردر --}}
                         <div class="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- select -->
                                    <div class="form-group">
                                  <label for="exampleFormControlTextarea1" class="form-label float-right"> حالة الاوردر </label>
                                <select class="form-control" wire:model='status'>
                                    <option>Select status</option>
                                    <option value="pendding">Pendding</option>
                                    <option value="canceled">Canceled</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                       @else

                       @endif
                        {{-- حساب  الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label float-right"> حساب الاوردر بدون مصاريف شحن</label>
                            <input type="number" class="form-control" wire:model="order_price" id="exampleFormControlInput1" placeholder="حساب الاوردر بدون مصاريف شحن">
                            @error('order_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- حساب  الاوردر --}}
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label float-right">حساب شحن الاوردر</label>
                            <input type="number" class="form-control" wire:model="shippind_price" id="exampleFormControlInput1" placeholder=" حساب شحن الاوردر">
                            @error('shippind_price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" wire:click="save" class="btn btn-primary mb-3">حفظ</button>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
            <div class="col-12">
                <h3 class="text-center text-white">
                    <strong>
                        <u>
                            تفاصيل الاوردرات
                        </u>
                    </strong>
                </h3>
                  <div class="limiter mt-2">
                    <div class="container-table50">
                        <div class="wrap-table50">
                                <table>
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column2">رقم</th>
                                            <th class="column2">الاسم</th>
                                            <th class="column3">العنوان</th>
                                            <th class="column1">تفاصيل الاوردر</th>
                                            <th class="column5">رقم تليفون 1</th>
                                            <th class="column6">رقم تليفون 2</th>
                                            <th class="column1">حالة الاوردر</th>
                                            <th class="column8">الحساب</th>
                                            <th class="column8">بواسطة</th>
                                            <th scope="column9">&nbsp;</th>
                                            @if (Auth()->user()->role =='admin')
                                            <th scope="column9">&nbsp;</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (\App\Models\Order::all() as $order)
                                        <tr>

                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->details}}</td>
                                            <td> {{$order->mobile}} </td>
                                            <td>{{$order->phone ? $order->phone : " - "}}</td>
                                            @if ($order->status =="pendding")
                                            <td class="text-primary"><i class="fas fa-pause-circle"></i>  قيد الانتظار </td>
                                            @elseif ($order->status =="canceled")
                                            <td class="text-danger"><i class="fa fa-window-close" aria-hidden="true"></i>  تم الالغاء</td>
                                            @elseif ($order->status =="accepted")
                                            <td class="text-black"><i class="fas fa-check-circle"></i> تمت الموافقة  </td>
                                            @else
                                            <td class="text-success"> <i class="fas fa-check-circle"></i> تم التسليم</td>
                                            @endif
                                            <td class="text-danger">{{$order->order_price + $order->shippind_price}}</td>
                                            @if ($order->created_by && $order->created_by == 1)
                                            <td> مصطفي </td>
                                            @elseif ($order->created_by && $order->created_by == 2)
                                            <td> عاطف </td>
                                            @elseif ($order->created_by && $order->created_by == 3)
                                            <td> ايمن </td>
                                            @elseif ($order->created_by && $order->created_by == 4)
                                            <td> مصطفي فيسبوك </td>
                                            @else
                                            <td> -  </td>
                                            @endif
                                            <td> <a class="btn btn-success btn-sm text-light m-1" wire:click='edit({{$order->id}})' > تعديل </a> </td>
                                            @if (Auth()->user()->role =='admin')
                                            <td> <a class="btn btn-danger btn-sm text-light m-1" data-toggle="modal" data-target="#exampleModal{{$order->id}}"  > X </a> </td>
                                            @endif

                                        </tr>
                                         <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Delete Order </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                Are You Sure You Want Delete
                                                <span class="text-danger">
                                                    <b>
                                                        {{$order->name}}
                                                    </b>
                                                </span>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click='delete({{$order->id}})'>Delete</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        @empty
                                        <td colspan="7" class="text-danger text-center">مفيش اوردرات حاليا</td>
                                        @endforelse

                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
