<div class="col-md-12 margin-bottom-50">
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-bottom-20">
                <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-20">
                    <span class="font-weight-900">Comments</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right margin-bottom-20">
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickRequestAddComment()">Add Comment</a>
                    <a href="javascript:void(0)" class="btn btn-default"  onclick="onClickRequestEditComment()">Edit Comment</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped" id="request-comment-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody id="requestCommonTableBody">
                            @include('request.comment_table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>