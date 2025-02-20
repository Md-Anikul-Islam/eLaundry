@extends('admin.app')
@section('admin_content')
    {{-- CKEditor CDN --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Halsey Street Laundromat</a></li>
                        <li class="breadcrumb-item active">Service Section!</li>
                    </ol>
                </div>
                <h4 class="page-title">Service Section!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    @can('service-create')
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service as $key=>$serviceData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$serviceData->category->name}}</td>
                            <td>{{$serviceData->title}}</td>
                            <td>{{$serviceData->details}}</td>
                            <td>{{$serviceData->price}}</td>
                            <td><img src="{{asset('images/service/'.$serviceData->image)}}" alt="" style="width: 50px;"></td>
                            <td>{{$serviceData->status==1? 'Active':'Inactive'}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                    @can('service-edit')
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$serviceData->id}}">Edit</button>
                                    @endcan
                                    @can('service-delete')
                                        <a href="{{route('service.destroy',$serviceData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$serviceData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$serviceData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$serviceData->id}}" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$serviceData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('service.update',$serviceData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Category</label>
                                                            <select name="category_id" class="form-select">
                                                                @foreach($category as $categoryData)
                                                                    <option value="{{$categoryData->id}}" {{ $serviceData->category_id === $categoryData->id ? 'selected' : '' }}>{{$categoryData->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" id="title" name="title"
                                                                   class="form-control" value="{{$serviceData->title}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="details" class="form-label">Details</label>
                                                            <textarea type="text"  name="details"
                                                                      class="form-control">{{$serviceData->details}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="text" id="price" name="price"
                                                                   class="form-control" value="{{$serviceData->price}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Image</label>
                                                            <input type="file" id="image" name="image"
                                                                   class="form-control" placeholder="Enter image">
                                                            <img src="{{asset('images/service/'.$serviceData->image)}}" alt="" style="width: 50px;">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $serviceData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $serviceData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$serviceData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$serviceData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$serviceData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('service.destroy',$serviceData->id)}}" class="btn btn-danger">Delete</a>
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
    <!--Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Category</label>
                                    <select name="category_id" class="form-select">
                                        @foreach($category as $categoryData)
                                            <option value="{{$categoryData->id}}">{{$categoryData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title"
                                           class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="details" class="form-label">Details</label>
                                    <textarea type="text"  name="details"
                                              class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" id="price" name="price"
                                           class="form-control" placeholder="Enter Price" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" id="image" name="image"
                                           class="form-control" placeholder="Enter image">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
