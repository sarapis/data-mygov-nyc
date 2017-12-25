@extends('admin.layouts.dashboard') 

@section('template_title') Data Sync 
@endsection 

@section('template_fastload_css') 
@endsection 

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn-app{
  margin: 0;
}
.probar{
  width:80px;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Data Sync
        <small> {{ Lang::get('pages.dashboard-access-level',['access' => $access] ) }} </small>
      </h1>

    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Multiple Airtables -> MySQL</h3>
            </div>
            <div class="box-body">
              <p>Please click follow button.</p>
              <div class="btn">
                <button class="btn btn-app services">
                  <i class="fa fa-cogs"></i> Sevices
                </button>
                <p class="result1">
                  <img class="probar title1 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app locations">
                  <i class="fa fa-location-arrow"></i> Locations
                </button>
                <p class="result2">
                  <img class="probar title2 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app organizations">
                  <i class="fa  fa-bank"></i> Organizations
                </button>
                <p class="result3">
                  <img class="probar title3 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app phones">
                  <i class="fa fa-phone"></i> Phones
                </button>
                <p class="result4">
                  <img class="probar title4 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app contact">
                  <i class="fa fa-envelope"></i> Contact
                </button>
                <p class="result5">
                  <img class="probar title5 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app address">
                  <i class="fa fa-address-book"></i> Address
                </button>
                <p class="result6">
                  <img class="probar title6 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app schedule">
                  <i class="fa fa-calendar"></i> Schedule
                </button>
                <p class="result7">
                  <img class="probar title7 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app accessibility">
                  <i class="fa fa-universal-access"></i> Accessibility
                </button>
                <p class="result9">
                  <img class="probar title9 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app program">
                  <i class="fa fa-product-hunt"></i> Program
                </button>
                <p class="result10">
                  <img class="probar title10 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app service_area">
                  <i class="fa fa-map-marker"></i> Sevice area
                </button>
                <p class="result11">
                  <img class="probar title11 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app taxonomy">
                  <i class="fa fa-sitemap"></i> Taxonomy
                </button>
                <p class="result12">
                  <img class="probar title12 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app details">
                  <i class="fa fa-list-alt"></i> Details
                </button>
                <p class="result13">
                  <img class="probar title13 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app agency">
                  <i class="fa fa-calendar"></i> Agency
                </button>
                <p class="result8">
                  <img class="probar title8 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app project">
                  <i class="fa fa-calendar"></i> Projects
                </button>
                <p class="result14">
                  <img class="probar title14 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app commitment">
                  <i class="fa fa-calendar"></i> Commitments
                </button>
                <p class="result15">
                  <img class="probar title15 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
              <div class="btn">
                <button class="btn btn-app expenses">
                  <i class="fa fa-calendar"></i> Expenses
                </button>
                <p class="result16">
                  <img class="probar title16 hidden" id="title" src="images/xpProgressBar.gif" alt="Loading..." />
                </p>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
            </div>
        </div>
    </section>
</div>

@endsection 



    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.services').click(function() {
                $('.title1').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'services.php',
                    success: function(result){
                    $(".title1").addClass('hidden');
                    $(".result1").html("Updated");
                    }
                });
            });
            $('.locations').click(function() {
                $('.title2').removeClass('Updated');
                $.ajax({
                    type: "GET",
                    url : 'locations.php',
                    success: function(result){
                    $(".title2").addClass('hidden');
                    $(".result2").html("Updated");
                    }
                });
            });
            $('.organizations').click(function() {
                $('.title3').removeClass('Updated');
                $.ajax({
                    type: "GET",
                    url : 'organizations.php',
                    success: function(result){
                    $(".title3").addClass('hidden');
                    $(".result3").html("Updated");
                    }
                });
            });
            $('.phones').click(function() {
                $('.title4').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'phones.php',
                    success: function(result){
                    $(".title4").addClass('hidden');
                    $(".result4").html("Updated");
                    }
                });
            });
            $('.contact').click(function() {
                $('.title5').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'contacts.php',
                    success: function(result){
                    $(".title5").addClass('hidden');
                    $(".result5").html("Updated");
                    }
                });
            });
            $('.address').click(function() {
                $('.title6').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'address.php',
                    success: function(result){
                    $(".title6").addClass('hidden');
                    $(".result6").html("Updated");
                    }
                });
            });
            $('.schedule').click(function() {
                $('.title7').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'schedule.php',
                    success: function(result){
                    $(".title7").addClass('hidden');
                    $(".result7").html("Updated");
                    }
                });
            });
            $('.agency').click(function() {
                $('.title8').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'agency.php',
                    success: function(result){
                    $(".title8").addClass('hidden');
                    $(".result8").html("Updated");
                    }
                });
            });
            $('.accessibility').click(function() {
                $('.title9').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'accessibility.php',
                    success: function(result){
                    $(".title9").addClass('hidden');
                    $(".result9").html("Updated");
                    }
                });
            });
            $('.program').click(function() {
                $('.title10').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'programs.php',
                    success: function(result){
                    $(".title10").addClass('hidden');
                    $(".result10").html("Updated");
                    }
                });
            });
            $('.service_area').click(function() {
                $('.title11').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'area.php',
                    success: function(result){
                    $(".title11").addClass('hidden');
                    $(".result11").html("Updated");
                    }
                });
            });
            $('.taxonomy').click(function() {
                $('.title12').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'taxonomy.php',
                    success: function(result){
                    $(".title12").addClass('hidden');
                    $(".result12").html("Updated");
                    }
                });
            });
            $('.details').click(function() {
                $('.title13').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'details.php',
                    success: function(result){
                    $(".title13").addClass('hidden');
                    $(".result13").html("Updated");
                    }
                });
            });
            $('.project').click(function() {
                $('.title14').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'project.php',
                    success: function(result){
                    $(".title14").addClass('hidden');
                    $(".result14").html("Updated");
                    }
                });
            });
            $('.commitment').click(function() {
                $('.title15').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'commitment.php',
                    success: function(result){
                    $(".title15").addClass('hidden');
                    $(".result15").html("Updated");
                    }
                });
            });
            $('.expenses').click(function() {
                $('.title16').removeClass('hidden');
                $.ajax({
                    type: "GET",
                    url : 'commitment.php',
                    success: function(result){
                    $(".title16").addClass('hidden');
                    $(".result16").html("Updated");
                    }
                });
            });
        });
    </script>
