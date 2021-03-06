<?php
# Set form attributes
$attr_FormOpen = array('account'=>'form');
$hiddenid = array('class'=>'form-control', 'name' => 'user_id', 'type'=>'hidden','disabled'=>'disabled');
$firstname = array('class'=>'form-control', 'name' => 'first_name', 'placeholder'=>'First Name','required'=>'required','disabled'=>'disabled');
$lastname = array('class'=>'form-control', 'name' => 'last_name', 'placeholder'=>'Last Name','required'=>'required','disabled'=>'disabled');
$email = array('class'=>'form-control', 'name' => 'email_address', 'placeholder'=>'Email Address','required'=>'required','disabled'=>'disabled');
$status = array('class'=>'form-control', 'name' => 'status', 'placeholder'=>'Status','required'=>'required','disabled'=>'disabled');

// prohibit admin from changing username if the logged in user is the same as the admin...  
	$username = array('class'=>'form-control', 'name' => 'username', 'placeholder'=>'Username', 'disabled'=>'disabled','disabled'=>'disabled');
$userstatus = array('class'=>'form-control', 'name' => 'status', 'placeholder'=>'Account Status','disabled'=>'disabled');
$admin_role = array('type'=>'radio', 'name'=>'admin_roles','disabled'=>'disabled');

?>
<div id="wrapper">
        <!-- /.navbar-static-top -->
		<?php // load dashboard admin menu ?>
		<?php $this->load->view("dashboard_menu"); ?>
        <!-- /.navbar-static-side -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $subtitle; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           <i class="fa fa-user fa-fw"></i> <?= $acct->first_name. " ".$acct->last_name; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#profile-pills" data-toggle="tab">Profile</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="profile-pills">
									<fieldset class="bg-primary">
										<div class="form-group input-group">
                             
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<?= form_input($firstname, set_value("first_name", $acct->first_name)); ?>                                
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<?= form_input($lastname, set_value("last_name", $acct->last_name)); ?>                                
										</div>
										<div class="form-group input-group">
											<?php
											if ($acct->status == "1") {
												echo "<span class=\"input-group-addon\"><i class=\"fa fa-unlock\"></i></span>";
											} elseif ($acct->status == "0") {
												echo "<span class=\"input-group-addon\"><i class=\"fa fa-lock\"></i></span>";
											}
											if ($acct->status == "1") {
												echo form_input($status, set_value("status", "User Enabled"));
											}else{
												echo form_input($status, set_value("status", "User Disabled"));										
											}
											?>
										 </div>
										<div class="form-group input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<?= form_input($username, set_value("username", $acct->username)); ?><br>
											                                 
										</div>
			                             <div class="form-group input-group">
			                             	<span class="input-group-addon"><i class="fa fa-group"></i></span>
												<select id="roles"  name="roles[]" class="form-control"  disabled ='disabled' required size = "<?=count($role_list)?>" onChange="change_perms()">
													<? foreach($role_list as $role): ?>
													<option name="<?= $role->name;?>"  id="<?= $role->name;?>"value="<?= $role->role_id; ?>" <?= !empty($role->set) ? 'selected="selected"' : NULL; ?>><?= $role->name; ?></option>
													<? endforeach; ?>
												</select>
			                            </div>
										<div><br>
										</div>																				 											                            
			                             <div class="form-group input-group height:100%" >
			                             	<span class="input-group-addon"><i class="fa fa-group"></i></span>
												<select id="perms" name="perms" multiple="multiple" class="form-control" size = "<?=count($perm_list)?>" disabled ='disabled' required>
													<? foreach($perm_list as $perm): ?>
													<option value="<?= $perm->perm_id; ?>" <?= (!empty($perm->set)) ? 'selected="selected"' : NULL; ?>><?= $perm->name; ?></option>
													<? endforeach; ?>
												</select>
			                            </div>
			                            
										<div class="form-group input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											<?= form_input($email, set_value("email_address", $acct->email_address)); ?>                                   
										</div>
										<!-- Change this to a button or input when using this as a form -->
										<?= form_close(); ?>
									</fieldset>
                               
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <?= $acct->first_name. " ".$acct->last_name; ?>
                        </div>
                    </div>
                </div>                   
               	<?= $link_back; ?>   
            </div>
            <?= br(); ?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->