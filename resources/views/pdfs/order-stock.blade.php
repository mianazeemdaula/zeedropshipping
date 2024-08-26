@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Order Stock</h1>
                <p>Order stock for the following products:</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($rows[0] as $item)
                                <th>{{ $item }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $product)
                            <tr>
                                <td>{{ $product[0] }}</td>
                                <td>{{ $product[1]}}</td>
                                <td>{{ $product[2]}}</td>
                                <td>{{ $product[3]}}</td>
                                <td>{{ $product[4]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection