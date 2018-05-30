<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <title>GUDANG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function startCalculate()
      {
          interval=setInterval("Calculate()",1);
      }

      function Calculate()
      {
          var a=document.calc.stk.value;
          var b=document.calc.hrg.value;
          document.calc.ttl.value=(a*b);
      }

      function stopCalc()
      {
          clearInterval(interval);
      }
    </script>
</head>
<body>
<br /><div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">SISTEM INFORMASI GUDANG</a>
    </div>
<?php if ($this->session->userdata('login')) { ?>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url(); ?>">Beranda</a></li>
        <li><a href="<?php echo base_url('data/insert'); ?>">Tambah Barang</a></li>
        <li><a href="<?php echo base_url('data/logout'); ?>">Logout</a></li>
      </ul>
    </div>
  </div>
<?php } ?>
</nav>
<?php if ($this->session->userdata('login')) { ?>
  <p>
    <form action="<?php echo base_url('data/search'); ?>" method="GET">
      <div class="input-group">
        <input required="" type="text" class="form-control" placeholder="Ketik Nama Barang" name="s">
        <div class="input-group-btn">
          <input class="btn btn-primary" type="submit" value="Cari">
        </div>
      </div>
    </form>
  </p>
<?php } echo $_content; ?>
</div>
</body>
</html>