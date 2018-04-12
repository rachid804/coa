@extends('layouts.app')

@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-inline" id="products-form">
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   id="name"
                                   placeholder="Product name">

                        </div>
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity in stock">

                        </div>

                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   name="price"
                                   id="price"
                                   placeholder="Price per item">

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Products
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Quantity in stock</th>
                            <th>Price per item</th>
                            <th>Datetime submitted</th>
                            <th>Total value number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($products))
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->date }}</td>
                                    <td>{{ $product->quantity * $product->price }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align: right;font-weight: bold">
                                    Total
                                </td>
                                <td style="font-weight: bold">
                                    {{ $products->sum('quantity') * $products->sum('price') }}
                                </td>
                            </tr>
                        @else
                            there is no product in the database
                        @endif

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
