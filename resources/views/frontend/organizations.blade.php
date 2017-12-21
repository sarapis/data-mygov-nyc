@include('layouts.style')
<style>
  .thumbnail{
    min-height: 360px;
  }
</style>
<title>All Oragnizations</title>

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
                        All Organizations</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-desktop"></i>&nbsp;<a href="/organization">Organizations</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
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
                            <div class="panel">
                                <div class="panel-body">
                                  <!-- search form -->
                                  <div class="row">
                                    
                                      <div class="col-sm-4 col-md-4">
                                        <div class="input-group col-md-12">
                                          <form action="/pages/agencies/find" method="POST" class="form-group">  
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="text" class="form-control" placeholder="Search" name="find" style="margin-top: 0;width: calc(100% - 40px);"> 
                                            <span class="input-group-btn">
                                              <button class="btn btn-secondary" id="mysearchbutton" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </span>
                                          </form>
                                        </div>            
                                      </div>
                                      <div class="col-sm-8 col-md-8">
                                      <h4><b style="margin-left:30px;"> Total Cost</b> <a href="/pages/agencies/totalcostdesc"> <i class="fa fa-sort-amount-desc" aria-hidden="true"></i> </a><a href="/pages/agencies/totalcostasc"> <i class="fa fa-sort-amount-asc" aria-hidden="true"></i> </a><b style="margin-left:65px; "> Projects </b> <a href="/pages/agencies/projectsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/pages/agencies/projectsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a><b style="margin-left:65px;"> Commitments </b><a href="/pages/agencies/commitmentsdesc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a><a href="/pages/agencies/commitmentsasc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></h4>

                                      </div>
                                    
                                  </div> 
                                  <!-- /.search form -->
                                  <!-- Your Page Content Here -->
                                  <div class="row" id="row">
                                      @foreach ($organizations as $organization)
                                        <div class="col-md-6 col-md-4">
                                          <div class="thumbnail">
                                            <div class="caption pal" id="tblData">
                                                <a href="/organization_{{$organization->organizations_id}}" style="font-size: 20px;">{{$organization->name}}<p style="display: inline; font-size: 16px;"> ({{$organization->alternate_name}})</p></a>
                                                <p style="font-size: 16px;padding-top: 10px;">{{str_limit($organization->description, 200)}}</p>
                                                <p>Services: @if($organization->services!=null)
                                                  {{sizeof(explode(",", $organization->services))}}
                                                    @else 0 @endif</p>
                                                <p>Projects: @if($organization->projects!=null)
                                                  {{sizeof(explode(",", $organization->projects))}}
                                                    @else 0 @endif</p>
                                                <p>Expense Budget: @if($organization->expenses_budgets!=null)${{number_format($organization->expenses_budgets)}} @else $0 @endif</p>
                                                <p>Projects Budget: @if($organization->total_project_cost!=null)${{number_format($organization->total_project_cost)}} @else $0 @endif</p>                
                                            </div>
                                          </div>
                                        </div>
                                      @endforeach
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
@include('layouts.script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5XHJ6oNL9-qh0XsL0G74y1xbcxNGkSxw&callback=initMap"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
 <script type="text/javascript">

    var locations = <?php print_r(json_encode($location_map)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: 40.712722,
      lng: -74.006058,
      zoom:10
    });

    $.each( locations, function( index, value ){
        mymap.addMarker({
          lat: value.latitude,
          lng: value.longitude,
          title: value.name,
          infoWindow: {
            content: ('<a href="location_'+value.location_id+'">'+value.name+'</a></br>' +value.address_1+', ' +value.city+', '+value.state_province+', '+value.postal_code)
        }
        });
   });

  </script>