@include('layouts.style')
<title>Projects</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../css/treeview.css" rel="stylesheet">
<body onload="myFunction()">
<div id="mask" style="
    position: fixed;
    width: 100%;
    height: 100%;
    background: white;
    opacity: 0.8;
    background-color: white;
    z-index: 2000;
"></div>
<div id="loader"></div>
    <!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
     @include('layouts.header')
    <!--END TOPBAR-->
    
        <!--BEGIN SIDEBAR MENU-->
        @include('layouts.menu')
        <!--END SIDEBAR MENU-->

        <!--BEGIN PAGE WRAPPER-->
        <div id="wrapper">
        <div id="page-wrapper">
            @include('layouts.sidebar')
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title plxxl">
                        Projects</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="/">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                </ol>
                <div class="clearfix">
                </div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            <div id="tab-general">
                <div class="mbl">
                    <div class="col-lg-12">

                        <div class="col-md-12">
                            <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                            </div>
                        </div>

                    </div>

                    <div>
                        <button class="cornsilk btn-blue" style="position: absolute;top: 7px;left: auto;" id="menu-toggle">
                            <a href="" class="btn btn-secondary" style="padding: 0px;font-size: 25px;"><i class="fa  fa-search" style="color: #fff;font-size: 25px;"></i></a>
                        </button>
                   
                        <div class="page-content">
                            <div class="panel panel-blue">
                                <div class="panel-heading">
                                    <div class="row">
                                      <div class="col-sm-2">
                                        <h4 style="color: #fff;">Project</h4>
                                      </div>
                                      <div class="col-sm-4" style="padding-top: 3px;">
                                        <div class="dropdown">
                                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Type @if($projecttype!=''): {{$projecttype}}@endif
                                          <span class="caret"></span></button>
                                          <ul class="dropdown-menu">
                                          @foreach ($projecttypes as $projecttype)
                                            <li><a href="/projecttype_{{$projecttype->project_type}}">{{$projecttype->project_type}}</a></li>
                                          @endforeach
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="panel-body">
                                    <table id="example" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                          <tr class="info">
                                            <th>Project ID</th>
                                            <th>Agency</th>
                                            <th>Description</th>
                                            <th>#Commitments</th>
                                            <th>Total Cost &nbsp &nbsp&nbsp&nbsp&nbsp</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($projects as $project)
                                          <tr>
                                            <td><a href="/projects_{{$project->project_recordid}}"> {{$project->project_projectid}}</a></td>
                                            <td>{{$project->magencyname}}</td>
                                            <td>{{$project->project_description}}</td>
                                            <td>{{sizeof(explode(",", $project->project_commitments))}}</td>
                                            <td>${{number_format($project->project_totalcost)}}</td>
                                          </tr> 
                                          @endforeach
                                        </tbody>
                                    </table>
                                    <dir class="text-right">
                                   
                                    </dir>
                                </div>  
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>

            <!--BEGIN FOOTER-->
            <div id="footer">
                <div class="copyright">
                    <a href="#">&copy; ThemesGround 2015. Designed by ThemesGround </a></div>
            </div>
            <!--END FOOTER-->
        </div>
        <!--END CONTENT-->
    </div>
    <!--END PAGE WRAPPER-->
</body>
@include('layouts.script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 0);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("mask").style.display = "none";
}
</script>