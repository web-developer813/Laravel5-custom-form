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
use View;
use Response;
use Validator;
use Session;


class PropertyController extends Controller{

    public function search(Request $request){
        $property_name = $request->input('assign_property_name');
        $property_street = $request->input('assign_property_street');
        $property_city = $request->input('assign_property_city');
        $property_state = $request->input('assign_property_state');

        $properties_query = property::whereRaw(true);
        if($property_name !=""){
            $properties_query = $properties_query->where('property_name',$property_name);
        }
        if($property_street !=""){
            $properties_query = $properties_query->where('property_street',$property_street);
        }
        if($property_city !=""){
            $properties_query = $properties_query->where('property_city',$property_city);
        }
        if($property_city !=""){
            $properties_query = $properties_query->where('property_state',$property_state);
        }
        $properties = $properties_query->get();

        $params = array();
        $params['properties'] = $properties;
        $showList=View::make('property/search_show')->with($params)->__toString();
        return Response::json(['result'=>'success', 'list'=>$showList]);
    }
    public function show(Request $request){
        $params = array();
        $property_id = $request->input('property_radio');
        $property =property::where('id',$property_id)->first();
        $params['property'] =$property;
        $propertyPhoneShowList = $this->property_phone_show($property->id);
        $propertyContactShowList = $this->property_contact_show($property->id);
        $propertyCommentShowList = $this->property_comment_show($property->id);
        $propertyCompanyShowList = $this->property_company_show($property->id);
        return Response::json(['result'=>'success', 'phone_list'=>$propertyPhoneShowList, 'contact_list' =>$propertyContactShowList,
            'comment_list' =>$propertyCommentShowList, 'company_list' =>$propertyCompanyShowList]);
    }
    public function getAssignProperty(){
        $params = array();
        $params['properties'] = property::get();
        $showList=View::make('property/search')->with($params)->__toString();
        return Response::json(['result'=>'success', 'list'=>$showList]);
    }

    public function getNewProperty(){
        $params = array();
        $params['property_types'] = property_type::pluck('name','id')->put('', 'Select Property Type');
        $params['mail_to_types'] = mail_to_type::pluck('name','id')->put('', 'Select Mail To Type');
        $showList=View::make('property/create')->with($params)->__toString();
        return Response::json(['result'=>'success', 'list'=>$showList]);
    }

    public function getEditProperty(Request $request){
        $params = array();
        $property_id = $request->input('edit_property');
        $params['property_types'] = property_type::pluck('name','id')->put('', 'Select Property Type');
        $params['mail_to_types'] = mail_to_type::pluck('name','id')->put('', 'Select Mail To Type');
        $params['property'] = property::where('id',$property_id)->first();
        $showList=View::make('property/create')->with($params)->__toString();
        return Response::json(['result'=>'success', 'list'=>$showList]);
    }

    public  function property_store(Request $request){
        $messages = [
            'property_name.required' =>'The property name  field is required.',
            'property_type_id.required' =>'The property type  field is required.',
            'mail_to_type_id.required' =>'The mail to type  field is required.',
        ];
        $validator = Validator::make($request->all(),[
            'property_name' =>'required|max:255',
            'property_type_id' =>'required',
            'mail_to_type_id' =>'required',
        ],$messages);

        if($validator->fails()){
            $err_msg = "";
            foreach($validator->errors()->getMessages() as $field=>$rules) {
                foreach($rules as $rule) {
                    $err_msg .= $rule."<br>";
                }
            }
            return Response::json(['result' =>'failed', 'message' =>$err_msg]);
        }else{
            $property_id = $request->input('property_id');
            if($property_id !=""){
                $property = property::where('id',$property_id)->first();
                $property->update($request->all());
            }else{
                $property = property::create($request->all());
            }
            $propertyPhoneShowList = $this->property_phone_show($property->id);
            $propertyContactShowList = $this->property_contact_show($property->id);
            $propertyCommentShowList = $this->property_comment_show($property->id);
            $propertyCompanyShowList = $this->property_company_show($property->id);
            Session::forget('assign_property_management_company_id');
            return Response::json(['result'=>'success', 'phone_list'=>$propertyPhoneShowList, 'contact_list' =>$propertyContactShowList,
                'comment_list' =>$propertyCommentShowList, 'company_list' =>$propertyCompanyShowList]);
        }
    }

    //Show Functions Start
    function property_phone_show($id, $property_phone_id =null ){
        $params = array();
        $property = property::where('id', $id)->first();
        $params['property'] = $property;
        $params['property_phone_types'] = phone_type::pluck('name','id')->put('', 'Select Phone Type');
        $params['property_phones'] =property_phone::where('property_id',$property->id)->get();
        if($property_phone_id != ""){
            $params['property_phone'] = property_phone::findOrFail($property_phone_id);
        }else{
//            $params['property_phone'] = "";
        }
        $showList=View::make('property/phone')->with($params)->__toString();
        return $showList;
    }
    function property_company_phone_show($id,$property_company_id, $property_company_phone_id =null ){
        $params = array();
        $property = property::where('id', $id)->first();
        $params['property'] = $property;
        $params['property_phone_types'] = phone_type::pluck('name','id')->put('', 'Select Phone Type');
        $params['property_company_phones'] =property_management_company_phone::where('property_id',$property->id)->where('property_company_id',$property_company_id)->get();
        if($property_company_phone_id != ""){
            $params['property_phone'] = property_management_company_phone::findOrFail($property_company_phone_id);
        }
        $params['property_management_company'] = property_management_company::where('id',$property_company_id)->first();
        $showList=View::make('property/company_phone')->with($params)->__toString();
        return $showList;
    }

    function property_contact_show($id,$property_contact_id = null){
        $params = array();
        $property = property::where('id', $id)->first();
        $params['property'] = $property;
        $params['contact_types'] = contact_type::pluck('name','id')->put('', 'Select Contact Type');
        $params['property_contacts'] =property_contact::where('property_id',$property->id)->get();
        $showList=View::make('property/contact')->with($params)->__toString();
        return $showList;
    }
    function property_company_contact_show($id,$property_company_id,$property_company_contact_id = null){
        $params = array();
        $property = property::where('id', $id)->first();
        $params['property'] = $property;
        $params['contact_types'] = contact_type::pluck('name','id')->put('', 'Select Contact Type');
        $params['property_company_contacts'] =property_management_company_contact::where('property_id',$property->id)->where('property_company_id',$property_company_id)->get();
        $params['property_management_company'] = property_management_company::where('id',$property_company_id)->first();
        $showList=View::make('property/company_contact')->with($params)->__toString();
        return $showList;
    }
    function property_comment_show($id , $property_comment_id = null ){
        $params = array();
        $property = property::where('id', $id)->first();
        $params['property'] = $property;
        $params['property_comments'] = property_comment::where('property_id',$property->id)->get();
        $showList=View::make('property/comment')->with($params)->__toString();
        return $showList;
    }

    function property_company_show($id, $property_company_id = null){
        $params = array();
        $property = property::where('id', $id)->first();
        $params['property'] = $property;
        $params['property_companies'] = property_management_company::where('property_id',$property->id)->get();
        $showList=View::make('property/company')->with($params)->__toString();
        return $showList;

    }

    //Show Functions End

    //Property Phone Function Start
    public function property_phone_store(Request $request){
        $messages = [
            'phone_type_id.required' =>'The phone type  field is required.',
        ];
        $validator = Validator::make($request->all(),[
            'phone_type_id' =>'required',
            'area_code' =>'required|max:255',
            'phone_number' =>'required|max:255',
            'phone_ext' =>'required|max:255'
        ],$messages);

        if($validator->fails()){
            $err_msg = "";
            foreach($validator->errors()->getMessages() as $field=>$rules) {
                foreach($rules as $rule) {
                    $err_msg .= $rule."<br>";
                }
            }
            return Response::json(['result' =>'failed', 'message' =>$err_msg]);
        }else{
            $property_phone_id = $request->input('property_phone_id');
            if($property_phone_id != ""){
                $property_phone = property_phone::where('id',$property_phone_id)->first();
                $property_phone->update($request->all());
            }else{
                $property_phone = property_phone::create($request->all());
            }
            $property_id = $request->input('property_id');
            $property = property::findOrFail($property_id);
            if($property_phone_id != ""){
                $propertyPhoneShowList = $this->property_phone_show($property->id, $property_phone_id);
            }else{
                $propertyPhoneShowList = $this->property_phone_show($property->id);
            }

            return Response::json(['result'=>'success', 'phone_list'=>$propertyPhoneShowList]);
        }
    }

    public function property_phone_edit(Request $request){
        $property_phone_id = $request->input('edit_phone');
        $params = array();
        $params['property_phone_types'] = phone_type::pluck('name','id')->put('', 'Select Phone Type');
        if($property_phone_id != ""){
            $property_phone = property_phone::where('id',$property_phone_id)->first();
            //  $propertyPhoneShowList = $this->property_phone_show($property_phone->property_id, $property_phone_id);
            $params['property_phone'] = $property_phone;
            $params['property'] = property::findOrFail($property_phone->property_id);
        }else{
            $property_id = $request->input('property_id');
            $params['property'] = property::findOrFail($property_id);
        }
        $propertyPhoneShowList =View::make('property/phone_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'phone_list'=>$propertyPhoneShowList]);
    }
//Property Phone Function End

//Property Contact Function Start
    public function property_contact_store(Request $request){
        $messages = [
            'contact_type_id.required' =>'The contact type  field is required.',
        ];
        $validator = Validator::make($request->all(),[
            'contact_type_id' =>'required',
            'first_name' =>'required|max:255',
            'last_name' =>'required|max:255',
            'email' =>'required|email'
        ],$messages);

        if($validator->fails()){
            $err_msg = "";
            foreach($validator->errors()->getMessages() as $field=>$rules) {
                foreach($rules as $rule) {
                    $err_msg .= $rule."<br>";
                }
            }
            return Response::json(['result' =>'failed', 'message' =>$err_msg]);
        }else{
            $property_contact_id = $request->input('property_contact_id');
            if($property_contact_id != ""){
                $property_contact = property_contact::where('id',$property_contact_id)->first();
                $property_contact->update($request->all());
            }else{
                property_contact::create($request->all());
            }
            $property_id = $request->input('property_id');
            $property = property::findOrFail($property_id);
            if($property_contact_id != ""){
                $propertyContactShowList = $this->property_contact_show($property->id,$property_contact_id);
            }else{
                $propertyContactShowList = $this->property_contact_show($property->id);
            }

            return Response::json(['result'=>'success', 'contact_list'=>$propertyContactShowList]);

        }
    }

    public function property_contact_edit(Request $request){
        $property_contact_id = $request->input('edit_contact');
        $params = array();
        $params['contact_types'] = contact_type::pluck('name','id')->put('', 'Select Contact Type');
        if($property_contact_id !=""){
            $property_contact = property_contact::where('id',$property_contact_id)->first();
            $params['property_contact'] = $property_contact;
            $params['property'] = property::findOrFail($property_contact->property_id);
        }else{
            $property_id = $request->input('property_id');
            $params['property'] = property::findOrFail($property_id);
        }
        $propertyContactShowList =View::make('property/contact_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'contact_list'=>$propertyContactShowList]);
    }
//Property Contact Function End
//Property Comment Function Start
    public function property_comment_store(Request $request){
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
            $property_comment_id = $request->input('property_comment_id');
            if($property_comment_id != ""){
                $property_comment = property_comment::where('id',$property_comment_id)->first();
                $property_comment->update($request->all());
            }else{
                $property_comment = property_comment::create($request->all());
            }
            $property_id = $request->input('property_id');
            $property = property::findOrFail($property_id);
            if($property_comment_id != ""){
                $propertyCommentShowList = $this->property_comment_show($property->id, $property_comment_id);
            }else{
                $propertyCommentShowList = $this->property_comment_show($property->id);
            }
            return Response::json(['result'=>'success', 'comment_list'=>$propertyCommentShowList]);
        }
    }

    public function property_comment_edit(Request $request){
        $property_comment_id = $request->input('edit_comment');
        $params = array();
        if($property_comment_id !=""){
            $property_comment = property_comment::where('id',$property_comment_id)->first();
            $params['property_comment'] = $property_comment;
            $params['property'] = property::findOrFail($property_comment->property_id);
        }else{
            $property_id = $request->input('property_id');
            $params['property'] = property::findOrFail($property_id);
        }
        $propertyCommentShowList =View::make('property/comment_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'comment_list'=>$propertyCommentShowList]);
    }
    //Property Comment Function End
    //Property Company Function Start
    public function property_company_edit(Request $request){
        $property_company_id = $request->input('edit_company');
        $params = array();
        if($property_company_id !=""){
            $property_company = property_management_company::where('id',$property_company_id)->first();
            $params['property_company'] = $property_company;
            $params['property'] = property::findOrFail($property_company->property_id);
        }else{
            $property_id = $request->input('property_id');
            $params['property'] = property::findOrFail($property_id);
        }
        $propertyCompanyShowList =View::make('property/company_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'company_list'=>$propertyCompanyShowList]);
    }

    public function property_company_store(Request $request){
        $validator = Validator::make($request->all(),[
            'management_company' =>'required',
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
            $property_company_id = $request->input('property_company_id');
            if($property_company_id != ""){
                $property_company = property_management_company::where('id',$property_company_id)->first();
                $property_company->update($request->all());
            }else{
                property_management_company::create($request->all());
            }
            $property_id = $request->input('property_id');
            $property = property::findOrFail($property_id);
            if($property_company_id != ""){
                $propertyCompanytShowList = $this->property_company_show($property->id,$property_company_id);
            }else{
                $propertyCompanytShowList = $this->property_company_show($property->id);
            }

            return Response::json(['result'=>'success', 'company_list'=>$propertyCompanytShowList]);

        }
    }
    public function property_company_assign(Request $request){
        $property_company_id = $request->input('edit_company');
        $params = array();
        $property_company = property_management_company::where('id',$property_company_id)->first();
        $params['property_company'] = $property_company;
        $params['property'] = property::findOrFail($property_company->property_id);
        $propertyCompanyShowList =View::make('property/company_assign')->with($params)->__toString();
        Session::set('assign_property_management_company_id',$property_company_id);
        $propertyCompanyPhoneShowList = $this->property_company_phone_show($property_company->property_id,$property_company_id);
        $propertyCompanyContactShowList  = $this->property_company_contact_show($property_company->property_id, $property_company_id);

        return Response::json(['result'=>'success', 'company_list'=>$propertyCompanyShowList,'company_phone_list' =>$propertyCompanyPhoneShowList, 'company_contact_list' =>$propertyCompanyContactShowList]);
    }

    public function property_company_phone_edit(Request $request){
        $property_company_phone_id = $request->input('edit_company_phone');
        $property_company_id = $request->input('property_company_id');

        $params = array();
        $params['property_phone_types'] = phone_type::pluck('name','id')->put('', 'Select Phone Type');
        $params['property_management_company'] = property_management_company::where('id',$property_company_id)->first();
        if($property_company_phone_id !=""){
            $property_company_phone = property_management_company_phone::where('id',$property_company_phone_id)->first();
            $params['property_company_phone'] = $property_company_phone;
            $params['property'] = property::findOrFail($property_company_phone->property_id);
        }else{
            $property_id = $request->input('property_id');
            $params['property'] = property::findOrFail($property_id);
        }
        $propertyCompanyShowList =View::make('property/company_phone_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'company_phone_list'=>$propertyCompanyShowList]);
    }

    public function property_company_phone_store(Request $request){
        $messages = [
            'phone_type_id.required' =>'The phone type  field is required.',
            'property_company_id.required' =>"The assign management company filed is required."
        ];
        $validator = Validator::make($request->all(),[
            'phone_type_id' =>'required',
            'area_code' =>'required|max:255',
            'phone_number' =>'required|max:255',
            'phone_ext' =>'required|max:255',
            'property_company_id' =>'required'
        ],$messages);

        if($validator->fails()){
            $err_msg = "";
            foreach($validator->errors()->getMessages() as $field=>$rules) {
                foreach($rules as $rule) {
                    $err_msg .= $rule."<br>";
                }
            }
            return Response::json(['result' =>'failed', 'message' =>$err_msg]);
        }else{
            $property_company_phone_id = $request->input('property_company_phone_id');
            if($property_company_phone_id != ""){
                $property_company_phone = property_management_company_phone::where('id',$property_company_phone_id)->first();
                $property_company_phone->update($request->all());
            }else{
                $property_company_phone = property_management_company_phone::create($request->all());
            }
            $property_id = $request->input('property_id');
            $property_company_id = $request->input('property_company_id');
            $property = property::findOrFail($property_id);
            if($property_company_phone_id != ""){
                $propertyCompanyPhoneShowList = $this->property_company_phone_show($property->id, $property_company_id,$property_company_phone_id);
            }else{
                $propertyCompanyPhoneShowList = $this->property_company_phone_show($property->id,$property_company_id);
            }

            return Response::json(['result'=>'success', 'company_phone_list'=>$propertyCompanyPhoneShowList]);
        }
    }

    public function property_company_contact_edit(Request $request){
        $property_company_contact_id = $request->input('edit_company_contact');
        $property_company_id = $request->input('property_company_id');
        $params = array();
        $params['contact_types'] = contact_type::pluck('name','id')->put('', 'Select Contact Type');
        $params['property_management_company'] = property_management_company::where('id', $property_company_id)->first();
        if($property_company_contact_id !=""){
            $property_company_contact = property_management_company_contact::where('id',$property_company_contact_id)->first();
            $params['property_company_contact'] = $property_company_contact;
            $params['property'] = property::findOrFail($property_company_contact->property_id);
        }else{
            $property_id = $request->input('property_id');
            $params['property'] = property::findOrFail($property_id);
        }
        $propertyCompanyShowList =View::make('property/company_contact_edit')->with($params)->__toString();
        return Response::json(['result'=>'success', 'company_contact_list'=>$propertyCompanyShowList]);
    }
    public function property_company_contact_store(Request $request){
        $messages = [
            'contact_type_id.required' =>'The contact type  field is required.',
            'property_company_id.required' =>"The assign management company filed is required."
        ];
        $validator = Validator::make($request->all(),[
            'contact_type_id' =>'required',
            'first_name' =>'required|max:255',
            'last_name' =>'required|max:255',
            'email' =>'required|email'
        ],$messages);

        if($validator->fails()){
            $err_msg = "";
            foreach($validator->errors()->getMessages() as $field=>$rules) {
                foreach($rules as $rule) {
                    $err_msg .= $rule."<br>";
                }
            }
            return Response::json(['result' =>'failed', 'message' =>$err_msg]);
        }else{
            $property_company_contact_id = $request->input('property_company_contact_id');

            if($property_company_contact_id != ""){
                $property_company_contact = property_management_company_contact::where('id',$property_company_contact_id)->first();
                $property_company_contact->update($request->all());
            }else{
                property_management_company_contact::create($request->all());
            }
            $property_id = $request->input('property_id');
            $property_company_id = $request->input('property_company_id');
            $property = property::findOrFail($property_id);
            if($property_company_contact_id != ""){
                $propertyContactShowList = $this->property_company_contact_show($property->id,$property_company_id,$property_company_contact_id);
            }else{
                $propertyContactShowList = $this->property_company_contact_show($property->id,$property_company_id);
            }

            return Response::json(['result'=>'success', 'company_contact_list'=>$propertyContactShowList]);

        }
    }
    //Property Company Function End

}