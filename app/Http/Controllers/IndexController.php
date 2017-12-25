<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Logic\User\UserRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\About;
use App\Models\Taxonomy;
use App\Models\Service;
use App\Models\Location;
use App\Models\Organization;
use App\Services\Numberformat;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index()
    {
        $services = Service::all();
        $locations = Location::all();
        $taxonomys = Taxonomy::all();
        $organizations = Organization::all();
        $taxonomies = Taxonomy::where('parent_name', '=', '')->get();
        $allTaxonomies = Taxonomy::pluck('name','taxonomy_id')->all();
        // return $tree;
        //return view('files.treeview',compact('tree'));
        $posts = $this->post->first();
        $service_name = '&nbsp;';
        $location_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $service_type_name = '&nbsp;';
        $quantity_organizations = DB::table('organizations')->count();
        $budget = DB::table('expenses')->sum('year1_forecast');
        $budgetclass = new Numberformat();
        $budgets = $budgetclass->custom_number_format($budget, 2);
        $quantity_services = DB::table('services')->count();
        $quantity_project = DB::table('projects')->count();
        $quantity_projects = $budgetclass->custom_number_format($quantity_project, 2);

        $filter = collect([$service_type_name, $location_name, $organization_name, $service_name]);
        $location_map = DB::table('locations')->leftjoin('address', 'locations.address', 'like', DB::raw("concat('%', address.address_id, '%')"))->get();
        return view('frontend.home', compact('posts','taxonomies','allTaxonomies','services','locations','organizations', 'taxonomys','filter', 'location_map', 'quantity_organizations', 'budgets', 'quantity_services', 'quantity_projects'));
    }
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function about()

    {
        $services = Service::all();
        $locations = Location::all();
        $taxonomys = Taxonomy::all();
        $organizations = Organization::all();
        $taxonomies = Taxonomy::where('parent_name', '=', '')->get();
        $allTaxonomies = Taxonomy::pluck('name','taxonomy_id')->all();
        // return $tree;
        //return view('files.treeview',compact('tree'));
        $abouts = DB::table('abouts')->first();
        $service_name = '&nbsp;';
        $location_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $service_type_name = '&nbsp;';
        $filter = collect([$service_type_name, $location_name, $organization_name, $service_name]);
        return view('frontend.about', compact('abouts','taxonomies','allTaxonomies','services','locations','organizations', 'taxonomys','filter'));
    }


    public function get_involved()

    {
        $services = Service::all();
        $locations = Location::all();
        $taxonomys = Taxonomy::all();
        $organizations = Organization::all();
        $taxonomies = Taxonomy::where('parent_name', '=', '')->get();
        $allTaxonomies = Taxonomy::pluck('name','taxonomy_id')->all();
        // return $tree;
        //return view('files.treeview',compact('tree'));
        $involves = DB::table('involves')->first();
        $service_name = '&nbsp;';
        $location_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $service_type_name = '&nbsp;';
        $filter = collect([$service_type_name, $location_name, $organization_name, $service_name]);
        return view('frontend.get', compact('involves','taxonomies','allTaxonomies','services','locations','organizations', 'taxonomys','filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function bd_nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));
        
        // is this a number?
        if(!is_numeric($n)) return false;
        
        // now filter it;
        if($n>1000000000000) return round(($n/1000000000000),1).' trillion';
        else if($n>1000000000) return round(($n/1000000000),1).' billion';
        else if($n>1000000) return round(($n/1000000),1).' million';
        else if($n>1000) return round(($n/1000),1).' thousand';
        
        return number_format($n);
    }
}
