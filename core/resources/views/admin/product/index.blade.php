@extends('admin.admin_layout.masterpage')

@section('sub_title')
Products
@endsection

@section('content')

<main class="app-content">
        <div class="app-title">
            <div>
                <h1>Products</h1>
            </div>
        </div>
            <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="table-responsive">
                        <table class="table">
                                <h3>Manage Product <button data-toggle="modal" data-target="#myModal" class="btn btn-primary bold pull-right"><i class="fa fa-plus"></i> Add New Product</button></h3>
                                <br>
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Expiry Date</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @php
                            $count = 1 ;
                            @endphp
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->expiry_date->toFormattedDateString() }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="#editModal{{ $product->id }}" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>

                                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabe{{ $product->id }}"><i class="fa fa-share-square"></i>Edit Product</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <form method="post" action="{{ route('admin.update.product') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="inputName" class="col-sm-12 ">Product Category : </label>
                                                            <div class="col-sm-12">
                                                                <select name="category_id" class="form-control">
                                                                    @foreach ($categories as $category)
                                                                       <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }} >{{ $category->name }}</option> 
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Product Name : </label>
                                                            <div class="col-sm-12">
                                                               <input type="text" class="form-control form-control-lg" name="name" value="{{ $product->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Product Price : </label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                   <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon2">BDT</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group error">
                                                            <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Expiry Date : </label>
                                                            <div class="col-sm-12">
                                                                <input type="date" class="form-control form-control-lg" name="expiry_date">
                                                            </div>
                                                        </div>
                                                        <div class="form-group error">
                                                            <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Product Description : </label>
                                                            <div class="col-sm-12">
                                                               <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary bold uppercase" id="btn-save" value="add"><i class="fa fa-send"></i> Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Add New Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form class="form-horizontal" method="post" action="{{ route('admin.add.product') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Select Category : </label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-lg" name="category_id">
                                        @foreach ($categories as $category)
                                          <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Product Name : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Product Name">
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Product Price : </label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="price" placeholder="Product Price">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">BDT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Expiry Date : </label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control form-control-lg" name="expiry_date">
                                </div>
                            </div>
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Product Description : </label>
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary bold uppercase" id="btn-save" value="add"><i class="fa fa-send"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </main>
    <script type="text/javascript">

        $('#products').css('background','#737373');

    </script>

@endsection
