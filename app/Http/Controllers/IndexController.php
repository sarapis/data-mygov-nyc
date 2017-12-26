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
use App\Models\Project;
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
        $organizations = Organization::all();
        $projects = Project::all();
        $service_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $project_name = '&nbsp;';
        $filter = collect([$organization_name, $service_name, $project_name]);
        // return $tree;
        //return view('files.treeview',compact('tree'));
        $posts = $this->post->first();
        $quantity_organizations = DB::table('organizations')->count();
        $budget = DB::table('expenses')->sum('year1_forecast');
        $budgetclass = new Numberformat();
        $budgets = $budgetclass->custom_number_format($budget, 2);
        $quantity_services = DB::table('services')->count();
        $quantity_project = DB::table('projects')->count();
        $quantity_projects = $budgetclass->custom_number_format($quantity_project, 2);

        $location_map = DB::table('locations')->leftjoin('address', 'locations.address', 'like', DB::raw("concat('%', address.address_id, '%')"))->get();
        return view('frontend.home', compact('posts','organizations', 'services','projects', 'filter', 'quantity_organizations', 'budgets', 'quantity_services', 'quantity_projects'));
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

    public function find(Request $request)
    {
        $find = $request->input('find');

        $services = Service::all();
        $organizations = Organization::all();
        $projects = Project::all();
        $service_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $project_name = '&nbsp;';
        $filter = collect([$service_name, $organization_name, $project_name]);

        $find_organizations= DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->get();
        $count_organizations = DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_services= DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->get();
        $count_services = DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_projects= DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->get();
        $count_projects = DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->count();
        $find_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->get();
        $count_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->count();
        return view('frontend.find', compact('services','projects','organizations', 'filter','find_organizations', 'find_services', 'find_projects', 'find_peoples', 'count_organizations', 'count_services', 'count_projects', 'count_peoples', 'find'));

    }

    public function findorganization($find)
    {
        $services = Service::all();
        $organizations = Organization::all();
        $projects = Project::all();
        $service_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $project_name = '&nbsp;';
        $filter = collect([$service_name, $organization_name, $project_name]);

        $find_organizations= DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->get();
        $count_organizations = DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_services= '';
        $count_services = DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_projects= '';
        $count_projects = DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->count();
        $find_peoples = '';
        $count_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->count();
        return view('frontend.find', compact('services','projects','organizations', 'filter','find_organizations', 'find_services', 'find_projects', 'find_peoples', 'count_organizations', 'count_services', 'count_projects', 'count_peoples', 'find'));

    }

    public function findservice($find)
    {

        $services = Service::all();
        $organizations = Organization::all();
        $projects = Project::all();
        $service_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $project_name = '&nbsp;';
        $filter = collect([$service_name, $organization_name, $project_name]);

        $find_organizations= '';
        $count_organizations = DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_services= DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->get();
        $count_services = DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_projects= '';
        $count_projects = DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->count();
        $find_peoples = '';
        $count_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->count();
        return view('frontend.find', compact('services','projects','organizations', 'filter','find_organizations', 'find_services', 'find_projects', 'find_peoples', 'count_organizations', 'count_services', 'count_projects', 'count_peoples', 'find'));

    }

    public function findproject($find)
    {
        $services = Service::all();
        $organizations = Organization::all();
        $projects = Project::all();
        $service_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $project_name = '&nbsp;';
        $filter = collect([$service_name, $organization_name, $project_name]);

        $find_organizations= '';
        $count_organizations = DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_services= '';
        $count_services = DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_projects= DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->get();
        $count_projects = DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->count();
        $find_peoples = '';
        $count_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->count();
        return view('frontend.find', compact('services','projects','organizations', 'filter','find_organizations', 'find_services', 'find_projects', 'find_peoples', 'count_organizations', 'count_services', 'count_projects', 'count_peoples', 'find'));

    }

    public function findpeople($find)
    {

        $services = Service::all();
        $organizations = Organization::all();
        $projects = Project::all();
        $service_name = '&nbsp;';
        $organization_name = '&nbsp;';
        $project_name = '&nbsp;';
        $filter = collect([$service_name, $organization_name, $project_name]);

        $find_organizations= '';
        $count_organizations = DB::table('organizations')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_services= '';
        $count_services = DB::table('services')->where('name', 'like', '%'.$find.'%')->orwhere('description', 'like', '%'.$find.'%')->count();
        $find_projects= '';
        $count_projects = DB::table('projects')->where('project_projectid', 'like', '%'.$find.'%')->orwhere('project_description', 'like', '%'.$find.'%')->count();
        $find_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->get();
        $count_peoples = DB::table('contacts')->where('name', 'like', '%'.$find.'%')->orwhere('office_title', 'like', '%'.$find.'%')->count();
        return view('frontend.find', compact('services','projects','organizations', 'filter','find_organizations', 'find_services', 'find_projects', 'find_peoples', 'count_organizations', 'count_services', 'count_projects', 'count_peoples', 'find'));

    }
}
