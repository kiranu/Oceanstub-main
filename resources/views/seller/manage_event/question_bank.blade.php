@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
  <!-- Navbar -->
  @include('layouts.seller_navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('layouts.seller_sidebar')
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper">

 <!-- Content Header (Page header)
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    
                  </ol>
                </div>
              </div>
            </div> /.container-fluid 
          </section> -->
      
          <!-- Main content -->
          <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Question Bank</h3>
            </div>
           
        </div>
      
       <style>
         @media all and (max-width:720px){
          .button-refresh{
           
               margin-left: 92px!important;
          }
          .wordpromotion{
            margin-left: 33px;
               width: 95%;
               padding-left: 2px!important;
          }
          .button-nodata{
            padding-left: 35px!important;
          }
         }
       </style>
       <div class="modulebody ui-widget-content ui-corner-bottom">
       
       <p style="margin:25px;"><i class="fa fa-question-circle fa-15x "></i>&nbsp;&nbsp;You can create questions to be asked from the buyer on the checkout page. Questions can be related to a specific event and be asked only from the buyers who buy that event or can be general and be asked from all buyers.
            <br>Create your questions here and use them in the <i>Control Panel &gt; Account &amp; Settings  &gt; Site Settings</i> or the Event Creation pages. </p>
       <p style="margin:25px;">&nbsp;&nbsp;<i class="fa fa-warning fa-15x "></i>&nbsp;&nbsp;Asking unnecessary questions during purchase may cause the buyer to abandon the sales and may result in business loss. Only ask questions if really necessary.</p>
       <p></p> 
   </div>
        <div class="button" style="padding-left: 50px;">
          <button class="btn btn-dark btn-sm active" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModalLong">New Question</button>
         
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Question</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-span="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="margin-top: 4%;">
                        <span for="exampleInputEmail1">ID :  </span>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 60%;">
                      </div>
                      <div class="form-group">
                        <span for="exampleInputEmail1">Question:</Address> </span>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 60%;">
                      </div>
                      <div class="form-group ">
                        <span for="exampleInputEmail1">Question Type:</Address> </span>
                          <select class="form-control" onchange="questiontype(this)"; style="width: 60%;">
                            <option value="0">Text Box</option>
                            <option value="1">Checkbox</option>
                            <option value="2">Dropdown Selector</option>
                          </select>
                      </div>
                      
                      <div class="form-group">
                        <span for="exampleInputEmail1">Default value:</span>
                        <input type="email" class="form-control checkuncheckone" id="exampleInputEmail1" placeholder="" style="width: 60%;">
                        <select class="form-control checkuncheck" style="width: 60%; display:none">
                        
                            <option value="1">Checked</option>
                            <option value="2">Un-checked</option>
                          </select>
                     
                      </div>
                      <div class="form-group questionoption" style="display:none">
                        <span for="exampleInputEmail1">Option :</span>
                        <textarea name="ctl00$CPMain$cQuestionEdit$cValueStr" rows="2" cols="20" id="ctl00_CPMain_cQuestionEdit_cValueStr"  class="form-control" spellcheck="false" style="width: 60%;"></textarea>
                        <p class="hint" style="clear:both;">One option per line</p>
                        
    
                      </div>
                      <div class="form-group questionmaximum" >
                        <span for="exampleInputEmail1">Maximum answer length (in letters):</span>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 20%;">
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Answer Required
                        </label>
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary">Save </button>
                </div>
              </div>
            </div>
          </div>
        </div>
       <br>
  
       
            <div id="filters ui-widget-content  ui-corner-all clearfix" class="filters ui-widget-content  ui-corner-all row" style="padding-left: 20px;
            border: 1px solid black;
            width: 95%;
            margin: 0 auto;
            border-radius: 20px;
            padding-top: 25px;
            padding-bottom: 25px;
            min-height: 156px;">
                <div class="filterrow">
                    <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight" style="color: #007bff;font-weight: bold;">Filters:</span>
                </div><br>
                <div class="card-body">
                  
                 
                  <div class="form-group row">
                    <span for="inputPassword3" class="col-sm-2 col-form-span">Title includes:</span>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="">
                    </div>
                  </div>
       
                   
                  </div>
                <div class="filterrow3 clearfix button-refresh"style="margin-top:10px;margin-right:150px;margin-left:350px">
                  <input type="submit" name="ctl00$CPMain$cRefresh2" value="Refresh" id="ctl00_CPMain_cRefresh2" class="btn btn-secondary">

                </div>
            </div>    
            <br>
            <div class="row" style="padding-left:20px"><p></p>
                <table class="table"  style="padding-left: 20px;margin-right: 20px;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>avsbdgghdjnd</td>
                    <td>Text Box</td>
                    <td><a title="Edit user" href="" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<a title="Delete user"  href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jmjdcfufi</td>
                    <td>Text Box</td>
                    <td><a title="Edit user" href="" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>&nbsp;<a title="Delete user"  href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                  </tr>
                </tbody>
              </table>
              </div>
        </div>    


    



     
    

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

        
      </div>
         <!-- footer -->
       <!--   @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script>
function questiontype(sel)
{
  if(sel.value=="1"){
    $(".checkuncheck").fadeIn();
    $(".questionoption").fadeOut();
    $(".checkuncheckone").fadeOut();
    $(".questionmaximum").fadeOut();
  }
  else if(sel.value=="2"){
    $(".checkuncheckone").fadeIn();
    $(".questionoption").fadeIn();
    $(".checkuncheck").fadeOut();
    $(".questionmaximum").fadeOut();
  }
  else if(sel.value=="0"){
    $(".questionmaximum").fadeIn();
    $(".checkuncheckone").fadeIn();
    $(".checkuncheck").fadeOut();
    $(".questionoption").fadeOut();
  }
  
}
  
</script>
@endsection