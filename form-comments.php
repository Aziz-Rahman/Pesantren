<!--  Modals-->
<a href="#" data-toggle="modal" data-target="#myModal">Reply</a>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-login">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
            <div class="modal-body" id="form-login">

                <form class="form-horizontal" method="post" action="" role="form">
                    <div class="form-group">
                        <div class="col-md-12" >
                            <input type="text" class="form-control" id="input-name" name="name" placeholder="Name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                           <input type="email" class="form-control" id="input-email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12" >
                            <textarea class="form-control" name="comments" cols="100" rows="6" placeholder="Comments"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-danger">Comments</button>
                      </div>
                    </div>
                </form>


             </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- End Modals-->