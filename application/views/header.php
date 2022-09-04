<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<title>QubeHealth Assignment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<style>
.new-login-area{
  padding:24px;
}
h3 {
  font-size: 24px;
  line-height: 30px;
}
label {
  font-size: 12px;
}
.request-otp-header {
  margin: 40px 0px;
}
.login-label label {
  font-weight: 600;
}
.input-edit {
  border: none !important;
  border-bottom: 2px solid #ccc !important;
  padding: 6px 0px;
  opacity: 0.8;
}
.input-edit:focus {
  border-bottom-color: #c74032 !important;
  box-shadow: none;
  outline: 0;
}

.request-otp {
  background: linear-gradient(#c74032, #91041b);
  font-size: 14px;
  color: #fff;
}
.request-otp:focus {
  box-shadow: none;
}
.fa-chevron-left {
  cursor: pointer;
}
.resend-otp{
  margin-top:6px;
  cursor:pointer;
}

</style>
</head>
<body>
<div class="container">

  <h1 style="font-style:italic">QubeHealth Assignment</h1>
  <?php if($this->session->userdata('user')){ ?>
    <span>
    	<a href="<?php echo base_url('Logout');?>" class="btn btn-info btn-lg" style="color:#fff;">Logout</a>
    </span>
  <?php } ?>
	<hr />