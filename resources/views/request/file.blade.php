<div class="col-md-12 margin-bottom-50">
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-20">
                <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                    <span class="font-weight-900">Request-Related Files</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickRequestAddFile()">Add File</a>
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickRequestEditFile()">Edit File</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="request-file-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>File Type</th>
                            <th>Description</th>
                            <th>File Name</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody id="requestCommonTableBody">
                        @include('request.file_table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>