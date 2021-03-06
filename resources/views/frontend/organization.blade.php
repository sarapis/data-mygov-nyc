@include('layouts.style')
<style>
.nav.nav-tabs.nav-justified{
    border: 0;
    padding: .7rem;
    margin-bottom: -20px;
    background-color:#d9edf7;
    z-index: 2;
    position: relative;
    border-radius: 2px;
    box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
}
ul.nav.nav-tabs li a {
    background: #00aff0;
    color: #fff;
    background-color: #00aff0;
    background-image: -webkit-linear-gradient(#00aff0,#03a2dd);
    background-image: linear-gradient(#00aff0,#03a2dd);
    border-radius: 3px;
    border: 1px solid #0298d0;
    border-bottom: 1px solid #0298d0;
    box-shadow: inset 0 1px #21bef8, 2px 0 4px rgba(0,0,0,0.1), -2px 0 4px rgba(0,0,0,0.1);
}
.tab-content.card{
    box-shadow: none;
    border: 0px;
    padding: 0px;
}
.cornsilk.btn-blue{
    display: block !important;
}
.dataTables_length, .dataTables_filter{display: none;}
</style>
<title>{{$organization->name}} | Organization</title>

<div>

    <!--BEGIN BACK TO TOP-->
    <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
    <!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
     @include('layouts.header')
    <!--END TOPBAR-->
    
        <!--BEGIN SIDEBAR MENU-->
        @include('layouts.menu')
        <!--END SIDEBAR MENU-->
        <div id="wrapper">
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">
            @include('layouts.sidebar')
            <!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title plxxl">
                        Organization</div>
                </div>
                <div class="sharethis-inline-share-buttons col-md-4"></div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-desktop"></i>&nbsp;<a href="/organization">Organizations</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">{{$organization->name}}</li>
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
                            <div class="row">
                                <div class="col-lg-8" style="padding: 0;">

                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="note note-info"><h4 class="box-heading" style="font-size: 25px;">{{$organization->name}}</h4>

                                            <p><code> Alternate Name:</code> {{$organization->alternate_name}}</p>
                                            <p><code> Description:</code> {!! $organization->description !!}</p>
                                            <p><code> Email:</code> {{$organization->email}}</p>
                                            <p><code> Capital (Projects) Budget:</code> ${{number_format($organization->total_project_cost)}}</p>
                                            <p><code> Year 1 Expense Budget:</code> ${{number_format($organization->expenses_budgets)}}</p>
                                            <a class="btn-yellow btn-sm" href="{{$organization->website}}" target="_blank">Visit Website</a>
                                            @if($organization->checkbook!='')
                                            <a class="btn-orange btn-sm" href="{{$organization->checkbook}}" target="_blank">Visit Checkbook</a>
                                            @endif
                                            </div>

                                            <div>
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-justified" style="padding-right: 0;">
                                                    <li class="nav-item">
                                                        <a class="nav-link violet active" data-toggle="tab" href="#panel1" role="tab">Services @if($original_organization->services!='')
                                                        ({{sizeof(explode(",", $original_organization->services))}})
                                                        @else (int)(0) @endif</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Projects @if($organization->projects!=null)
                                                        ({{sizeof(explode(",", $organization->projects))}})
                                                        @else (int)(0) @endif</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">People @if($original_organization->contacts!='')
                                                        ({{sizeof(explode(",", $original_organization->contacts))}})
                                                        @else (int)(0) @endif</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#panel4" role="tab">Budgets</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panels -->
                                                <div class="tab-content card">
                                                    <!--Panel 1-->
                                                    <div class="tab-pane active" id="panel1" role="tabpanel">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        @if($organization_service!='')

                                                        <div id="grid-layout-table-1" class="box jplist">

                                                            <div class="jplist-ios-button"><i class="fa fa-sort"></i> Display Options</div>
                                                            <div class="jplist-panel box panel-top">
                                                                <button type="button" data-control-type="reset" data-control-name="reset" data-control-action="reset" class="jplist-reset-btn btn btn-default">Reset<i class="fa fa-share mls"></i></button>
                                                                <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" class="jplist-drop-down form-control">
                                                                    <ul class="dropdown-menu">
                                                                        <li><span data-number="3"> 3 per page</span></li>
                                                                        <li><span data-number="5"> 5 per page</span></li>
                                                                        <li><span data-number="10" data-default="true"> 10 per page</span></li>
                                                                        <li><span data-number="all"> view all</span></li>
                                                                    </ul>
                                                                </div>
                                                                <div data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-datetime-format="{month}/{day}/{year}" class="jplist-drop-down form-control">
                                                                    <ul class="dropdown-menu">
                                                                        <li><span data-path="default">Sort by</span></li>
                                                                        <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                                                                        <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                                                                        <li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
                                                                        <li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
                                                                        <li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
                                                                        <li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
                                                                        <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
                                                                        <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>
                                                                    </ul>
                                                                </div>
                                                                <div data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                                                <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" class="jplist-pagination"></div>
                                                            </div>
                                                            
                                                            <div class="box text-shadow">
                                                                <table class="demo-tbl">
                                                                    <!--<item>1</item>-->
                                                                   @foreach($organization_services as $organization_service)
                                                                    <tr class="tbl-item">
                                                                        
                                                                        <!--<data></data>-->
                                                                        <td class="td-block">

                                                                            <p class="title" style="font-size: 25px;"><a href="/service_{{$organization_service->service_id}}" style="color: #357ca5;">{{$organization_service->name}}</a></p>

                                                                            <p class="desc" style="font-size: 16px;"><a href="#" style="color: #00aff0;"></a></p>

                                                                            <div class="option" style="padding-left: 10px;padding-top: 5px;">

                                                                                <p class="desc" style="font-size: 16px; color: #000;"><i class="fa fa-fw fa-sitemap"></i>{{$organization_service->taxonomy_name}}</p>

                                                                                <p class="desc" style="font-size: 16px; color: #000;"><i class="fa fa-fw fa-phone-square"></i>{!! $organization_service->phone_numbers !!}</p>

                                                                                <p class="desc" style="font-size: 16px;">{!! $organization_service->description !!}</p>
                                                                            </div>
                                                                        </td>
                                                                        <!--<img/>-->
                                                                    </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                            
                                                            <div class="box jplist-no-results text-shadow align-center">
                                                                <p>No results found</p>
                                                            </div>
                                                            <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                                            <div class="jplist-panel box panel-bottom">
                                                                <div data-control-type="drop-down" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-drop-down form-control">
                                                                    <ul class="dropdown-menu">
                                                                        <li><span data-number="3"> 3 per page</span></li>
                                                                        <li><span data-number="5"> 5 per page</span></li>
                                                                        <li><span data-number="10" data-default="true"> 10 per page</span></li>
                                                                        <li><span data-number="all"> view all</span></li>
                                                                    </ul>
                                                                </div>
                                                                <div data-control-type="drop-down" data-control-name="sort" data-control-action="sort" data-control-animate-to-top="true" data-datetime-format="{month}/{day}/{year}" class="jplist-drop-down form-control">
                                                                    <ul class="dropdown-menu">
                                                                        <li><span data-path="default">Sort by</span></li>
                                                                        <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                                                                        <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                                                                        <li><span data-path=".desc" data-order="asc" data-type="text">Description A-Z</span></li>
                                                                        <li><span data-path=".desc" data-order="desc" data-type="text">Description Z-A</span></li>
                                                                        <li><span data-path=".like" data-order="asc" data-type="number" data-default="true">Likes asc</span></li>
                                                                        <li><span data-path=".like" data-order="desc" data-type="number">Likes desc</span></li>
                                                                        <li><span data-path=".date" data-order="asc" data-type="datetime">Date asc</span></li>
                                                                        <li><span data-path=".date" data-order="desc" data-type="datetime">Date desc</span></li>
                                                                    </ul>
                                                                </div>
                                                                <div data-type="{start} - {end} of {all}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging" class="jplist-label btn btn-default"></div>
                                                                <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="alert alert-danger"><strong>No Services!</strong></div>
                                                        @endif
                                                    </div>
                                                    <!--/.Panel 1-->
                                                    <!--Panel 2-->
                                                    <div class="tab-pane fade" id="panel2" role="tabpanel" style="overflow-x:auto;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        @if($organization->projects!='')
                                                        <table id="example" class="table table-striped table-hover table-bordered display nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr class="info">
                                                                    <th>Project ID</th>
                                                                    <th>Description</th>
                                                                    <th>Commitments</th>
                                                                    <th>Total Cost</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($organization_projects as $organization_project)
                                                                <tr>
                                                                    <td><a href="projects_{{$organization_project->project_recordid}}">{{$organization_project->project_projectid}}</a></td>
                                                                    <td>{{$organization_project->project_description}}</td>
                                                                    <td>{{sizeof(explode(",", $organization_project->project_commitments))}}</td>
                                                                    <td>${{number_format($organization_project->project_totalcost)}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @else
                                                         <div class="alert alert-danger"><strong>No Projects!</strong></div>
                                                        @endif
                                                    </div>
                                                    <!--/.Panel 2-->
                                                    <!--Panel 3-->
                                                    <div class="tab-pane fade" id="panel3" role="tabpanel" style="overflow-x:auto;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <table id="example1" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr class="info">
                                                                    <th>Name</th>
                                                                    <th>Organization</th>
                                                                    <th>Title</th>
                                                                    <th>Division</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($organization_peoples as $organization_people)
                                                                <tr>
                                                                    <td><a href="/people_{{$organization_people->contact_id}}"> {{$organization_people->name}}</a></td>
                                                                    <td>{{$organization->name}}</td>
                                                                    <td>{{$organization_people->office_title}}</td>
                                                                    <td>{{$organization_people->division_name}}
                                                                    @if($organization_people->parent_division!=''), {{$organization_people->parent_division}}@endif @if($organization_people->grand_parent_division!=''), {{$organization_people->grand_parent_division}}@endif
                                                                    @if($organization_people->great_grand_parent_division!=''), {{$organization_people->great_grand_parent_division}}@endif</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--/.Panel 3-->
                                                    <!--Panel 4-->
                                                    <div class="tab-pane fade" id="panel4" role="tabpanel" style="overflow-x:auto;">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <table class="table table-hover table-bordered">
                                                            <thead>
                                                            <tr class="info">
                                                                <th class="text-center">Budget</th>
                                                                <th class="text-center">Year 1</th>
                                                                <th class="text-center">Year 2</th>
                                                                <th class="text-center">Year 3</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                @foreach($organization_expenses as $organizaiton_expense)
                                                                <tr>
                                                                    <td class="text-center">{{$organizaiton_expense->line_number_description}}</td>
                                                                    <td class="text-center">${{number_format($organizaiton_expense->year1_forecast)}}</td>
                                                                    <td class="text-center">${{number_format($organizaiton_expense->year2_estimate)}}</td>
                                                                    <td class="text-center">${{number_format($organizaiton_expense->year3_estimate)}}</td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td class="text-center"><b>Total Dept.</b></td>
                                                                    <td class="text-center"><b>${{number_format($expenses_sum->expenses_year1)}}</b></td>
                                                                    <td class="text-center"><b>${{number_format($expenses_sum->expenses_year2)}}</b></td>
                                                                    <td class="text-center"><b>${{number_format($expenses_sum->expenses_year3)}}<b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"><b>Capital (Projects) Budgets</b></td>
                                                                    <td class="text-center" colspan="3"><b>${{number_format($organization->total_project_cost)}}<b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--/.Panel 4-->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4" style="padding: 0;">
                                    <div class="portlet box">
                                        <div class="portlet-header">
                                            <div id="mymap" style="width: 100%;"></div>
                                        </div>
                                        <div class="portlet-body">
                                            <p><code>Address:</code></p>
                                          
                                                @foreach($organization_map as $servicemap)
                                                @if($servicemap->location_id!=null)
                                                    <p><a href="location_{{$servicemap->location_id}}">{{$servicemap->name}}</a>: {{$servicemap->address_1}}, {{$servicemap->city}}, {{$servicemap->state_province}}, {{$servicemap->postal_code}}</p>
                                                @endif
                                                @endforeach
                                          
                                            <p><code>Contact:</code>{{$organization->contact}}</p>
                                            <p><code>Phones:</code>{{$organization->phone_number}}</p>
                                            
                                            @if($organization->logo!='')
                                                <img src="{{$organization->logo}}" class="img-responsive">
                                            @endif
                                        </div>
                                    </div>
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
</div>
</div>
@include('layouts.script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

    var locations = <?php print_r(json_encode($organization_map)) ?>;


    var mymap = new GMaps({
      el: '#mymap',
      lat: 40.712722,
      lng: -74.006058,
      zoom:10
    });

    $.each( locations, function( index, value){
        if (value.latitude && value.longitude) {

            mymap.addMarker({
                lat: value.latitude,
                lng: value.longitude,
                title: value.name,
                infoWindow: {
                content: ('<a href="location_'+value.location_id+'">'+value.name+'</a></br>' +value.address_1+', ' +value.city+', '+value.state_province+', '+value.postal_code)
                }
            });
        }
        if (value.project_lat && value.project_long) {
            mymap.addMarker({
                lat: value.project_lat,
                lng: value.project_long,
                title: value.project_projectid,
                infoWindow: {
                    content: ('<a style="color:red;" href="projects_'+value.project_recordid+'">'+value.project_projectid+'</a></br>')
                }
            });
        }
    });


</script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "pageLength": 25,
    });
    $('#example1').DataTable({
        "pageLength": 25
    });
} );
</script>