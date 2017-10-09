<div class="row">
    <div class="col-md-12" id="propertySearch">
        <div class="row">
            <div class="col-md-12 margin-bottom-50" id="propertySearchForm">
                {!! Form::open(array('route' =>array('property.search'), 'method' =>'post','id'=>'assignPropertySearch')) !!}
                <div class="form-group">
                    {!! Form::text('assign_property_name', old('assign_property_name') , ['class' => 'form-control', 'id' =>'assign_property_name','placeholder'=>"Property Name"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('assign_property_street', old('assign_property_street') , ['class' => 'form-control', 'id' =>'assign_property_street','placeholder'=>"Address"]) !!}
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                            {!! Form::text('assign_property_city', old('assign_property_city') , ['class' => 'form-control', 'id' =>'assign_property_city','placeholder'=>"City"]) !!}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                            {!! Form::text('assign_property_state', old('assign_property_state') , ['class' => 'form-control', 'id' =>'assign_property_state','placeholder'=>"State"]) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="onAssignPropertySearch()">Search</a>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="onAssignPropertyAddNew()">Add New</a>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-12 margin-bottom-50" id="propertiesTableShow">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row margin-bottom-20">
                            <div class="col-md-2 col-sm-2 col-xs-4 margin-bottom-20">
                                <span class="font-weight-900">Properties</span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-8 margin-bottom-20">
                                <a href="javascript:void(0)" class="btn btn-default" onclick="onAssignSelectedProperty()">Assign Selected Property</a>
                                <a href="javascript:void(0)" class="btn btn-default" onClick="onAssignPropertyEdit()">Edit Property</a>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 text-right margin-bottom-20">
                                <a href="javascript:void(0)" class="btn btn-default" onclick="onShowPropertyDetails()">Show Property Details</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped" id="propertySearchTableID">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Prototype Name</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip</th>
                                    </tr>
                                    </thead>
                                    <tbody id="searchTableShowTbody">
                                        @include('property.search_show')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 border-bottom-2-soild margin-bottom-30 " id="phoneImportDiv" style="display: none"></div>
    <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="contactImportDiv" style="display: none"></div>
    <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="commentImportDiv" style="display: none"></div>
    <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="companyImportDiv" style="display: none"></div>
    <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="companyPhoneImportDiv" style="display: none"></div>
    <div class="col-md-12 border-bottom-2-soild margin-bottom-30" id="companyContactImportDiv" style="display: none"></div>
</div>