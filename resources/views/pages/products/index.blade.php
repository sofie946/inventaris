@extends('layouts.main')

@section('header')
<div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
@endsection

@section('content')
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered">
            <tbody>
                  <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Kode</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                  </tr>
                </tbody>
                <thead>
                  <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->sku}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->stock}}</td>
                      <td>{{$product->category->name}}</td>
                    </tr>
                  @endforeach
                </tbody>
                </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection