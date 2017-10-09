<script type="text/javascript">
    function onAssignProperty(){
        $.ajax({
            url: '{{ route('property.getAssignProperty') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}'
            },
            success: function(data){
                if(data.result == "success"){
                    $("#assignPropertyModalBody").html(data.list);
                    $("#propertySearchTableID").DataTable();
                    $("#assignPropertyModal").modal("show");
                }
            }
        });


    }

    //Assign Property New
    function onAssignPropertyAddNew(){
        $.ajax({
            url: '{{ route('property.getNewProperty') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}'
            },
            success: function (data) {
                if (data.result == "success") {
                    $("#assignPropertyModalBody").html("");
                    $("#assignPropertyModalBody").html(data.list);
                }
            }
        });
    }
    //Assign New property Show Items
    function onShowPropertyPhone(data){
        $("#phoneImportDiv").empty();
        $("#phoneImportDiv").append(data.phone_list);
        $("#property-phone-table").DataTable();
    }
    function onShowPropertyContact(data){
        $("#contactImportDiv").empty(data);
        $("#contactImportDiv").append(data.contact_list);
        $("#property-contact-table").DataTable();
    }
    function  onShowPropertyComment(data) {
        $("#commentImportDiv").empty();
        $("#commentImportDiv").append(data.comment_list);
        $("#property-comment-table").DataTable();
    }
    function  onShowPropertyCompany(data) {
        $("#companyImportDiv").empty();
        $("#companyImportDiv").append(data.company_list);
        $("#property-company-table").DataTable();
    }

    //Assign New Property Button Click
    function onAddNewProperty(){
        $("#errorAddPropertyMessage").hide();
        $("#propertyAddNewForm").ajaxForm({
            success:function(data){
                if(data.result == "success"){
                    onShowPropertyPhone(data);
                    onShowPropertyContact(data);
                    onShowPropertyComment(data);
                    onShowPropertyCompany(data);
                    $("#phoneImportDiv").show();
                    $("#contactImportDiv").show();
                    $("#commentImportDiv").show();
                    $("#companyImportDiv").show();
                    $("#onAddNewProperty").hide();
                }else{
                    $("#errorAddPropertyMessage").html(data.message);
                    $("#errorAddPropertyMessage").show();
                }
            }
        }).submit();
    }

    //Add Property Add phone Click
    function onClickAddPhone(){
        $.ajax({
            url: '{{ route('property.phone.edit') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'property_id' :$("#phone_property_id").val()
            },
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyAbovePhone(data);
                }
            }
        });
    }

    function onShowPropertyAbovePhone(data){
        $("#propertyAbovePhoneStoreForm").empty();
        $("#propertyAbovePhoneStoreForm").append(data.phone_list);
        $("#addEditPhoneDiv").show();
    }

    //Add Property Edit phone Click
    function onClickEditPhone(){
        var edit_phone = $('input[name=phone_type_radio]:checked').val();
        if(edit_phone == "" ){
            alert("Please select phone");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.phone.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_phone' :edit_phone
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyAbovePhone(data);
                    }
                }
            });
        }
    }

    //Add Property Cancel phone Click

    function onClickPhoneNumberCancel(){
        $("#addEditPhoneDiv").hide();
    }
    //Add Property Save  phone Click
    function onClickPhoneNumberSave(){
        $("#propertyPhoneStoreForm").ajaxForm({
            success:function(data) {
                if (data.result == "success") {
                    onShowPropertyPhone(data);
                    onClickPhoneNumberCancel();
                }else{
                    $("#errorAddEditPhoneMessage").html(data.message);
                    $("#errorAddEditPhoneMessage").show();
                }
            }
        }).submit();
    }

    //Contact start



    function onShowPropertyAboveContact(data){
        $("#propertyAboveContactStoreForm").empty();
        $("#propertyAboveContactStoreForm").append(data.contact_list);
        $("#addEditPropertyContactDiv").show();
    }
    function onClickPropertyAddContact(){
        $.ajax({
            url: '{{ route('property.contact.edit') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'property_id' : $("#phone_contact_id").val()
            },
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyAboveContact(data);
                }
            }
        });

    }
    function onClickPropertyContactCancel(){
        $("#addEditPropertyContactDiv").hide();
    }
    function  onClickPropertyContactSave(){
        $("#propertyContactStoreForm").ajaxForm({
            success:function(data){
                if(data.result == "success"){
                    onShowPropertyContact(data);
                    onClickPropertyContactCancel();
                }else{
                    $("#errorAddEditPropertyContactMessage").html(data.message);
                    $("#errorAddEditPropertyContactMessage").show();
                }
            }
        }).submit();
    }
    function onClickPropertyEditContact(){
        var edit_contact = $('input[name=property_contact_radio]:checked').val();
        if(edit_contact == "" ){
            alert("Please select contact");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.contact.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_contact' :edit_contact
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyAboveContact(data);
                    }
                }
            });

        }
    }

    //Contact End

    //Comment start
    function onShowPropertyAboveComment(data){
        $("#propertyAboveCommentStoreForm").empty();
        $("#propertyAboveCommentStoreForm").append(data.comment_list);
        $("#addEditPropertyCommentDiv").show();
    }

    function onClickPropertyAddComment(){
        $.ajax({
            url: '{{ route('property.comment.edit') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'property_id' : $("#property_comment_id").val()
            },
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyAboveComment(data);
                }
            }
        });
    }
    function onClickPropertyCommentSave(){
        $("#propertyCommentStoreForm").ajaxForm({
            success:function(data){
                if(data.result == "success"){
                    onShowPropertyComment(data);
                    onClickPropertyCommentCancel();
                }else{
                    $("#errorAddEditPropertyCommentMessage").html(data.message);
                    $("#errorAddEditPropertyCommentMessage").show();
                }
            }
        }).submit();
    }
    function onClickPropertyCommentCancel(){
        $("#addEditPropertyCommentDiv").hide();
    }

    function onClickPropertyEditComment(){
        var edit_comment = $('input[name=property_comment_radio]:checked').val();
        if(edit_comment == "" ){
            alert("Please select comment");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.comment.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_comment' :edit_comment
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyAboveComment(data);
                    }
                }
            });
        }
    }

    //Comment End
    //Company Start
    function onShowPropertyAboveCompany(data){
        $("#propertyAboveCompanyStoreForm").empty();
        $("#propertyAboveCompanyStoreForm").append(data.company_list);
        $("#addEditPropertyCompanyDiv").show();
    }
    function onClickPropertyCompanyCancel(){
        $("#addEditPropertyCompanyDiv").hide();
    }
    function onClickPropertyAddManagementCompany(){
        $.ajax({
            url: '{{ route('property.company.edit') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'property_id' : $("#property_company_id").val()
            },
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyAboveCompany(data);
                }
            }
        });
    }
    function onClickPropertyCompanySave(){
        $("#propertyCompanyStoreForm").ajaxForm({
            success:function(data){
                if(data.result == "success"){
                    onShowPropertyCompany(data);
                    onClickPropertyCompanyCancel();
                }else{
                    $("#errorAddEditPropertyCompanytMessage").html(data.message);
                    $("#errorAddEditPropertyCompanytMessage").show();
                }
            }
        }).submit();
    }

    function onClickPropertyEditManagementCompany(){
        var edit_company = $('input[name=property_company_radio]:checked').val();
        if(edit_company == "" ){
            alert("Please select company");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.company.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_company' :edit_company
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyAboveCompany(data);
                    }
                }
            });
        }
    }

    function onClickPropertyAssignManagementCompany(){
        var edit_company = $('input[name=property_company_radio]:checked').val();
        if(edit_company == "" ){
            alert("Please select company");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.company.assign') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_company' :edit_company
                },
                success: function (data) {
                    if (data.result == "success") {
                        $("#addEditPropertyCompanyShowDiv").empty();
                        $("#addEditPropertyCompanyShowDiv").append(data.company_list);
                        $("#addEditPropertyCompanyShowDiv").show();

                        onShowPropertyCompanyPhone(data)
                        $("#companyPhoneImportDiv").show();
                        onShowPropertyCompanyContact(data)

                        $("#companyContactImportDiv").show();
                    }
                }
            });
        }
    }
    //Company End

    function onShowPropertyAboveCompanyPhone(data){
        $("#propertyAboveCompanyPhoneStoreForm").empty();
        $("#propertyAboveCompanyPhoneStoreForm").append(data.company_phone_list);
        $("#addEditPropertyCompanyPhoneDiv").show();
    }
    function onClickAddCompanyPhone(){
        $.ajax({
            url: '{{ route('property.company.phone.edit') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'property_id' :     $("#company_phone_property_id").val(),
                'property_company_id' : $("#property_assign_company_id").val()
            },
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyAboveCompanyPhone(data);
                }
            }
        });
    }

    function onClickCompanyPhoneNumberSave(){
        $("#propertyCompanyPhoneStoreForm").ajaxForm({
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyCompanyPhone(data);
                    onClickCompanyPhoneNumberCancel();
                } else {
                    $("#errorAddEditCompanyPhoneMessage").html(data.message);
                    $("#errorAddEditCompanyPhoneMessage").show();
                }
            }
        }).submit();
    }
    function onClickCompanyPhoneNumberCancel(){
        $("#addEditPropertyCompanyPhoneDiv").hide();
    }
    function onShowPropertyCompanyPhone(data){
        $("#companyPhoneImportDiv").empty();
        $("#companyPhoneImportDiv").append(data.company_phone_list);
        $("#property-company-phone-table").DataTable();

    }
    function onClickEditCompanyPhone(){
        var edit_company_phone = $('input[name=company_phone_radio]:checked').val();
        if(edit_company_phone == "" ){
            alert("Please select company phone");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.company.phone.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_company_phone':edit_company_phone,
                    'property_id' :     $("#company_phone_property_id").val(),
                    'property_company_id' : $("#property_assign_company_id").val()
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyAboveCompanyPhone(data);
                    }
                }
            });
        }
    }

    function onClickPropertyAddCompanyContact(){
        $.ajax({
            url: '{{ route('property.company.contact.edit') }}',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'property_id' :     $("#company_contact_id").val(),
                'property_company_id' : $("#property_assign_contact_company_id").val()
            },
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyAboveCompanyContact(data);
                }
            }
        });
    }

    function onShowPropertyAboveCompanyContact(data){
        $("#propertyAboveCompanyContactStoreForm").empty();
        $("#propertyAboveCompanyContactStoreForm").append(data.company_contact_list);
        $("#addEditPropertyCompanyContactDiv").show();
    }
    function onClickPropertyEditCompanyContact(){
        var edit_company_contact = $('input[name=property_company_contact_radio]:checked').val();
        if(edit_company_contact == "" ){
            alert("Please select company contact");
            return;
        }else{
            $.ajax({
                url: '{{ route('property.company.contact.edit') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_company_contact':edit_company_contact,
                    'property_id' :     $("#company_contact_id").val(),
                    'property_company_id' : $("#property_assign_contact_company_id").val()
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyAboveCompanyContact(data);
                    }
                }
            });
        }
    }
    function onClickPropertyCompanyContactCancel(){
        $("#addEditPropertyCompanyContactDiv").hide();
    }
    function onClickPropertyCompanyContactSave(){
        $("#propertyCompanyContactStoreForm").ajaxForm({
            success: function (data) {
                if (data.result == "success") {
                    onShowPropertyCompanyContact(data);
                    onClickPropertyCompanyContactCancel();
                } else {
                    $("#errorAddEditPropertyCompanyContactMessage").html(data.message);
                    $("#errorAddEditPropertyCompanyContactMessage").show();
                }
            }
        }).submit();
    }
    function onShowPropertyCompanyContact(data){
        $("#companyContactImportDiv").empty();
        $("#companyContactImportDiv").append(data.company_contact_list);
        $("#property-company-contact-table").DataTable();
    }



    //Search Function for property

    function onAssignPropertySearch(){
        $("#assignPropertySearch").ajaxForm({
            success:function(data){
                if(data.result == "success"){
                    $("#searchTableShowTbody").empty();
                    $("#searchTableShowTbody").append(data.list);
                    $("#propertySearchTableID").DataTable();
                }
            }
        }).submit();
    }
    function onShowPropertyDetails(){
        var property_radio = $('input[name=property_radio]:checked').val();
        if(property_radio == ""){
            alert("Please select propety.");
        }else{
            $.ajax({
                url: '{{ route('property.show') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'property_radio':property_radio,
                },
                success: function (data) {
                    if (data.result == "success") {
                        onShowPropertyPhone(data);
                        onShowPropertyContact(data);
                        onShowPropertyComment(data);
                        onShowPropertyCompany(data);
                        $("#phoneImportDiv").show();
                        $("#contactImportDiv").show();
                        $("#commentImportDiv").show();
                        $("#companyImportDiv").show();
                    }
                }
            });
        }
    }

    function onAssignPropertyEdit(){
        var edit_property = $('input[name=property_radio]:checked').val();
        if(edit_property == ""){
            alert("Please select propety.");
        }else{
            $.ajax({
                url: '{{ route('property.getEditProperty') }}',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_property' :edit_property
                },
                success: function (data) {
                    if (data.result == "success") {
                        $("#assignPropertyModalBody").html("");
                        $("#assignPropertyModalBody").html(data.list);
                    }
                }
            });
        }
    }
</script>