@extends('backend.layout.app')


@section('content')


<!--Start Page Title-->
<div class="page-title-box">
    <h4 class="page-title">Dashboard </h4>
    <div class="clearfix"></div>
 </div>
  <!--End Page Title-->          

     <!--Start row-->
     <div class="row">
         <div class="container">
             <div class="analytics-box">

             </div>
         </div>
     </div>
     <!--End row-->

      <!--Start row-->
      <div class="row">
       <!--Start info box-->
       <div class="col-md-6 col-sm-6">
           <div class="info-box-main">
              <div class="info-stats">
                  <p>2300</p>
                  <span>Daily visitors</span>
              </div>
              <div class="info-icon text-info">
                 <i class="mdi mdi-account-multiple"></i>	
              </div>
              <div class="info-box-progress">
                 <div class="progress">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                 </div>
              </div>
              </div>
           </div>
       </div>
       <!--End info box-->

       <!--Start info box-->
       <div class="col-md-6 col-sm-12">
           <div class="info-box-main">
              <div class="info-stats">
                  <p>{!! App\User::where('rank', 0)->count() !!}</p>
                  <span>Users</span>
              </div>
              <div class="info-icon text-warning">
                  <i class="mdi mdi-account-multiple"></i>
              </div>
              <div class="info-box-progress">
                 <div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                 </div>
              </div>
              </div>
           </div>
       </div>
       <!--End info box-->

      </div>
      <!--End row-->



    <!--Start row-->  
    <div class="row">
         <div class="col-md-6">
             <div class="white-box">
             <h2 class="header-title">Sales Analytics</h2>
                <ul class="list-inline text-center m-t-10">
                  <li>
                    <h5><i class="fa fa-circle m-r-5" style="color:#98C1D1;"></i>Iphone</h5>
                  </li>
                  <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #23DBDE;"></i>Ipad</h5>
                  </li>
                  <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #F6DDA0;"></i>Itouch</h5>
                  </li>
                </ul>
                   <div id="morris-area-chart" style="height:250px;"></div>
             </div>
         </div>


      <div class="col-md-6">
          <div class="white-box">
              <h2 class="header-title">Total Revenue </h2>
                <ul class="list-inline text-center m-t-10">
                  <li>
                    <h5><i class="fa fa-circle m-r-5" style="color:#03A9F3;"></i>Section A</h5>
                  </li>
                  <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #FFAA00;"></i>Section B</h5>
                  </li>
                </ul>
                <div id="morris2"  style="height:250px;"></div>

          </div>
      </div><!-- /col-md-6-->


    </div>
    <!--End row-->


       <!--Start row-->
       <div class="row">

         <!-- Start inbox widget-->
         <div class="col-md-12">
            <div class="white-box">
              <h2 class="header-title"> Projects </h2>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th >Start Date</th>
                        <th>Deadline Date</th>
                        <th>Status</th>
                        <th>Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Design new theme</td>
                        <td>10/10/2016</td>
                        <td>12/11/2016</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-warning" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Website Redesign</td>
                        <td>10/10/2016</td>
                       <td>12/11/2016</td>
                        <td><span class="label label-success">In Progress</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Mockup Design</td>
                         <td>10/10/2016</td>
                         <td>12/11/2016</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-primary" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Admin Panel design</td>
                        <td>10/10/2016</td>
                        <td>12/11/2016</td>
                        <td><span class="label label-success">In Progress</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Front End Design</td>
                        <td>10/10/2016</td>
                        <td>12/11/2016</td>
                        <td><span class="label label-danger">On Hold</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-danger" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Software Testing</td>
                        <td>10/10/2016</td>
                        <td>12/11/2016</td>
                        <td><span class="label label-success">In Progress</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-success" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>Admin Panel design</td>
                        <td>10/10/2016</td>
                        <td>12/11/2016</td>
                        <td><span class="label label-danger">On Hold</span></td>
                        <td><div class="progress progress-striped progress-sm">
                          <div class="progress-bar progress-bar-danger" style="width: 25%;"></div>
                        </div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

            </div>
           </div>
        <!-- Start inbox widget-->
       </div>
       <!--End row-->


@stop