 <link href="<?php base_url() ?>assets/css/login.css" rel="stylesheet" media="screen">
<br /><?php if (!empty($this->session->flashdata('message'))){ ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('message');?>
    </div>
<?php } ?>
<form method="POST" action="<?php echo base_url('data/auth'); ?>">
  <div class="form-group">
    <label for="user">Username</label>
    <input required="" class="form-control" type="text" name="user">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input required="" class="form-control" type="password" name="pass">
  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="tbl_login" value="Login"></td>
  </div>
</form>