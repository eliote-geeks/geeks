@extends('layouts.layouts.app')
<base href="/public">
@section('content')
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">
                                    <h1 class="mb-1 h2 fw-bold">Courses Category</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard.index')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="javascript:;">Courses</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Courses Category
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCatgory">Add New
                    Category</a>
                            </div>
                        </div>
                    </div>
                                    <div class="">
                    <div class="row">
                      <!-- basic table -->
                      <div class="col-md-12 col-12 mb-5">
                        <div class="card">
                          <!-- card header  -->
                          <div class="card-header border-bottom-0">
                            <h4 class="mb-1">Categories {{ $categories->count() }}</h4>
                          </div>
                          <!-- table  -->
<div class="table-responsive border-0 overflow-y-hidden">
                                <table class="table mb-0 text-nowrap" id="dataTableBasic">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-0 font-size-inherit">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkAll" />
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="border-0">CATEGORY</th>
                                            <th class="border-0">Course</th>
                                            <th class="border-0">DATE CREATED</th>
                                            <th class="border-0">DATE UPDATED</th>
                                            <th class="border-0">STATUS</th>
                                            <th class="border-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                    @if(\App\Models\Category::where('category_id',$category->id)->count() > 0)
                                        <tr class="accordion-toggle collapsed" id="accordion1" data-bs-toggle="collapse" data-bs-parent="#accordion1" data-bs-target="#collapse{{$category->id}}">
                                            <td class="align-middle border-top-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="categoryCheck{{$category->id}}" />
                                                    <label class="form-check-label" for="categoryCheck{{$category->id}}"></label>
                                                </div>
                                            </td>
                                            <td class="align-middle border-top-0">
                                                <a href="javascript:;" class="text-inherit position-relative">
                                                    <h5 class="mb-0 text-primary-hover">
                                                        <i class="fe fe-chevron-down fs-4 me-2 text-muted position-absolute ms-n4 mt-1"></i> {{$category->name}}
                                                    </h5>
                                                </a>
                                            </td>
                                            <td class="align-middle border-top-0">1</td>
                                            <td class="align-middle border-top-0">
                                                {{\Carbon\Carbon::parse($category->created_at)->format('d M, Y')}}
                                            </td>
                                            <td class="align-middle border-top-0">
                                                {{\Carbon\Carbon::parse($category->updated_at)->format('d M, Y')}}
                                            </td>
                                            <td class="align-middle border-top-0">
                                                <span class="badge-dot bg-{{$category->view == 1 ? 'success' : 'warning'}}"></span>
                                            </td>
                                            <td class="text-muted align-middle border-top-0">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown1"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                              <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item" href="#"><i
                                  class="fe fe-send dropdown-item-icon"></i>Publish</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-inbox dropdown-item-icon"></i>Moved
                                Draft</a>
                                                <a class="dropdown-item" href="#"><i
                                  class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                                </span>
                                                </span>
                                            </td>
                                        </tr>
                                        @foreach (\App\Models\Category::where('category_id',$category->id)->get() as $cat)
                                            

<div class="modal fade" id="editCat{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="editCatLabel{{$cat->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="editCat{{$cat->id}}">
                    Create New Category
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                {{-- <form method="POST" action="{{route('modif',$cat->id)}}">                 --}}
                <form>
                @csrf
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                        <input value="{{ $cat->name }}" type="text" name="name" class="@error('name', 'categories') is-invalid @enderror form-control" placeholder="Write a Category" id="title" required>
                        <small>Field must contain a unique value</small>
                    </div>
          <div class="mb-3 mb-2">
                        <label class="form-label">Parent</label>
                        <select name="category_id" class="selectpicker" data-width="100%">
                
                 <option value="{{\App\Models\Category::where('id',$cat->category_id)->first()->id}}">{{\App\Models\Category::where('id',$cat->category_id)->first()->name}}</option>
                
                @foreach ($categories as $category)
                @if(\App\Models\Category::where('category_id',0)->count() > 0)
                    @if ($category->category_id == 0)	
                        <option value="{{$category->id}}">{{$category->name}} </option>
                    @endif
                @else
                @endif
                @endforeach
              </select>
                    </div>
      
                    <div class="mb-3 mb-3">
                        <label class="form-label">Short Description</label>
                         {{-- <div id="editor">This is some sample content.</div>                         --}}
                         <textarea  id="editor2"  class="@error('description', 'categories') is-invalid @enderror form-control" name="description" rows="5">                            
                            {{ $cat->description }}
                         </textarea> 
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Enabled</label>
                        <div class="form-check form-switch">
                            <input name="view" type="checkbox" class="form-check-input" id="customSwitch1" checked>
                            <label class="form-check-label" for="customSwitch1"></label>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary">Edit Category</button>
                        <button type="reset" class="btn btn-outline-white" data-bs-dismiss="modal">
                Close
              </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>














                                        
                                        <tr id="collapse{{$category->id}}">
                                            <td class="align-middle">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="categoryCheck{{$category->id}}" />
                                                    <label class="form-check-label" for="categoryCheck{{$category->id}}"></label>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{route('categories.show',$cat->id)}}" class="text-inherit">
                                                    <h5 class="mb-0 text-primary-hover ms-3">
                                                        {{$cat->name}}
                                                    </h5>
                                                </a>
                                            </td>
                                            <td class="align-middle">{{$cat->courses->count()}}</td>
                                            <td class="align-middle">{{\Carbon\Carbon::parse($category->created_at)->format('d M, Y')}}</td>
                                            <td class="align-middle">{{\Carbon\Carbon::parse($category->updated_at)->format('d M, Y')}}</td>
                                            <td class="align-middle">
                                                <span class="badge-dot bg-{{$category->view == 1 ? 'success' : 'warning'}}"></span>
                                            </td>
                                            <td class="text-muted align-middle">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown2"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown2">
                              <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item" href="#"><i
                                  class="fe fe-send dropdown-item-icon"></i>Publish</a>

                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editCat{{$cat->id}}"><i class="fe fe-inbox dropdown-item-icon"></i>Update</a>
                                                <a class="dropdown-item" href="{{route('cat.delete',$cat->id)}}" onclick="return(confirm('Are you sure you want to delete this subcategory !!'))"><i
                                  class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                                </span>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach



                                        @else
                        
@if ($category->category_id == 0)	


                                        <tr>
                                            <td class="align-middle">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="categoryCheck3" />
                                                    <label class="form-check-label" for="categoryCheck3"></label>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{route('categories.show',$category->id)}}" class="text-inherit">
                                                    <h5 class="mb-0 text-primary-hover">{{$category->name}}</h5>
                                                </a>
                                            </td>
                                            <td class="align-middle">{{$category->courses->count()}}</td>
                                            <td class="align-middle">{{\Carbon\Carbon::parse($category->created_at)->format('d M, Y')}}</td>
                                            <td class="align-middle">{{\Carbon\Carbon::parse($category->updated_at)->format('d M,Y')}}</td>
                                            <td class="align-middle">
                                                <span class="badge-dot bg-{{$category->view == 1 ? 'success' : 'warning'}}"></span>
                                            </td>
                                            <td class="text-muted align-middle">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown3"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item" href="#"><i
                                  class="fe fe-send dropdown-item-icon"></i>Publish</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newCatgory{{$category->id}}"><i class="fe fe-inbox dropdown-item-icon"></i>Updated
                                </a>
                                                <a class="dropdown-item" href="#"><i
                                  class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                                </span>
                                                </span>
                                            </td>
                                        </tr>
@endif
    @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>  



                        </div>

                      </div>

                    </div>
                  </div>

 <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Create New Category
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route("categories.store") }}">
                @csrf
                    <div class="mb-3 mb-2">
                        <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                        <input value="{{ old('name') }}" type="text" name="name" class="@error('name', 'categories') is-invalid @enderror form-control" placeholder="Write a Category" id="title" required>
                        <small>Field must contain a unique value</small>
                    </div>
          <div class="mb-3 mb-2">
                        <label class="form-label">Parent</label>
                        <select name="category_id" class="selectpicker" data-width="100%">
                <option value="">Select</option>
                @foreach ($categories as $category)
                @if(\App\Models\Category::where('category_id',0)->count() > 0)
                    @if ($category->category_id == 0)	
                        <option value="{{$category->id}}">{{$category->name}} </option>
                    @endif
                @else
                @endif
                @endforeach
              </select>
                    </div>
      
                    <div class="mb-3 mb-3">
                        <label class="form-label">Short Description</label>
                         {{-- <div id="editor">This is some sample content.</div>                         --}}
                         <textarea  id="editor2"  class="@error('description', 'categories') is-invalid @enderror form-control" name="description" rows="5">                            
                            {{ old('description') }}
                         </textarea> 
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Enabled</label>
                        <div class="form-check form-switch">
                            <input name="view" type="checkbox" class="form-check-input" id="customSwitch1" checked>
                            <label class="form-check-label" for="customSwitch1"></label>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary">Add New Category</button>
                        <button type="reset" class="btn btn-outline-white" data-bs-dismiss="modal">
                Close
              </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection