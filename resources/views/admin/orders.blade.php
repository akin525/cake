@extends('admin.layouts.sidebar')
@section('tittle', 'Orders')
@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.1/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/dt-2.0.1/datatables.min.js"></script>
    <div class="row mb-9 align-items-center justify-content-between">
        <div class="col-sm-6 mb-8 mb-sm-0">
            <h2 class="fs-4 mb-0">Order List</h2>
        </div>
        <div class="col-sm-6 col-md-3 d-flex flex-wrap justify-content-sm-end">
            <input class="form-control border-primary w-100" type="text" placeholder="Search Categories">
        </div>
    </div>

    <div class="card mb-4 rounded-4 p-7">
        <div class="card-header bg-transparent px-0 pt-0 pb-7">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 col-12 mr-auto mb-md-0 mb-6">
                    <input type="text" placeholder="Search..." class="form-control bg-input border-0">
                </div>
                <div class="col-md-8">
                    <div class=" row justify-content-end flex-nowrap d-flex">
                        <div class="col-lg-3 col-md-6 col-6">
                            <select class="form-select">
                                <option>Status</option>
                                <option>Active</option>
                                <option>Disabled</option>
                                <option>Show all</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-6">
                            <select class="form-select">
                                <option>Show 20</option>
                                <option>Show 30</option>
                                <option>Show 40</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-7 pb-0">
            <div class="table-responsive">
                <table id="example" class="table table-hover align-middle table-nowrap mb-0 table-borderless"><thead class="table-light">
                    <tr>
                        <th class="align-middle" scope="col">#ID
                        </th>
                        <th class="align-middle" scope="col">Name
                        </th>
                        <th class="align-middle" scope="col">Quantity
                        </th>
                        <th class="align-middle" scope="col">Total
                        </th>
                        <th class="align-middle" scope="col">Status
                        </th>
                        <th class="align-middle" scope="col">Date
                        </th>
                        <th class="align-middle text-center" scope="col">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($order as $orders)
                    <tr>
                        <td><a href="#">#{{$orders['id']}}</a></td>
                        <td class="text-body-emphasis">{{$orders['name']}}</td>
                        <td>
                            {{$orders['quantity']}}
                        </td>
                        <td>₦{{number_format(intval($orders['price'] *1),2)}}</td>
                        <td>
                            @if($orders['status'] ==1)
                            <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-success border-0 text-capitalize fs-12">Received</span>
                            @elseif($orders['status'] ==0)
                            <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-warning border-0 text-capitalize fs-12">Pending</span>
                            @else
                            <span class="badge rounded-lg rounded-pill alert py-3 px-4 mb-0 alert-danger border-0 text-capitalize fs-12">Cancel</span>
                            @endif
                        </td>
                        <td>{{$orders['created_at']}}</td>
                        <td class="text-center">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <a href="{{route('admin/vieworder', $orders['id'])}}" class="btn btn-primary py-4 fs-13px btn-xs me-4"><i class="fa fa-eye"></i> </a>

                            </div>
                        </td>
                        @empty
                            <b>No Orders</b>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
                {{$order->links()}}
            </div>
        </div>
    </div>


@endsection
