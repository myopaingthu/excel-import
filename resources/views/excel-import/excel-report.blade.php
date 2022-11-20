@extends('layouts.app')

@section('content')
<div class="py-3">
    <div class="mb-3">
        <h3>Report for total amount grouping by equipment type </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Equipment Type</th>
                    <th scope="col">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report1 as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->equipment_type }}</td>
                    <td>{{ $value->total_amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <h3>Report for total qty of items grouping by item subcategory </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Subcategory</th>
                    <th scope="col">Total Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report2 as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->item_sub_category }}</td>
                    <td>{{ $value->total_quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <h3>Report for annual qty of items grouping with department and item subcategory </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department</th>
                    <th scope="col">Item Sub Category</th>
                    <th scope="col">Total Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report3 as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->department }}</td>
                    <td>{{ $value->item_sub_category }}</td>
                    <td>{{ $value->total_quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection