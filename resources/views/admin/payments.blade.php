@extends('admin.layouts.sidebar')
@section('tittle', 'All Payment')
@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="row mb-9 align-items-center justify-content-between">
        <div class="col-sm-6 mb-8 mb-sm-0">
            <h2 class="fs-4 mb-0">Payments</h2>
        </div>

    </div>

    <div class="card mb-4 rounded-4 p-7">
        <div class="card-body px-0 pt-7 pb-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle table-nowrap mb-0 table-borderless"><thead class="table-light">
                    <tr>
                        <th class="align-middle" scope="col">#ID
                        </th>
                        <th class="align-middle" scope="col">Name
                        </th>
                        <th class="align-middle" scope="col">Amount
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
                    @forelse($payment as $orders)
                        <tr>
                            <td><a href="#">#{{$orders['id']}}</a></td>
                            <td class="text-body-emphasis">{{$orders['name']}}</td>
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
                                    <a href="#" class="btn btn-primary py-4 fs-13px btn-xs me-4">Detail</a>
                                    <div class="dropdown no-caret">
                                        <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle btn btn-outline-primary btn-xs hover-white btn-hover-bg-primary py-4 px-5">
                                            <i class="far fa-ellipsis-h"></i> </a>
                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <a class="dropdown-item" href="#">View detail</a>
                                            <a class="dropdown-item" href="#">Edit info</a>
                                            <a class="dropdown-item text-danger" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @empty
                                <b>No Payment made</b>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{$payment->links()}}
            </div>
        </div>
    </div>


@endsection
