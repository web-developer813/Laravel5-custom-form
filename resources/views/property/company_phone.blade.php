<div class="col-md-12 margin-bottom-50" id="propertyPhoneNumbers">
    <div class="row">
        <div class="col-md-12 margin-bottom-30">
            <div class="row margin-bottom-20">
                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-20">
                    <span  class="font-weight-900"> Management Company Phone Numbers</span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickAddCompanyPhone()">Add Phone</a>
                    <a href="javascript:void(0)" class="btn btn-default" onclick="onClickEditCompanyPhone()">Edit Phone</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 margin-bottom-30" id="addEditPropertyCompanyPhoneDiv" style="display: none">
                    <div class="alert alert-danger" id="errorAddEditCompanyPhoneMessage">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="propertyAboveCompanyPhoneStoreForm">
                            @include('property.company_phone_edit')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="property-company-phone-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone Type</th>
                            <th>Area Code</th>
                            <th>Phone Number</th>
                            <th>Ext</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($property_company_phones as $key_property_company_phone => $value_property_company_phone)
                            <tr id="property_phone_tr-{{$key_property_company_phone}}">
                                <td><input type="radio" name="company_phone_radio" value="{{$value_property_company_phone->id}}" @if(isset($property_company_phone) && $property_company_phone->id == $key_property_company_phone+1) checked @elseif($key_property_company_phone == 0) checked @endif></td>
                                <td>{{$value_property_company_phone->property_phone_type->name}}</td>
                                <td>{{ $value_property_company_phone->area_code }}</td>
                                <td>{{ $value_property_company_phone->phone_number }} </td>
                                <td>{{ $value_property_company_phone->phone_ext }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>