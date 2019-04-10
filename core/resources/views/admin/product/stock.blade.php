@extends('admin.admin_layout.masterpage')

@section('sub_title')
Product Stock
@endsection

@section('content')

<main class="app-content">
        <div class="app-title">
            <div>
                <h1>Product Stock</h1>
            </div>
        </div>
            <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="table-responsive">
                        <table class="table">
                                <h3>Manage Stock</h3>
                                <br>
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th> Stock </th>
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
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="#editModal{{ $product->id }}" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>

                                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe{{ $product->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabe{{ $product->id }}"><i class="fa fa-share-square"></i>Edit Product Stock</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <form method="post" action="{{ route('admin.update.stock') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="inputName" class="col-sm-12 ">Product Name : </label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="name"  value="{{ $product->name }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="col-sm-12 ">Product Stock : </label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="stock"  value="{{ $product->stock }}">
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
    </main>
    <script type="text/javascript">

        $('#stock').css('background','#737373');

    </script>

@endsection
