<div class="col-md-12 margin-bottom-50" id="propertyCompanyContacts">
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-20">
                <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                    <span class="font-weight-900">Management Company Contracts</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyAddCompanyContact()">Add Contact</a>
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickPropertyEditCompanyContact()">Edit Contact</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 margin-bottom-30" id="addEditPropertyCompanyContactDiv" style="display: none">
                    <div class="alert alert-danger" id="errorAddEditPropertyCompanyContactMessage">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="propertyAboveCompanyContactStoreForm">
                            @include('property.company_contact_edit')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="property-company-contact-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($property_company_contacts as $key_property_company_contact => $value_property_company_contact)
                            <tr id="property_phone_tr-{{$key_property_company_contact}}">
                                <td><input type="radio" name="property_company_contact_radio" value="{{$value_property_company_contact->id}}" @if(isset($property_company_contact) && $property_company_contact->id == $key_property_contact+1) checked @elseif($key_property_company_contact == 0) checked @endif></td>
                                <td>{{$value_property_company_contact->property_contact_type->name}}</td>
                                <td>{{ $value_property_company_contact->first_name }}</td>
                                <td>{{ $value_property_company_contact->last_name }} </td>
                                <td>{{ $value_property_company_contact->email }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>