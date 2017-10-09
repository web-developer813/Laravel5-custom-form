<?php
namespace  App\Http\Controllers;


use App\contact;
use App\management_company;
use App\property_phone;
use Illuminate\Http\Request;
use App\User;
use App\role;
use App\source;
use App\bid_status;
use App\property;
use App\user_role;
use App\property_type;
use App\mail_to_type;
use App\phone_type;
use App\contact_type;
use App\property_contact;
use App\property_comment;
use App\property_management_company;
use App\property_management_company_contact;
use App\property_management_company_phone;
use App\bid_type;
use App\bid_template;
use View;
use Response;
use Validator;
use Session;


class BidController extends Controller{

    public function index(Request $request){

    }
    public function create(Request $request){
        $bidTypes = bid_type::pluck('name','id')->put('','Select Bid Type');
        $bidTemplates = bid_template::pluck('name','id')->put('','Select Bid Template');
        return view('bid.create',compact('request', 'bidTypes','bidTemplates'));
    }
    public function store(Request $request){

    }
}