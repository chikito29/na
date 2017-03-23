@extends('./layouts/super-admin')

@section('page-title')
    Create New User
@endsection

@section('nav-users')
    active
@endsection

@section('breadcrumb')
    <ul class="breadcrumb">
        <li><a href="{{ route('users.index') }}">Users</a></li>
        <li class="active">New</li>
    </ul>
@endsection

@section('page-content-wrapper')
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <strong>Important!</strong> Main feature of this page is "Change photo" function. Press button "Change photo" and try to use this awesome feature.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">

                <form action="#" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-pencil"></span> Personal Info</h3>
                        <p>This information lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt, elit arcu faucibus erat.</p>
                    </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">First Name</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="" class="form-control" name="first_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Middle Name</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="" class="form-control" name="middle_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Last Name</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="" class="form-control" name="last_name"/>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-briefcase"></span> Employment</h3>
                        <p>This information lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt, elit arcu faucibus erat.</p>
                    </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Department</label>
                            <div class="col-md-9 col-xs-7">
                                <select class="form-control select" data-live-search="true">
                                    <option>Lorem ipsum dolor</option>
                                    <option>Sit amet sicors</option>
                                    <option>Mostoly stofu tiro</option>
                                    <option>Vico sante fara</option>
                                    <option>Delomo ponto si</option>
                                    <option>Lorem ipsum dolor</option>
                                    <option>Sit amet sicors</option>
                                    <option>Mostoly stofu tiro</option>
                                    <option>Vico sante fara</option>
                                    <option>Delomo ponto si</option>
                                    <option>Lorem ipsum dolor</option>
                                    <option>Sit amet sicors</option>
                                    <option>Mostoly stofu tiro</option>
                                    <option>Vico sante fara</option>
                                    <option>Delomo ponto si</option>
                                    <option>Lorem ipsum dolor</option>
                                    <option>Sit amet sicors</option>
                                    <option>Mostoly stofu tiro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Position</label>
                            <div class="col-md-9 col-xs-7">
                                <select class="form-control select" data-live-search="true">
                                    <option>Lorem ipsum dolor</option>
                                    <option>Sit amet sicors</option>
                                    <option>Mostoly stofu tiro</option>
                                    <option>Vico sante fara</option>
                                    <option>Delomo ponto si</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Status</label>
                            <div class="col-md-9 col-xs-7">
                                <select class="form-control select">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Remarks</label>
                            <div class="col-md-9 col-xs-7">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-key"></span> Login Details</h3>
                        <p>New user will use the default username and password so no need to supply those. The user can update username and password he/she so desires.</p>
                    </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Role</label>
                            <div class="col-md-9 col-xs-7">
                                <select class="form-control select">
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option selected>Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Username</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="john.doe" class="form-control" disabled=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Password</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="password" value="London, UK" class="form-control" disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-5">
                                <button class="btn btn-primary btn-rounded pull-right">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default form-horizontal">
                    <div class="panel-body">
                        <h3><span class="fa fa-info-circle"></span> Overview</h3>
                        <p>Some quick info about this user</p>
                    </div>
                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Last visit</label>
                            <div class="col-md-8 col-xs-7 line-height-30">12:46 27.11.2015</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Super Admin</label>
                            <div class="col-md-8 col-xs-7 line-height-30">2</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Admin</label>
                            <div class="col-md-8 col-xs-7">3</div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Default</label>
                            <div class="col-md-8 col-xs-7 line-height-30">612</div>
                        </div>
                    </div>

                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-rocket"></span> Applications</h3>
                        <p>Sample of settings block</p>
                    </div>
                    <div class="panel-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-6 col-xs-6 control-label">HRIS</label>
                            <div class="col-md-6 col-xs-6">
                                <label class="switch">
                                    <input type="checkbox" checked value="1"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 col-xs-6 control-label">TMS</label>
                            <div class="col-md-6 col-xs-6">
                                <label class="switch">
                                    <input type="checkbox" checked value="1"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 col-xs-6 control-label">eQMS</label>
                            <div class="col-md-6 col-xs-6">
                                <label class="switch">
                                    <input type="checkbox" value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 col-xs-6 control-label">DAS</label>
                            <div class="col-md-6 col-xs-6">
                                <label class="switch">
                                    <input type="checkbox" value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 col-xs-6 control-label">PMS</label>
                            <div class="col-md-6 col-xs-6">
                                <label class="switch">
                                    <input type="checkbox" value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 col-xs-6 control-label">INVENTORY</label>
                            <div class="col-md-6 col-xs-6">
                                <label class="switch">
                                    <input type="checkbox" value="0"/>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- MODALS -->
    <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">Change photo</h4>
                </div>

                <form id="cp_crop" method="post" action="/assets/crop_image.php">
                <div class="modal-body">
                    <div class="text-center" id="cp_target">Use form below to upload file. Only .jpg files.</div>
                    <input type="hidden" name="cp_img_path" id="cp_img_path"/>
                    <input type="hidden" name="ic_x" id="ic_x"/>
                    <input type="hidden" name="ic_y" id="ic_y"/>
                    <input type="hidden" name="ic_w" id="ic_w"/>
                    <input type="hidden" name="ic_h" id="ic_h"/>
                </div>
                </form>

                <form id="cp_upload" method="post" enctype="multipart/form-data" action="/assets/upload_image.php">
                <div class="modal-body form-horizontal form-group-separated">
                    <div class="form-group">
                        <label class="col-md-4 control-label">New Photo</label>
                        <div class="col-md-4">
                            <input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Select file"/>
                        </div>
                    </div>
                </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success disabled" id="cp_accept">Accept</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">Change password</h4>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt</p>
                </div>
                <div class="modal-body form-horizontal form-group-separated">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Old Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="old_password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">New Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="new_password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Repeat New</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="re_password"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Proccess</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- EOF MODALS -->
@endsection

@section('scripts')
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="/js/plugins/form/jquery.form.js"></script>
<script type="text/javascript" src="/js/plugins/cropper/cropper.min.js"></script>
<script type="text/javascript" src="/js/plugins/bootstrap/bootstrap-select.js"></script>

<script type="text/javascript" src="/js/demo_edit_profile.js"></script>
@endsection
