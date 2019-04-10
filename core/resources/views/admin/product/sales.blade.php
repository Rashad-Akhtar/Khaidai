@extends('admin.admin_layout.masterpage')

@section('sub_title')
Sales
@endsection

@section('content')

<main class="app-content">
        <div class="app-title">
            <div>
                <h1>Sales</h1>
            </div>
        </div>
        <div class="tile">
            <div class="tile-body">
                <h2>Add Product</h2>
                <form action="{{ route('admin.add.cart') }}" method="post">
                     @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="product_id">Product Name</label>
                            <select name="product_id" class="form-control">
                                @foreach ($products as $product)
                                  <option value="{{ $product->id }}">{{ $product->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="quantity"> Quantity </label>
                            <input type="number" min="0" class="form-control" name="quantity">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="mt-4 btn btn-success btn-sm">Add Product</button>
                        </div> 
                    </div>
                 </form>
            </div>
        </div>
        
        <div class="tile">
            <div class="tile-body">
                    <div class="table-responsive">
                            <table class="table">
                                    <h3>Selected Products<button data-toggle="modal" data-target="#delModal"  class="btn btn-danger bold pull-right"><i class="fa fa-trash"></i> Clear Cart</button></h3>
                                    <br>
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @php
                                $count = 1 ;
                                @endphp
                                <tbody>
                                    @foreach ($cart as $key => $product)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['price'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>{{ $product['total_price'] }}</td>
                                        <td>
                                            <a data-toggle="modal" href="#DelModal{{ $key }}" class="btn btn-outline-danger btn-sm ">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td>
                                        <div class="modal fade" id="DelModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" >
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel{{ $key }}"><i class='fa fa-trash'></i> Delete !</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
        
                                                        <div class="modal-body">
                                                            <strong>Are you sure you want to Delete ?</strong>
                                                        </div>
        
                                                        <div class="modal-footer">
                                                            <form method="post" action="{{ route('admin.cart.remove') }}" class="form-inline">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="id" value="{{ $key }}">
        
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>&nbsp;
                                                                <button type="submit" class="btn btn-success"><i class="fa fa-trash"></i> Yes</button>
                                                            </form>
                                                        </div>
        
                                                    </div>
                                                </div>
                                            </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
            </div> 
        </div>

        <div class="tile">
             <div class="tile-body">
                 <h3>Checkout</h3>
                 <form action="{{ route('admin.cart.checkout') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Customer Name</label>
                                <input type="text" class="form-control" name="customer_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Customer Phone</label>
                                <input type="text" class="form-control" name="customer_phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Sub Total</label>
                            <input type="text" class="form-control" name="sub_total" value="{{ $total }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Discount</label>
                            <input type="text" class="form-control" name="discount" value="{{ $discount }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Grand Total</label>
                            <input type="text" class="form-control" name="grand_total" value="{{ $grand_total }}" readonly>
                            </div>
                        </div>

                         <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">Sale Complete</button>
                         </div>

                     </div>
                 </form>
             </div> 
        </div>

        <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <strong>Are you sure you want to clear cart ?</strong>
                        </div>

                        <div class="modal-footer">
                            <form method="post" action="{{ route('admin.cart.clear') }}" class="form-inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">

                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>&nbsp;
                                <button type="submit" class="btn btn-success"><i class="fa fa-trash"></i> Yes</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </main>
    <script type="text/javascript">

        $('#sales').css('background','#737373');

    </script>

@endsection
