@extends('admin.admin_layout.masterpage')

@section('sub_title')
 Categories
@endsection

@section('content')

<main class="app-content">
        <div class="app-title">
            <div>
                <h1>Categories</h1>
            </div>
        </div>
            <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="table-responsive">
                        <table class="table">
                                <h3>Manage Category <button data-toggle="modal" data-target="#myModal" class="btn btn-primary bold pull-right"><i class="fa fa-plus"></i> Add New Category</button></h3>
                                <br>
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @php
                            $count = 1 ;
                            @endphp
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="#editModal{{ $category->id }}" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                </tr>

                                    <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe{{ $category->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabe{{ $category->id }}"><i class="fa fa-share-square"></i>Edit Category</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <form method="post" action="{{ route('admin.update.category') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="inputName" class="col-sm-12 ">Category Name : </label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="name"  value="{{ $category->name }}">
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
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Add New Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form class="form-horizontal" method="post" action="{{ route('admin.add.category') }}" >
                        @csrf
                        <div class="modal-body">
                            <div class="form-group error">
                                <label for="inputName" class="col-sm-12 " style="text-transform: uppercase;">Category Name : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Category Name">
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

        $('#categories').css('background','#737373');

    </script>

@endsection
