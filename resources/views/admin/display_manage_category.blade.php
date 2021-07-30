@extends("admin.master")
@section("content")
<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<script>  
//user-defined function to download CSV file  
function downloadCSV(csv, filename) {  
    var csvFile;  
    var downloadLink;  
     
    //define the file type to text/csv  
    csvFile = new Blob([csv], {type: 'text/csv'});  
    downloadLink = document.createElement("a");  
    downloadLink.download = filename;  
    downloadLink.href = window.URL.createObjectURL(csvFile);  
    downloadLink.style.display = "none";  
  
    document.body.appendChild(downloadLink);  
    downloadLink.click();  
}  
  
//user-defined function to export the data to CSV file format  
function exportTableToCSV(filename) {  
   //declare a JavaScript variable of array type  
   var csv = [];  
   var rows = document.querySelectorAll("table tr");  
   
   //merge the whole data in tabular form   
   for(var i=0; i<rows.length-1; i++) {  
    var row = [], cols = rows[i].querySelectorAll("td, th");  
    for( var j=0; j<cols.length-1; j++)  
       row.push(cols[j].innerText);  
    csv.push(row.join(","));  
   }   
   //call the function to download the CSV file  
   downloadCSV(csv.join("\n"), filename);  
}  
</script>  
  
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
<body>
 <div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Manage Product</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View/Edit Category</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-8 mx-auto">
            <h6 class="mb-0 text-uppercase">Basic Form</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
              <div class="card-body p-9">
                <div class="card-title d-flex align-items-center">
                  <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                  </div>
                <div class="card-tools">
                <button onclick="exportTableToCSV('managemember.csv')" class="btn btn-warning">Download Csv File</button> 

                </div>
              </div>
              
              <div class="card-body">
                   @if($errors->any())
                   <div class="alert alert-danger">
                    <ul>

                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                     @endforeach
                    </ul>
                  </div>
                  @endif 
                   <div class="table-responsive">
                   <table  id="example" class="table table-bordered table-striped">

                <thead>

                <tr>
      
                <th>SN</th>
                <th>Category</th>
                <th>Category Name</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($display_category as $c)
                  <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$c->id}}</td>
                  <td>{{$c->category_name}}</td>
                  <td><a href="{{url('admin/delete_category/'.$c->id)}}"><button  style="font-size:15px" class="btn btn-success">Delete</button></a>&nbsp;
                  </td>
                  </tr>
                  @endforeach   
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </body> 
                </html>


   <!----end data table------>


@endsection