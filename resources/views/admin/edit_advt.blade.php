@extends("admin.master")

@section("content")

<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Advt Income</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Manage Ads</li>
              </ol>
            </nav>
          </div>
        </div>
        @if (session('message') != null)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p class="alert alert-success">
                                {{ session('message') }}
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
                    @if (session('notmessage') != null)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p class="alert alert-danger">
                                {{ session('notmessage') }}
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-8 mx-auto">
            <h6 class="mb-0 text-uppercase">Manage Ads</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
              <div class="card-body p-9">
                <div class="card-title d-flex align-items-center">
                  <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                  </div>
                  <h5 class="mb-0 text-primary">Manage Ads</h5>
                </div>
                <hr>
                <form class="row g-3" method="post" action="{{url('admin/advt/update')}}" enctype="multipart/form-data" >
                  @csrf
                  <input type="hidden" name="id" value="{{$edit->id}}">
                  <div class="col-md-4">
                  <label for="sel1">Ad Title</label>
                  <input type="text" class="form-control" id="" name="title" value="{{$edit->title}}">
                  </div>
                  <div class="col-md-4">
                  <label for="sel1">Expiry Date</label>
                  <input type="date" class="form-control" id="" name="expiry_date" value="{{$edit->expiry_date}}">
                  </div>
                  <div class="col-md-4">
                  <label for="sel1">Date</label>
                  <input type="date" class="form-control" id="" name="date" value="{{$edit->date}}">
                  </div>
                   <div class="col-md-4">
                  <label for="sel1">Type</label>
                  <input type="text" class="form-control" id="" name="type" value="{{$edit->type}}">
                  </div>
                  <div class="col-md-4">
                  <label for="sel1">Description</label>
                  <textarea type="text" class="form-control" id="" name="description" value="{{$edit->description}}"></textarea>
                  </div>
               <br><br><br><br>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    











@endsection