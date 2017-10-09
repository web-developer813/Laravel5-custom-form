<?php
namespace  App\Http\Controllers;


use App\property_contact;
use App\property_management_company;
use App\property_management_company_contact;
use App\property_management_company_phone;
use App\property_phone;
use App\request_comment;
use Illuminate\Http\Request;
use App\User;
use App\role;
use App\source;
use App\bid_status;
use App\property;
use App\user_role;
use App\request as RequestModel;
use View;
use Response;
use Redirect;
use Validator;
class RequestController extends Controller
{
    public function index(Request $request){
        $requests = RequestModel::whereRaw(true)->paginate('10');
        return view('request.index',compact('request', 'requests'));
    }
    public  function destroy(Request $request){
        $request_id = $request->input('id');
        RequestModel::findOrFail($request_id)->delete();
        $message = 'Request  has been deleted successfully';
        return Response::json(['result' => 'success', 'id' =>$request_id,'message' =>$message]);
    }
    public function create(Request $request)
    {
        $sources = source::pluck('source_name','id')->put('','Select Source');
        $bidStatus = bid_status::pluck('bid_status_name','id')->put('','Select Status');
        $estimator_role = role::where('role_name','estimator')->first();
        $estimator_users = user_role::where('role_id',$estimator_role->id)->get();
        return View('request.create',compact('request', 'sources','bidStatus','estimator_users'));
    }

    public function store(Request $request){
        $messages = [
            'source_id.required' =>'The source  field is required.',
            'bid_statuses_id.required' =>'The bid status  field is required.',
            'estimator_id.required' =>'The estimator  field is required.',
        ];
        $this->validate($request, [
            'requestor_name' =>'required|max:255',
            'scope' =>'required|max:255',
            'details'  =>'required',
            'source_id' =>'required',
            'bid_statuses_id' =>'required',
            'estimator_id'  =>'required',
        ],$messages);

        $request_id = $request->input('request_id');
        if($request_id != ""){
            $requestModel = RequestModel::where('id', $request_id)->first();
            $requestModel->update($request->all());
        }else{
            $requestModel = RequestModel::create($request->all());
        }
        return Redirect::route('request.edit',$requestModel->id);
    }
    public function edit(Request $request,$id){
        $request_id = $id;
        $params = array();
        $requestModel = requestModel::where('id',$request_id)->first();
        $params['requestModel']  = $requestModel;
        $params['request_comments'] = request_comment::where('request_id',$request_id)->get();
        $params['sources'] = source::pluck('source_name','id')->put('','Select Source');
        $params['bidStatus'] = bid_status::pluck('bid_status_name','id')->put('','Select Status');
        $estimator_role = role::where('role_name','estimator')->first();
        $params['estimator_users'] = user_role::where('role_id',$estimator_role->id)->get();

        if(isset($requestModel->property_id) && $requestModel->property_id !=0){
            $params['property'] = property::where('id',$requestModel->property_id)->first();
        }
        if(isset($requestModel->property_phone_id) && $requestModel->property_phone_id !=0){
            $params['property_phone'] = property_phone::where('id',$requestModel->property_phone_id)->first();
        }
        if(isset($requestModel->property_contact_id) && $requestModel->property_contact_id !=0){
            $params['property_contact'] = property_contact::where('id',$requestModel->property_contact_id)->first();
        }
        if(isset($requestModel->property_contact_phone_id) && $requestModel->property_contact_phone_id !=0){
            $params['property_contact_phone'] = property::where('id',$requestModel->property_contact_phone_id)->first();
        }

        if(isset($requestModel->property_company_id) && $requestModel->property_company_id !=0){
            $params['property_management_company'] = property_management_company::where('id',$requestModel->property_company_id)->first();
        }

        if(isset($requestModel->property_company_phone_id) && $requestModel->property_company_phone_id !=0){
            $params['property_management_company_phone'] = property_management_company_phone::where('id',$requestModel->property_company_phone_id)->first();
        }
        if(isset($requestModel->property_company_contact_id) && $requestModel->property_company_contact_id !=0){
            $params['property_management_company_contact'] = property_management_company_contact::where('id',$requestModel->property_company_contact_id)->first();
        }


        return View::make('request.edit')->with($params);
    }

    public function request_comment_store(Request $request){
        $validator = Validator::make($request->all(),[
            'comment' =>'required'
        ]);
        if($validator->fails()){
            $err_msg = "";
            foreach($validator->errors()->getMessages() as $field=>$rules) {
                foreach($rules as $rule) {
                    $err_msg .= $rule."<br>";
                }
            }
            return Response::json(['result' =>'failed', 'message' =>$err_msg]);
        }else{
            $request_comment_id = $request->input('request_comment_id');
            if($request_comment_id != ""){
                $request_comment = request_comment::where('id',$request_comment_id)->first();
                $request_comment->update($request->all());
            }else{
                $request_comment = request_comment::create($request->all());
            }
            $request_id = $request->input('request_id');
            $params = array();
            $params['request_comments'] = request_comment::where('request_id',$request_id)->get();
            if($request_comment_id != ""){
                $params['request_comment']=request_comment::where('id',$request_comment_id)->first();
            }
            $requestCommentList= View::make('request/comment_table')->with($params)->__toString();

            return Response::json(['result'=>'success', 'comment_list'=>$requestCommentList]);
        }
    }
    public function request_comment_edit(Request $request){
        $request_id = $request->input('request_id');
        $request_comment_id = $request->input('request_comment');
        $params = array();
        $params['requestModel'] = requestModel::where('id', $request_id)->first();

        if($request_comment_id !=""){
            $params['request_comment'] = request_comment::where('id', $request_comment_id)->first();
        }

        $propertyCommentShowList =View::make('request/comment_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'comment_list'=>$propertyCommentShowList]);
    }


    public function request_file_store(Request $request){

    }

    public function request_file_edit(Request $request){

    }
}