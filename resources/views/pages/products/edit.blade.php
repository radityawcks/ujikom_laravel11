@extends('layouts.main')

@section('header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Widgets</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item active">Edit Products</li>
            </ol>
        </div>
    </div>

@endsection

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <form action="/products/update/{{ $products->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Produk..." value="{{ old('name', $products->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Masukkan Deskripsi...">{{ old('description', $products->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="form-label">Kode Produk</label>
                            <input type="text" name="sku" id="sku" class="form-control" placeholder="Masukkan Kode Produk..." value="{{ old('sku', $products->sku) }}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Harga Produk</label>
                            <input type="number" inputmode="numeric" name="price" id="price" class="form-control" placeholder="Masukkan Harga Produk..." value="{{ old('price', $products->price) }}">
                        </div>
                        <div class="form-group">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" inputmode="numeric" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok..." value="{{ old('stok', $products->stok) }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $products->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success mr-2">Simpan</button>
                            <a href="/products" class="btn btn-sm btn-outline-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
  </div>

@endsection
