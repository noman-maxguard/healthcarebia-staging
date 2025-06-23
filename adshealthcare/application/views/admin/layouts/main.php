<?php
$role   = $this->session->userdata('user_role');
$contr  = $this->uri->segment(1);
$contr1 = $this->uri->segment(2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<title>Healthcarebia| CMS</title>
<link rel="icon" type="image/x-icon" href="<?=base_url()?>uploads/header_logo/fav_icon.png"/>
<link href="<?=base_url();?>assets/assets/css/loader.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>assets/assets/js/loader.js"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugins/editors/quill/quill.snow.css"> 
<link href="<?=base_url();?>assets/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/bootstrap-select/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/select2/select2.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<?php
if($contr1 == 'mailbox'){?>
<link href="<?=base_url();?>assets/assets/css/apps/mailbox.css" rel="stylesheet" type="text/css" />
<?php } ?>
<?php
if($contr1 == 'todo'){?>
<link href="<?=base_url()?>assets/assets/css/apps/todolist.css" rel="stylesheet" type="text/css" />
<?php } ?>

<?php if($contr1 == 'invoice'){ ?>

<link href="<?=base_url();?>assets/assets/css/apps/invoice.css" rel="stylesheet" type="text/css"/>

<?php } ?>


<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/table/datatable/custom_dt_html5.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/table/datatable/dt-global_style.css"> 


<?php if($contr1 == 'dashboard' || $contr1 == '' || $contr1 == 'inv'){?>

<link href="<?=base_url();?>assets/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css"> 
<link href="<?=base_url();?>assets/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />

<?php } ?>


<?php if($contr1 == 'user'){ ?>

<link href="<?=base_url();?>assets/plugins/drag-and-drop/dragula/dragula.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/plugins/drag-and-drop/dragula/example.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />

<?php } ?>

<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/dropify/dropify.min.css">
<link href="<?=base_url();?>assets/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />

<?php if($contr1 == 'calendar'){?>

<link href="<?=base_url();?>assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/plugins/fullcalendar/custom-fullcalendar.advance.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link href="<?=base_url();?>assets/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css" />

<style>

/*.widget-content-area { border-radius: 6px; margin-bottom: 10px; }
.daterangepicker.dropdown-menu {
 z-index: 1059;

}*/

</style>




<?php } ?>

<?php if($contr1 == 'chat'){?>

<link href="<?=base_url();?>assets/assets/css/apps/mailing-chat.css" rel="stylesheet" type="text/css" />

<?php } ?>  

<?php if($contr1 == 'notes'){?>

<link href="<?=base_url();?>assets/assets/css/apps/notes.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/forms/theme-checkbox-radio.css" rel="stylesheet" type="text/css"/>

<?php } ?>

<?php if($contr1 == 'contacts'){?>

<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/assets/css/forms/theme-checkbox-radio.css">
<link href="<?=base_url();?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/apps/contacts.css" rel="stylesheet" type="text/css" />

<?php } ?>

<!-- <link href="<?=base_url();?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" href="<?=base_url();?>assets/plugins/font-icons/fontawesome/css/regular.css">
<link rel="stylesheet" href="<?=base_url();?>assets/plugins/font-icons/fontawesome/css/fontawesome.css">
<link href="<?=base_url();?>assets/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />

<?php if($contr1 == 'menu'){?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/common/css/style.css">
<?php } ?> 
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/assets/css/elements/alert.css">

<style>

 .form-list { padding-left: 0; display: block; display: flex; align-items: center; flex-wrap: wrap;}
  .form-list li { display: inline-block; margin: 0 15px 10px 0;}

.f-right{
  float: right;
}

          .box2{
          display: none;
          }
          .feather-icon .icon-section {
          padding: 30px;
          }
          .feather-icon .icon-section h4 {
          color: #3b3f5c;
          font-size: 17px;
          font-weight: 600;
          margin: 0;
          margin-bottom: 16px;
          }
          .feather-icon .icon-content-container {
          padding: 0 16px;
          width: 86%;
          margin: 0 auto;
          border: 1px solid #bfc9d4;
          border-radius: 6px;
          }
          .feather-icon .icon-section p.fs-text {
          padding-bottom: 30px;
          margin-bottom: 30px;
          }
          .feather-icon .icon-container { cursor: pointer; }
          .feather-icon .icon-container svg {
          color: #3b3f5c;
          margin-right: 6px;
          vertical-align: middle;
          width: 20px;
          height: 20px;
          fill: rgba(0, 23, 55, 0.08);
          }
          .feather-icon .icon-container:hover svg {
          color: #1b55e2;
          fill: rgba(27, 85, 226, 0.23921568627450981);
          }
          .feather-icon .icon-container span { display: none; }
          .feather-icon .icon-container:hover span { color: #1b55e2; }
          .feather-icon .icon-link {
          color: #1b55e2;
          font-weight: 600;
          font-size: 14px;
          }


          /*FAB*/
          .fontawesome .icon-section {
          padding: 30px;
          }
          .fontawesome .icon-section h4 {
          color: #3b3f5c;
          font-size: 17px;
          font-weight: 600;
          margin: 0;
          margin-bottom: 16px;
          }
          .fontawesome .icon-content-container {
          padding: 0 16px;
          width: 86%;
          margin: 0 auto;
          border: 1px solid #bfc9d4;
          border-radius: 6px;
          }
          .fontawesome .icon-section p.fs-text {
          padding-bottom: 30px;
          margin-bottom: 30px;
          }
          .fontawesome .icon-container { cursor: pointer; }
          .fontawesome .icon-container i {
          font-size: 20px;
          color: #3b3f5c;
          vertical-align: middle;
          margin-right: 10px;
          }
          .fontawesome .icon-container:hover i { color: #1b55e2; }
          .fontawesome .icon-container span { color: #888ea8; display: none; }
          .fontawesome .icon-container:hover span { color: #1b55e2; }
          .fontawesome .icon-link {
          color: #1b55e2;
          font-weight: 600;
          font-size: 14px;
          }
          .box1{

          display: none; 
          }
          .apexcharts-canvas {
          margin: 0 auto;
          }


          .mt-22{
            padding: 25px;
  
          }


          
    table{
    width: 100%;
    margin: 20px 0;
    border-collapse: collapse;
}
table, th, td{
    border: 1px solid #cdcdcd;
}
table th, table td{
    padding: 5px;
    text-align: left;
}
/*.table tr th:nth-child(3) { width: 800px !important; }
.table tr td:nth-child(3) { width: 800px !important; }*/



</style>

<?php if($contr1 == 'media'){ ?>

   <!--  <link href="<?php echo base_url().'assets/cdn/portal/css/icons/icomoon/styles.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/cdn/portal/css/style.css'; ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url().'assets/cdn/portal/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css"> 
    <link href="<?php echo base_url().'assets/cdn/portal/css/core.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/cdn/portal/css/colors.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/cdn/portal/css/colors.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/cdn/portal/css/components.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/cdn/portal/css/extras/sweetalert.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url().'assets/cdn/portal/css/extras/sweetalert.min.css'; ?>" rel="stylesheet" type="text/css"> -->

<?php if(isset($add_css) && !empty($add_css)){
    foreach($add_css as $cssObj){ ?>
<link href="<?php echo base_url().'assets/cdn/portal/css/'.$cssObj; ?>" rel="stylesheet" type="text/css">
<?php   }
} ?>


<script src="<?php echo base_url().'assets/cdn/portal/js/core/libraries/jquery.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/cdn/portal/js/plugins/notifications/sweetalert.js'; ?>"></script>
<script src="<?php echo base_url().'assets/cdn/portal/js/plugins/notifications/sweetalert.min.js'; ?>"></script>



<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/forms/theme-checkbox-radio.css">
<link href="<?=base_url()?>assets/plugins/lightbox/photoswipe.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/plugins/lightbox/default-skin/default-skin.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/plugins/lightbox/custom-photswipe.css" rel="stylesheet" type="text/css" />



<?php } ?>
<!-- summernote -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.css">
<style>
.text-wrap
{
    white-space:normal!important;
}
.width-200
{
    width:900px!important;
}

div.dt-buttons 
{
    float: right;
}

#sidebar ul.menu-categories ul.submenu > li > b 
{ 
    display: block; 
    padding: 10px 12px 10px 48px;
    padding-left: 24px;
    margin-left: 36px;
    font-size: 15px;

}
.page_box{
    display: none;
}
.type_box{
    display: none;
}
</style>



</head>
<body>

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
<div class="spinner-grow align-self-center"></div>
</div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->

<div class="header-container fixed-top">
<header class="header navbar navbar-expand-sm">
<ul class="navbar-item theme-brand flex-row  text-center">
<li class="nav-item theme-logo">
<a href="<?=base_url()?>admin/dashboard">
<?php 
 if(!empty($this->data['c_settings'])){
 ?>
<img src="<?=base_url()?>uploads/header_logo/<?=$this->data['c_settings']->header_logo?>" class="navbar-logo" alt="<?=$this->data['c_settings']->header_logo_alt?>">
<?php } else { ?>  

<img  style="width: 100px; background-color: black;" src="<?=base_url()?>assets/images/custom.png">

<?php } ?>
</a>
</li>
<li class="nav-item theme-text">

</li>
</ul>



<ul class="navbar-item flex-row ml-md-auto">
<li class="nav-item dropdown user-profile-dropdown">
<!--<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<?php 
 if(!empty($this->data['c_settings'])){
 ?>
<img  src="<?=base_url()?>uploads/header_logo/<?=$this->data['c_settings']->header_logo?>" alt="<?=$this->data['c_settings']->header_logo_alt?>">
 <?php } else{ ?>  
<img  style="width: 100px; background-color: black;" src="<?=base_url()?>assets/images/custom.png">
<?php } ?>
</a> -->

<a style="color: white;" href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line>
<line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line>
<line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>Admin</a>

<div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
<div class="">
<div class="dropdown-item">
<a class="" href="<?=base_url()?>user-profile">
 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
  Profile
</a>
</div>

<div class="dropdown-item">
<a class="" href="<?=base_url()?>admin/settings">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
Settings
</a>
</div>

<!-- <div class="dropdown-item">
<a class="" href="<?=base_url()?>customers">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
  Customers
</a>
</div> -->

<div class="dropdown-item">
<a class="" href="<?=base_url()?>admin/menu"> 
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
Menu
</a>
</div>

<div class="dropdown-item">
<a class="" href="<?=base_url()?>admin/email_settings">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>

Email Settings</a>
</div>

<div class="dropdown-item">
<a class="" href="<?=base_url()?>admin/social_media">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>

Social Media</a>
</div>


<div class="dropdown-item">
<a class="" href="<?=base_url()?>admin/userlog"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>Userlog</a>
</div>

<div class="dropdown-item">
<a class="" href="<?=base_url()?>admin/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
</div>


</div>
</div>
</li>

</ul>
</header>
</div>
<!--  END NAVBAR  -->


<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">



<header class="header navbar navbar-expand-sm">
<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

<ul class="navbar-nav flex-row">
<li>
<div class="page-header">

<nav class="breadcrumb-one" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?=base_url()?>dashboard">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page"><span><?=!empty($this->data['page'])? $this->data['page']:''?></span></li>
</ol>
</nav>
</div>
</li>
</ul>



<!--  -->
</header>

</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

<div class="overlay"></div>
<div class="search-overlay"></div>

<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

<nav id="sidebar">
<div class="shadow-bottom"></div>
<ul class="list-unstyled menu-categories" id="accordionExample">



<li class="menu">
<a href="<?=base_url()?>admin/dashboard" aria-expanded="false" class="dropdown-toggle">
<div class="">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
<span>Dashboard</span>
</div>
</a>
</li>


<li class="menu"  >
<a href="<?=base_url()?>admin/enquiries" aria-expanded="false" class="dropdown-toggle">
<div class="">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
<span>Enquiries</span>
</div>
</a>
</li>


<!-- <li class="menu">
<a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<div class="">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
<span>Enquiries</span>
</div>
<div>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
</div>
</a>
<ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">


<li>
<a href="<?=base_url()?>admin/enquiries">Request a Call Back </a>
</li>


 <li>
<a href="<?=base_url()?>admin/enquiries/contact_us">Contact Us</a>
</li>



</ul>
</li>
 -->

<li class="menu">
<a href="#dropdown1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
<div class="">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
<span>Manage landing page</span>
</div>
<div>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
</div>
</a>
<ul class="collapse submenu list-unstyled" id="dropdown1" data-parent="#accordionExample">
<?php 
if(!empty($this->data['admin_menu']))
{
    foreach($this->data['admin_menu'] as $side_menu)
    {
?>
<li><a href="<?=base_url()?>manage-pages/update_page/<?=!empty($side_menu->url)?$side_menu->url:''?>"><?=!empty($side_menu->title)?$side_menu->title:''?></a></li>

<?php } } ?>
</ul>
</li>






</ul>
<!-- <div class="shadow-bottom"></div> -->

</nav>

</div>
<!--  END SIDEBAR  -->



<!--BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
<div class="layout-px-spacing">

<?php                    
if(isset($_view) && $_view)
$this->load->view($_view);
?> 




<div class="footer-wrapper">
<div class="footer-section f-section-1">
<p class="">Copyright © <?php echo date("Y"); ?> <a target="_blank" href="">Jasper Micron</a>, All rights reserved.</p>
</div>
<div class="footer-section f-section-2">

</div>
</div>



</div>
<!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->




<?php 

if($contr1 == 'setup-service'){

?>

<style type="text/css">
    
  .right-bar-block { position: fixed; right: 0; top: 0; display: block; height: 100vh;z-index: 999999;}
  .close-outer { display: block; width: 35px; height: 35px; background: #000000; color: #ffffff; font-size: 16px; line-height: 35px; text-align: center; position: absolute; right: 5px; top: 50%; z-index: 99999;}
  .right-bar { position: fixed; right: -535px; top: 0; height: 100vh; width: 500px; display: block; padding: 30px 25px; background: #fff; box-shadow: 0 0 10px 0 #00000021; z-index: 9999; transition: all ease-out 0.3s;}
  .right-bar.open { right: 0px;}
  @media (max-width: 991px) {
    .right-bar { width: 400px;}
  }

  @media (max-width: 767px) {
    .right-bar { width: 400px;}
  }

      
  ul#easymm{ padding: 0; }
  ul#easymm li { border: 1px solid #000000; margin-bottom: 30px; background: linear-gradient(#f9f9f9, #f5f5f5); list-style: none;}
  .ns-title{
    cursor: move; padding: 25px;
  }


.gal-bknd-listing{
    display: flex;
    flex-wrap: wrap;
    margin: 0;
    padding: 0;
}

.gal-bknd-listing li
{
  display:block;
  width: 200px;
  padding: 15px 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-right:10px ;
}
.gal-bknd-listing li a.gal-bknd-img {
    display: block;
    margin-bottom: 10px;

}
.gal-bknd-listing li a.gal-bknd-img img {
    display: block;
    width: 100%;
   /* max-height: 60px;*/
    height: 100%;
}
.gal-bknd-body { display: flex; justify-content: space-between;}
.gal-bknd-input { display: block; width: 50px;}
.gal-bknd-button { border: none; background: none;}



  
</style>




<!----------------------- Modal Create Folder ----------------------------->



<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

           <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>

             <form method="post" class="edit_popupdata">

                 <div class="modal-body up_data">
                 </div>
                <div class="modal-footer"> 
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>

            </form>


          <div class="msg"></div>

          <div class="loading"></div>

        </div>

    </div>

</div>




<div class="modal fade" id="exampleModal_template" tabindex="-1" role="dialog" aria-labelledby="exampleModal_templateLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>

            </div>


          <div class="msg"></div>

          <div class="loading"></div>

        </div>

    </div>

</div>

                      
<!------------------- End Modal Create Folder ---------------------->




<?php } ?>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?=base_url();?>assets/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?=base_url();?>assets/assets/js/app.js"></script>
<script>
$(document).ready(function() {
App.init();
});
</script>
<script src="<?=base_url();?>assets/assets/js/custom.js"></script>
<script src="<?=base_url();?>assets/assets/js/ie11fix/fn.fix-padStart.js"></script>
<script src="<?=base_url();?>assets/plugins/editors/quill/quill.js"></script>

<?php 
if($contr =='todo'){
?>
<script src="<?=base_url();?>assets/assets/js/apps/todoList.js"></script>
<?php } ?>


<?php if($contr == 'invoice'){?>
<script src="<?=base_url();?>assets/assets/js/apps/invoice.js"></script>
<?php } ?>


<script src="<?=base_url();?>assets/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="<?=base_url();?>assets/plugins/notification/snackbar/snackbar.min.js"></script>

<?php if($contr == 'mailbox'){?>
<script src="<?=base_url();?>assets/assets/js/apps/custom-mailbox.js"></script>
<?php } ?>

<script src="<?=base_url();?>assets/assets/js/scrollspyNav.js"></script>

<?php if($contr == 'dashboard' || $contr == '' ){?>

<script src="<?=base_url();?>assets/plugins/apex/apexcharts.min.js"></script>
<script src="<?=base_url();?>assets/assets/js/dashboard/dash_1.js"></script>

<?php } ?>

<script src="<?=base_url();?>assets/plugins/dropify/dropify.min.js"></script>
<script src="<?=base_url();?>assets/plugins/blockui/jquery.blockUI.min.js"></script>
<script src="<?=base_url();?>assets/assets/js/users/account-settings.js"></script>

<?php if($contr == 'user'){?>

<script src="<?=base_url();?>assets/plugins/drag-and-drop/dragula/dragula.min.js"></script>
<script src="<?=base_url();?>assets/plugins/drag-and-drop/dragula/custom-dragula.js"></script>

<?php } ?>

<?php if($contr =='calendar'){?>

<script src="<?=base_url();?>assets/plugins/fullcalendar/moment.min.js"></script>
<script src="<?=base_url();?>assets/plugins/flatpickr/flatpickr.js"></script>
<script src="<?=base_url();?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<!--<script src="<?=base_url();?>assets/plugins/fullcalendar/custom-fullcalendar.advance.js"></script> -->

<?php } ?>

<?php if($contr == 'chat'){?>

<script src="<?=base_url();?>assets/assets/js/apps/mailbox-chat.js"></script>

<?php } ?>

<?php if($contr == 'notes'){?>

<script src="<?=base_url();?>assets/assets/js/ie11fix/fn.fix-padStart.js"></script>
<script src="<?=base_url();?>assets/assets/js/apps/notes.js"></script>

<?php } ?>

<?php if($contr == 'contacts'){?>

<script src="<?=base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/assets/js/apps/contact.js"></script>

<?php } ?>

<script src="<?=base_url();?>assets/plugins/table/datatable/datatables.js"></script>
<script src="<?=base_url();?>assets/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/plugins/table/datatable/button-ext/jszip.min.js"></script>    
<script src="<?=base_url();?>assets/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="<?=base_url();?>assets/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
<!-- <script src="<?=base_url();?>assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?=base_url();?>assets/plugins/font-icons/feather/feather.min.js"></script>
 -->


<?php if($contr1 == 'menu'){ ?>

<script src="<?php echo base_url(); ?>assets/common/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/common/js/jquery.mjs.nestedSortable.js"></script>
<script src="<?php echo base_url(); ?>assets/common/js/menu.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/common/js/common.js"></script> -->

<script>
const _BASE_URL = '<?php echo base_url(); ?>';
let current_group_id = <?php if (!empty($group_id)) {
echo $group_id;
} ?>;
</script>

<?php } ?>



<?php if($contr1 == 'setup-service'){?>

<script src="<?php echo base_url(); ?>assets/common/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/common/js/jquery.mjs.nestedSortable.js"></script>
<script src="<?php echo base_url(); ?>assets/common/js/menu_custom.js"></script>
<script>

const _BASE_URL = '<?php echo base_url(); ?>';

let current_group_id = <?php if (!empty($group_id)) {

echo $group_id;

} ?>;

</script>

<?php } ?>


<script type="text/javascript">
// feather.replace();
</script>
<script src="<?=base_url();?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url();?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?=base_url();?>assets/plugins/select2/select2.min.js"></script>
<!-- <script src="<?=base_url();?>assets/plugins/select2/custom-select2.js"></script> -->


<?php if($contr1 == 'media'){ ?>

<link href="<?php echo base_url().'assets/cdn/portal/css/components.min.css'; ?>" rel="stylesheet" type="text/css">

 <script src="<?php echo base_url().'assets/cdn/portal/js/core/libraries/bootstrap.min.js'; ?>"></script>

<script src="<?php echo base_url().'assets/cdn/portal/js/core/app.min.js'; ?>"></script> 

<script src="<?php echo base_url().'assets/cdn/portal/js/core/common.js'; ?>"></script>

<?php if(isset($add_js) && !empty($add_js)){
    foreach($add_js as $jsObj){ ?>
<script type="text/javascript"  src="<?php echo base_url().'assets/cdn/portal/js/'.$jsObj; ?>" ></script>

<?php   }

} ?>



<?php if(isset($add_custom_js)){
    echo '<script>'.$add_custom_js.'</script>';
} ?>

<?php } ?>

<script>


$(document).ready(function() {





  $("select.timeframe").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box_frame").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box_frame").hide();
            }
        });
    }).change();  

    var maxField  = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper   = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="field_name[]" value="" class="form-control" Placeholder="Name"/><br/><textarea class="form-control " name="field_description[]"  Placeholder="Description"></textarea><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; 
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });



 $('input[name="type"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".type_box").not(targetBox).hide();
        $(targetBox).show();
    });


 $('input[name="page_type"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".page_box").not(targetBox).hide();
        $(targetBox).show();
    });


  var ss = $(".basic").select2({
    tags: true,
    });  

$(".category_change").change(function()
{
      $('.subcate_list option:not(:first)').remove();
      $(this).find("option:selected").each(function()
      {
          var optionValue = $(this).attr("value");
          if(optionValue)
          {
              $.ajax
              ({
                  type: 'POST',
                  url: '<?=base_url()?>admin/common/selcategory',
                  data: {id: optionValue},
                  dataTypes: 'json',
                  success: function (Jsondata)
                  {
                    var obj  = $.parseJSON(Jsondata);
                    var flag = obj.flag;
                    var id   = obj.id;
                    if(flag == 1)
                    {
                       $(".subcate_list option:first").after(obj.info);
                      
                    }
                    if(flag == 0)
                    {
                        $('.subcate_list option:not(:first)').remove();
                    }

                  }

              });


          }

      });

});




//////////// Create Dynamic URL /////////////

$('.url_create').keyup(function()
{
    const url  = $(this).val();
    const table= $(this).attr('data-id');
    $.ajax
    ({
        type: 'POST',
        url: '<?php echo base_url() . 'admin/common/create_slug';?>',
        data: {text:url,table:table},
        dataTypes: 'json',
        success: function (Jsondata)
        {
            var obj = $.parseJSON(Jsondata);
            var flag = obj.flag;
            var id = obj.id;
            if(flag == 1) 
            {
                $('.url_fetch').val(obj.url);
                $('.msg').html('URL Name is available');
            }
            if(flag == 0)
            {
                  $('.msg').html('URL Name is not available');
                   // $('.url_fetch').val('');

            } 
        }

    });



});

 $('#delete_all').click(function(){
    
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {

   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url(); ?>admin/enquiries/delete_all",
    method:"POST",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     location.reload();
     
    }
   });

  }
  else
  {
   alert('Select atleast one records');
  }
 });


//////////////// Data table ///////////////////////////

	$('#html5-extension').DataTable({
	stateSave: true,
	responsive: true,
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	// "iDisplayLength": -1,    
	//dom: 'Bfrtip', 
	// buttons: ['excel','copy', 'csv', 'pageLength'],
	order: [[0, "asc"]],
	bSort: false,
	"oLanguage": {
	"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
	"sInfo": "Showing page _PAGE_ of _PAGES_",
	"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
	"sSearchPlaceholder": "Search...",
	"sLengthMenu": "Results :  _MENU_",
	},
	"stripeClasses": [],

	});


$('#html5-extension0').DataTable({
stateSave: true,
responsive: true,
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
// "iDisplayLength": -1,    
dom: 'Blfrtip',  
//buttons: ['excel','copy', 'csv', 'pageLength'],
buttons: [
{ 

extend: 'excel', text: 'Export Excel',
title : 'Booking Enquiries',

},
],
order: [[0, "asc"]],
bSort: false,
"oLanguage": {
"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
"sInfo": "Showing page _PAGE_ of _PAGES_",
"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
"sSearchPlaceholder": "Search...",
"sLengthMenu": "Results :  _MENU_",
},
"stripeClasses": [],

});


$('#html5-extension1').DataTable({
stateSave: true,
responsive: true,
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
// "iDisplayLength": -1,    
dom: 'Blfrtip', 
//buttons: ['excel','copy', 'csv', 'pageLength'],
buttons: [
{ 
extend: 'excel', 
text: 'Export Excel',
title:'Contact enquiries',
},
],
order: [[0, "asc"]],
bSort: false,
"oLanguage": {
"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
// "sInfo": "Showing page _PAGE_ of _PAGES_",
"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
"sSearchPlaceholder": "Search...",
"sLengthMenu": "Results :  _MENU_",
},
"stripeClasses": [],
"autoWidth" : false,
// columnDefs: [
//         {
//             render: function (data, type, full, meta) {
//                 return "<div class='text-wrap width-200'>" + data + "</div>";
//             },
//             targets: 2
//         }
//      ]


});


$('#html5-extension2').DataTable({
stateSave: true,
responsive: true,
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
// "iDisplayLength": -1,    
dom: 'Blfrtip', 
//buttons: ['excel','copy', 'csv', 'pageLength'],
buttons: [
{ 
extend: 'excel', 
text: 'Export Excel',
title:'Newsletter enquiries',
},
],
order: [[0, "asc"]],
bSort: false,
"oLanguage": {
"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
// "sInfo": "Showing page _PAGE_ of _PAGES_",
"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
"sSearchPlaceholder": "Search...",
"sLengthMenu": "Results :  _MENU_",
},
"stripeClasses": [],
"autoWidth" : false,
// columnDefs: [
//         {
//             render: function (data, type, full, meta) {
//                 return "<div class='text-wrap width-200'>" + data + "</div>";
//             },
//             targets: 2
//         }
//      ]


});



/////////////////////////////// Email Settings //////////////////////////////////////////////

        $(".mclass").change(function()
        {
            $(this).find("option:selected").each(function()
            {
                var optionValue = $(this).attr("value");
                if(optionValue)
                {
                    $(".box_m").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } 
                else
                {
                    $(".box_m").hide();
                }
            });
        }).change(); 

//////////////////////////////// Delete Table Row ///////////////////////////////////////////////



$('.deleteImage1').click(function () {
var x = confirm("Are you sure want to remove this image ?");
if(x)
{

var str  = (this.id);
var ret  = str.split("-");
var str0 = ret[0];
var str1 = ret[1];
var str2 = ret[2];
$.ajax({
type: 'POST',
url: '<?php echo base_url() . 'admin/common/remove2';?>',
data: {column:str0,table:str1,id:str2},
dataTypes: 'json',
success: function (Jsondata) {
var obj = $.parseJSON(Jsondata);
var flag = obj.flag;
var id = obj.id;
if(flag == 1) {
$('#msg').html("<div class='alert alert-danger'>" + obj.success + "</div>");
setTimeout(function () {
$("#msg").hide();
}, 2000);

location.reload();      
}
if(flag == 0){
$('#msg').html("<div class='alert alert-warning'>" + obj.error + "</div>");
setTimeout(function () {
$("#msg").hide();
}, 2000);

}

}

});

}
else
return false;
})


$('.deleteImage').click(function () {
var x = confirm("Are you sure want to remove this image ?");
if(x)
{

var str  = (this.id);
var ret  = str.split("-");
var str0 = ret[0];
var str1 = ret[1];
var str2 = ret[2];
$.ajax({
type: 'POST',
url: '<?php echo base_url() . 'admin/common/remove1';?>',
data: {column:str0,table:str1,id:str2},
dataTypes: 'json',
success: function (Jsondata) {
var obj = $.parseJSON(Jsondata);
var flag = obj.flag;
var id = obj.id;
if(flag == 1) {
$('#msg').html("<div class='alert alert-danger'>" + obj.success + "</div>");
setTimeout(function () {
$("#msg").hide();
}, 2000);

location.reload();      
}
if(flag == 0){
$('#msg').html("<div class='alert alert-warning'>" + obj.error + "</div>");
setTimeout(function () {
$("#msg").hide();
}, 2000);

}

}

});

}
else
return false;
})




$(document).on("click",".deletable",function() {
      $('.msg').html('');
      $('.msg').show();
      var timeout = 5000; // in miliseconds (3*1000)
      $('.alert').delay(timeout).fadeOut(300);
      var result = confirm("Do you want to  Delete this Item?");
      if (result)
      {
          var str = (this.id);
          var ret = str.split("-");
          var str1 = ret[0];
          var str2 = ret[1];
          $.ajax
          ({
              type: 'POST',
              url: '<?=base_url()?>admin/common/remove',
              data: {id1: str2,table:str1},
              dataTypes: 'json',
              success: function (Jsondata)
              {
                  var obj = $.parseJSON(Jsondata);
                  var flag = obj.flag;
                  var id = obj.id;
                  if(flag == 1)
                  {
                      $('.msg').html("<div class='alert alert-danger'>" + obj.success + "</div>");
                      setTimeout(function () 
                      {
                         $(".msg").hide();
                      }, 4000);

                      location.reload();      
                  }
                  if(flag == 0)
                  {
                    $('.msg').html("<div class='alert alert-warning'>" + obj.error + "</div>");
                    setTimeout(function () 
                    {
                       $(".msg").hide();
                    }, 4000);

                  }
              }

          });


      }    

});  


///////////// TinyMCE ///////////////////////

addTinyMCE();



});

</script>


<script>

$(document).ready(function() {


$(document).on('keyup paste change','.sort_order_common',function () {

  var id_str = $(this).attr('id');
  var id_arr = id_str.split('-');
  var id = id_arr[1];
  var table=id_arr[0];
  var sort_order = $(this).val();
  var inputs = $(".sort_order");

  $.ajax({
      type : "post",
      url : "<?=base_url()?>admin/common/update_sort_order_common",
      data : {id:id,sort_order:sort_order,table:table},
      success : function(jsonData){

          var values = $.parseJSON(jsonData);

          // var msg = values.msg;

      }
  })
})


$(document).on('keyup paste change','.sort_order',function () {
  var id_str = $(this).attr('id');
  var id_arr = id_str.split('_');

  var id = id_arr[2];
  var category = id_arr[1];
  var table=id_arr[0];
  var sort_order = $(this).val();
  var inputs = $(".sort_order");

  $.ajax({
      type : "post",
      url : "<?=base_url()?>admin/common/update_sort_order",
      data : {id:id,sort_order:sort_order,category:category,table:table},
      success : function(jsonData){

          var values = $.parseJSON(jsonData);

          // var msg = values.msg;

      }
  })
})




<?php 
if($contr1 == 'setup-service'){
?>
$("select.data_fetch").change(function(){
var x = confirm("Are you want to change the category of banner?"); 
if(x)
{
    var str = $(this).children("option:selected").val();
    var ret  = str.split("_");
    var status = ret[0];
    var page_content  = ret[1];
    $.ajax({
    type: 'POST',
    url: '<?php echo base_url() . 'admin/manage_page/change_data_fetch'?>',
    data: {status:status,pageid:<?=$page_data->id?>,page_content:page_content},
    dataTypes: 'json',
    success: function (Jsondata){
    var obj = $.parseJSON(Jsondata);
    var flag = obj.flag;
    var id = obj.id;
    if(flag == 1)
    {
      $('#msg').html("<div class='alert alert-danger'>" + obj.status + "</div>");
      setTimeout(function () {
      $("#msg").hide();

      }, 1000);
      location.reload();      
    }
    if(flag == 0)
    {

      $('#msg').html("<div class='alert alert-warning'>" + obj.status + "</div>");
      setTimeout(function () {
      $("#msg").hide();
      }, 1000);

    }

  }


  });

}
else
{
    return false;
}

});



$("select.banner_category").change(function(){
var x = confirm("Are you want to change the category of banner?"); 
if(x)
{
    var str = $(this).children("option:selected").val();
    var ret  = str.split("_");
    var status = ret[0];
    var page_content  = ret[1];
    $.ajax({
    type: 'POST',
    url: '<?php echo base_url() . 'admin/manage_page/change_banner_category'?>',
    data: {status:status,pageid:<?=$page_data->id?>,page_content:page_content},
    dataTypes: 'json',
    success: function (Jsondata){
    var obj = $.parseJSON(Jsondata);
    var flag = obj.flag;
    var id = obj.id;
    if(flag == 1)
    {
      $('#msg1').html("<div class='alert alert-danger'>" + obj.status + "</div>");
      setTimeout(function () {
      $("#msg1").hide();

      }, 1000);
      location.reload();      
    }
    if(flag == 0)
    {

      $('#msg1').html("<div class='alert alert-warning'>" + obj.status + "</div>");
      setTimeout(function () {
      $("#msg1").hide();
      }, 1000);

    }

  }


  });

}
else
{
  return false;
}  



});




$("select.status").change(function(){
var x = confirm("Are you want to change the status of template?");
if(x)
 {
    var str = $(this).children("option:selected").val();
    var ret  = str.split("_");
    var status = ret[0];
    var str1 = ret[1];

    $.ajax({
    type: 'POST',
    url: '<?php echo base_url() . 'admin/manage_page/change_template_status';?>',
    data: {status:status,pageid:<?=$page_data->id?>,templateid:str1},
    dataTypes: 'json',
    success: function (Jsondata){
    var obj = $.parseJSON(Jsondata);
    var flag = obj.flag;

    var id = obj.id;
    if(flag == 1)
    {
      $('#msg').html("<div class='alert alert-danger'>" + obj.status + "</div>");
      setTimeout(function () {
      $("#msg").hide();

      }, 1000);
      location.reload();      
    }
    if(flag == 0)
    {

      $('#msg').html("<div class='alert alert-warning'>" + obj.status + "</div>");
      setTimeout(function () {
      $("#msg").hide();
      }, 1000);

    }

  }

  });



 }
 else
 {
    return false;

 } 
    
});



$('.deletable_template').click(function () {
var x = confirm("Are you sure want to remove this image ?");
if(x)
{
    var id=this.id;
    $.ajax({
    type: 'POST',
    url: '<?php echo base_url() . 'admin/manage_page/remove_template';?>',
    data: {column:id,pageid:<?=$page_data->id?>},
    dataTypes: 'json',
    success: function (Jsondata){
    var obj = $.parseJSON(Jsondata);
    var flag = obj.flag;

    var id = obj.id;
    if(flag == 1)
    {
      $('#msg').html("<div class='alert alert-danger'>" + obj.success + "</div>");
      setTimeout(function () {
      $("#msg").hide();

      }, 2000);
      location.reload();      
    }
    if(flag == 0)
    {

      $('#msg').html("<div class='alert alert-warning'>" + obj.success + "</div>");
      setTimeout(function () {
      $("#msg").hide();
      }, 2000);

    }

  }

  });
  }else{ return false;}

});

$(document).on("submit",".edit_popupdata", function (e) {
event.preventDefault();
var formData = new FormData(this);
$.ajax({  

            type:'POST',
            url:'<?=base_url()?>admin/common/edit_data/',
            data:formData,
            dataTypes:'json',
            dataSrc:"",
            processData:false,
            contentType:false,
            beforeSend: function () 
            {
               $('.loading').css("color","green").text("Please wait...");
            },
            success: function (Jsondata)
            {

                var obj    = $.parseJSON(Jsondata);
                var flag   =  obj.flag;
                if(flag == 1)
                {

                  $('.loading').hide();  
                  $('.msg').html('<div class="alert alert-success">'+obj.status + '</div>');
                  setTimeout(function () {
                  $('.edit_popupdata')[0].reset();
                  $('.msg').hide();
                  $("#exampleModal").modal('hide');
                   location.reload();
                  }, 1000);

                }
                else
                {

                  $('.loading').hide();
                  $('.msg').html('<div class="alert alert-warning">' + obj.status + '</div>');
                  setTimeout(function ()
                  {

                      $('.edit_popupdata')[0].reset();
                      $('.msg').hide();
                  }, 1000);

                }

            }

       }); 

   }); 



$(document).on('click', '.deleteImage2',function(){
var x = confirm("Are you sure want to remove this image ?");
if(x)
{
    var str  = (this.id);
    var ret  = str.split("-");
    var str0 = ret[0];
    var str1 = ret[1];
    var str2 = ret[2];
    $.ajax({
    type: 'POST',
    url: '<?php echo base_url() . 'admin/common/remove2';?>',
    data: {column:str0,table:str1,id:str2},
    dataTypes: 'json',
    success: function (Jsondata){
    var obj = $.parseJSON(Jsondata);
    var flag = obj.flag;
    var id = obj.id;
    if(flag == 1)
    {
      $('#msg').html("<div class='alert alert-danger'>" + obj.success + "</div>");
      setTimeout(function () {
      $("#msg").hide();

      }, 2000);
      location.reload();      
    }
    if(flag == 0)
    {

      $('#msg').html("<div class='alert alert-warning'>" + obj.error + "</div>");
      setTimeout(function () {
      $("#msg").hide();
      }, 2000);

    }

  }

  });

}
else
return false;
});



$('.editpopup').click(function () {

var str  = (this.id);
var ret  = str.split("-");
var str0 = ret[0];
var str1 = ret[1];
$('.up_data').html();
$.ajax
({

    type: 'POST',
    url: '<?php echo base_url() . 'admin/common/data_fetch';?>',
    data: {table:str0,id:str1},
    dataTypes: 'json',
    success: function (Jsondata)
    {
        var obj = $.parseJSON(Jsondata);
        var flag = obj.flag;
        var id = obj.id;

        

        if(flag == 1)
        {

           $('.up_data').html(obj.status);

             addtemplate();
        }
        if(flag == 0)
        {

          $('.msg').html("<div class='alert alert-warning'>" + obj.status + "</div>");
          setTimeout(function () {
          $(".msg").hide();
          }, 2000);

        }

    }



});


});  

$(document).ready(function () {
///  29-03-2023


$(".addComponets").click(function () {
var  template_id  = (this.id);
var wrapper    = $("#block"+template_id);
var save_b=$('.save_button'+template_id);
var count = wrapper.find(".blockcount").length ;
if(count == 0){
$.ajax({

        url:'<?=base_url()?>admin/manage_page/create_template_row',
        type:'POST',
        data:{template_id:template_id},
        dataType:'json',
        // processData:false,
        // contentType:false,
        beforeSend: function () {
    
        },

        success: function (data)
        {
           
            if(data.flag==1)
            {
             
              wrapper.append(data.output);
              addtemplate();
             
              save_b.removeClass("d-none");
              alert('Component created successfully');
            }

            if(data.flag == 0)
            {
                alert(data.output);
            }

       }


    });

}
else
{
    alert('Component block is currently available at a time one block saved')
}



}); 
$(document).on('click','.removeRow', function () {
var template_id  = (this.id);

var wrapper    = $("#block"+template_id);
var save_b=$('.save_button'+template_id);
$(this).closest('.b1').remove();
save_b.addClass("d-none");
});
   

$('.change_status').click(function(){
var imageStatus = 0;
if($(this).prop("checked") == true)
imageStatus = 1;
var id_str = $(this).attr('id');
var id_arr = id_str.split('-');
var table=id_arr[0];
var id = id_arr[1];

$.ajax({
    type: 'post',
    url:'<?=base_url()?>admin/common/change_image_status',
    data:{id:id,imageStatus:imageStatus,table:table},
    success:function(jsonData){
        // var values = $.parseJSON(jsonData);
        //var flag = values.flag;

    }
})

});


$(document).on('keyup paste change','.change_order',function () {

var id_str = $(this).attr('id');
var id_arr = id_str.split('-');
var table=id_arr[0];
var id = id_arr[1];

var sort_order = $(this).val();

$.ajax({
    type : "post",
    url : "<?=base_url()?>admin/common/sort_images",
    data : {id:id,sort_order:sort_order,table:table},
    success : function(jsonData){

        var values = $.parseJSON(jsonData);

        // var msg = values.msg;

    }
})
})



$(".template_create_custom").click(function(){

    var componets = [];
    $.each($("input[name='components']:checked"), function(){            
        componets.push($(this).val());
    });
    var  pageid =$('#pageid').val();
     var cnt=componets.length;
     if(cnt)

        $.ajax({
        url:'<?=base_url()?>admin/manage_page/create_template_custom',
        type:'POST',
        data:{pageid:pageid,componets:componets},
        dataType:'json',
        // processData:false,
        // contentType:false,
        beforeSend: function () {
    
        },

        success: function (data)
        {
           
            if(data.flag==1)
            {
             
              $('#easymm').append(data.output);
               alert('Template created successfully');

               location.reload();

            }

            if(data.flag == 0)
            {
                alert(data.output);

            }

       }


        });
});

///  End 29-03-2023 ///

$(".template_create").click(function(){

var template_id=this.id;
var ret  = template_id.split("_");
var pageid =$('#pageid').val();
        $.ajax({

        url:'<?=base_url()?>admin/manage_page/create_template',
        type:'POST',
        data:{template_id:ret[1],pageid:pageid,},
        dataType:'json',
        // processData:false,
        // contentType:false,
        beforeSend: function () {
    
        },

        success: function (data)
        {
            if(data.flag==1)
            {
             
              $('#easymm').append(data.output);
               alert('Template created successfully');

               location.reload();

            }

            if(data.flag == 0)
            {
                alert(data.output);

            }

       }



        });




// $.post("<?=base_url()?>admin/manage_page/create_template",{template_id:template_id,pageid:pageid});

});


   $(".close-outer").click(function(){
        $(this).next().stop(true, true).toggleClass("open");
        $(this).toggleClass("active");
    });

    $('body').click(function () {
        $('.close-outer').removeClass("active");
        $('.right-bar').removeClass("open");
    });
    $('.close-outer,.right-bar').click(function (event) {
        event.stopPropagation();
    });





// Template 1
   var max_rows1   = 2;
   var x1 = 1;
   var wrapper1    = $("#block1");
   $("#addRow1").click(function () {
        if(x1 <= max_rows6)
        {
          var html = '';
          html += '<div class="col-md-12 b1 p-3">';
          html += '<label for="image1" class="control-label"> <span class="text-danger"></span>Image</label>';
          html +='<div class="form-group">';
          html += '<input type="file" name="banner[]"  class="form-control" required/></div>';
          html += '<span class="btn btn-danger mt-2 removeRow1">Remove</span>';
          html += '</div>';
          $(wrapper1).append(html);
          x1++;
      }
      else
      {
        alert('Allowed limit is Over');
      }  
        
    });

    // remove row
    $(document).on('click', '.removeRow1', function () {
        $(this).closest('.b1').remove();
          var wrapper1    = $("#block1");
         // var len1= $(wrapper1).children('div').length;
         // if(len1 >=1)
         // {
         //    $('#menu-1').css('display','block');
         // }
         // else
         // {
         //   $('#menu-1').css('display','none'); 
         // }  
    });

// End Template 1

// Template 2


   var wrapper2    = $("#block2");
  
   $("#addRow2").click(function () {
      
        var html = '';
        html += '<div class="b1 p-3"><div class="row"><div class="col-md-4">';
        html += '<label for="image2" class="control-label"> <span class="text-danger"></span>Image</label>';
        html += '<div class="form-group"><input type="file" name="image[]" class="form-control" required/></div></div>';
     
        html += '<div class="col-md-8">';
        html += '<label class="control-label"><span class="text-danger"></span>Description</label>';
        html += '<div class="form-group"><textarea name="description[]" class="form-control textarea" required></textarea></div></div>';
        html += '<div class="col-md-12"><span class="btn btn-danger mt-2 removeRow2">Remove</span></div>';
        html += '</div></div>';
        $(wrapper2).append(html);
        addtemplate();

        
    });

    // remove row
    $(document).on('click', '.removeRow2', function () {
        $(this).closest('.b1').remove();
         var wrapper2    = $("#block2");
         // var len2= $(wrapper2).children('div').length;
         // if(len2 >=1)
         // {
         //    $('#menu-2').css('display','block');
         // }
         // else
         // {
         //   $('#menu-2').css('display','none'); 
         // }


    });
// End Template 2

// Template 3

   var wrapper3    = $("#block3");

   $("#addRow3").click(function () {
 
      var html = '';
      html += '<div class="b1 p-3"><div class="row">';
      html += '<div class="col-md-6">';
      html += '<label class="control-label"><span class="text-danger"></span>Description</label>';
      html += '<div class="form-group"><textarea name="description1[]" class="form-control textarea" required></textarea></div></div>';

      html += '<div class="col-md-2">';
      html += '<label class="control-label"><span class="text-danger"></span>Text</label>';
      html += '<div class="form-group"><input type="text" class="form-control" name="title3[]"></div></div>';

      html +='<div class="col-md-4">';
      html += '<label for="image2" class="control-label"><span class="text-danger"></span>Image</label>';
      html += '<div class="form-group"><input type="file" name="image1[]"  class="form-control" required/></div></div>';
    
      html += '<span class="btn btn-danger mt-2 removeRow3">Remove</span>';
      html += '</div></div>';
       
       $(wrapper3).append(html);
        addtemplate();
 
        
    });

    // remove row
    $(document).on('click', '.removeRow3', function () {
        $(this).closest('.b1').remove();

         var wrapper3    = $("#block3");
         var len3= $(wrapper3).children('div').length;
         // if(len3 >=1)
         // {
         //    $('#menu-3').css('display','block');
         // }
         // else
         // {
         //   $('#menu-3').css('display','none'); 
         // }

    });

//End Template 3

// Template 4



   var wrapper4    = $("#block4");
  
   $("#addRow4").click(function () {
    
        var html = '';
        html += '<div class="col-md-12 b1 p-3">';
        html += '<label for="image2" class="control-label"> <span class="text-danger"></span>Image</label>';
        html += '<div class="form-group"><input type="file" name="image2[]" class="form-control" required/></div>';
        html += '<span class="btn btn-danger mt-2 removeRow4">Remove</span>';
        html += '</div>';
       
       $(wrapper4).append(html);
        // addtemplate();

  
    });

    // remove row
    $(document).on('click', '.removeRow4', function () {
        $(this).closest('.b1').remove();

         var wrapper4    = $("#block4");
         var len4= $(wrapper4).children('div').length;
         // if(len4 >=1)
         // {
         //    $('#menu-4').css('display','block');
         // }
         // else
         // {
         //   $('#menu-4').css('display','none'); 
         // }
    });


// End Template 4


// Template 5


   
   var wrapper5    = $("#block5");

   $("#addRow5").click(function () {
     
    
        var html = '';
        html += '<div class="col-md-12 b1 p-3">';
        html += '<label class="control-label"> <span class="text-danger"></span>Description</label>';
        html += '<div class="form-group"><textarea name="description2[]" class="form-control textarea" required></textarea></div>';
        html += '<span class="btn btn-danger mt-2 removeRow5">Remove</span>';
        html += '</div>';
       
       $(wrapper5).append(html);
        addtemplate();

     
        
    });

    // remove row
    $(document).on('click', '.removeRow5', function () {
        $(this).closest('.b1').remove();

         var wrapper5    = $("#block5");
         var len5= $(wrapper5).children('div').length;
         // if(len5 >=1)
         // {
         //    $('#menu-5').css('display','block');
         // }
         // else
         // {
         //   $('#menu-5').css('display','none'); 
         // }
    });

// End Template 5

// Template 6

   var max_rows6   = 2;
   var wrapper6    = $("#block6");
   var x6 = 1; 
   $("#addRow6").click(function () {
      if(x6 < max_rows6){
       

        var html = '';
        html += '<div class="col-md-12 b1 p-3">';
        html += '<label for="image1" class="control-label"> <span class="text-danger"></span>Gallery</label>';
        html +='<div class="form-group">';
        html += '<input type="file" name="files1[]" id="files" multiple class="form-control"  /></div>';
        html += '<p id="error'+x6+'" class="error" style="display:none; color:#FF0000;"></p>';
        html += '<span class="btn btn-danger mt-2 removeRow6">Remove</span>';
        html += '</div>';
       
       $(wrapper6).append(html);
        // addtemplate();

        var len6= $(wrapper6).children('div').length;
        // if(len6 >=1)
        // {
        //     $('#menu-6').css('display','block');
        // }
        // else
        // {
        //    $('#menu-6').css('display','none'); 
        // }

        x6++;  
      }
      else
      {
            alert('Allowed limit is Over');
      } 
        
    });

    // remove row
    $(document).on('click', '.removeRow6', function () {
        $(this).closest('.b1').remove();

         var wrapper6 = $("#block6");
         var len6 = $(wrapper6).children('div').length;
         // if(len6 >=1)
         // {
         //    $('#menu-6').css('display','block');
         // }
         // else
         // {
         //   $('#menu-6').css('display','none'); 
         // }
    });

// End Template 6


});  


// Template 7




   var max_rows7   = 10;
   var wrapper7    = $("#block7");
   var x7 = 1; 
   $("#addRow7").click(function () {
      if(x7 < max_rows6){
       

        var html = '';
        html += '<div class="col-md-12 b1 p-3">';
        html += '<label class="control-label"> <span class="text-danger"></span>Description</label>';
        html += '<div class="form-group"><textarea name="description3[]" class="form-control textarea" required></textarea></div>';
        html += '<span class="btn btn-danger mt-2 removeRow5">Remove</span>';
        html += '</div>';
       
       $(wrapper7).append(html);
        addtemplate();

        var len7= $(wrapper7).children('div').length;
        // if(len7 >=1)
        // {
        //     $('#menu-7').css('display','block');
        // }
        // else
        // {
        //    $('#menu-7').css('display','none'); 
        // }

        x7++;  
      }
      else
      {
            alert('Allowed limit is Over');
      } 
        
    });




    // remove row
    $(document).on('click', '.removeRow7', function () {
        $(this).closest('.b1').remove();

         var wrapper7 = $("#block7");
         var len7 = $(wrapper7).children('div').length;
         // if(len7 >=1)
         // {
         //    $('#menu-7').css('display','block');
         // }
         // else
         // {
         //   $('#menu-7').css('display','none'); 
         // }
    });

    // End Template 7

// Start Template 8

   var max_rows8   = 10;
   var wrapper8    = $("#block8");
   var x8 = 1; 
   $("#addRow8").click(function () {
      if(x8 < max_rows8){
       

        var html = '';
        html += '<div class="col-md-12 b1 p-3">';
        html += '<label class="control-label"> <span class="text-danger"></span>Description</label>';
        html += '<div class="form-group"><textarea name="description3[]" class="form-control textarea" required></textarea></div>';
        html += '<span class="btn btn-danger mt-2 removeRow5">Remove</span>';
        html += '</div>';
       
       $(wrapper8).append(html);
        addtemplate();

        var len8= $(wrapper8).children('div').length;
        // if(len8 >=1)
        // {
        //     $('#menu-8').css('display','block');
        // }
        // else
        // {
        //    $('#menu-8').css('display','none'); 
        // }

        x8++;  
      }
      else
      {
            alert('Allowed limit is Over');
      } 
        
    });




    // remove row
    $(document).on('click', '.removeRow8', function () {
        $(this).closest('.b1').remove();

         var wrapper8 = $("#block8");
         var len8 = $(wrapper8).children('div').length;
         // if(len8 >=1)
         // {
         //    $('#menu-8').css('display','block');
         // }
         // else
         // {
         //   $('#menu-8').css('display','none'); 
         // }
    });




  // End Template 8



  // Start Template 9

   var max_rows9   = 10;
   var wrapper9    = $("#block9");
   var x9 = 1; 
   $("#addRow9").click(function () {
      if(x9 < max_rows9){
       
        var html = '<div class="row b1 p-3">';
        html += '<div class="col-md-6">';
        html += '<label class="control-label"> <span class="text-danger"></span>Description</label>';
        html += '<div class="form-group"><textarea name="description4[]" class="form-control textarea" required></textarea></div></div>';
        html += '<div class="col-md-6">';
        html += '<label class="control-label"> <span class="text-danger"></span>Text</label>';
        html += '<div class="form-group"><input type="text" class="form-control" name="title4[]" required></div></div>';
        html += '<span class="btn btn-danger mt-2 removeRow5">Remove</span>';
        html += '</div></div>';
       
       $(wrapper9).append(html);
        addtemplate();

        var len9= $(wrapper9).children('div').length;
      

        x9++;  
      }
      else
      {
            alert('Allowed limit is Over');
      } 
        
    });




    // remove row
    $(document).on('click', '.removeRow9', function () {
        $(this).closest('.b1').remove();
         var wrapper9 = $("#block9");
         var len9 = $(wrapper9).children('div').length;
       
    });




  // End Template 9






  //Start Template 10

   var max_rows10   = 10;
   var wrapper10    = $("#block10");
   var x10 = 1; 
   $("#addRow10").click(function () {
      if(x10 < max_rows10){
       
      var html = '';
      html += '<div class="b1 p-3"><div class="row">';
      html += '<div class="col-md-8">';
      html += '<label class="control-label"><span class="text-danger"></span>Title</label>';
      html += '<div class="form-group"><input type="text" name="title1[]" class="form-control" required></div></div>';

      html +='<div class="col-md-4">';
      html += '<label for="image3" class="control-label"><span class="text-danger"></span>Image</label>';
      html += '<div class="form-group"><input type="file" name="image3[]"  class="form-control" required/></div></div>';
      html += '<div class="col-md-12"><span class="btn btn-danger mt-2 removeRow9">Remove</span></div>';
      html += '</div></div>';
       
       $(wrapper10).append(html);
        var len10= $(wrapper10).children('div').length;
        // if(len10 >=1)
        // {
        //     $('#menu-10').css('display','block');
        // }
        // else
        // {
        //    $('#menu-10').css('display','none'); 
        // }

        x9++;  
      }
      else
      {
            alert('Allowed limit is Over');
      } 
        
    });



    // remove row
    $(document).on('click', '.removeRow10', function () {
        $(this).closest('.b1').remove();

         var wrapper10 = $("#block10");
         var len10 = $(wrapper10).children('div').length;
         // if(len10 >=1)
         // {
         //    $('#menu-10').css('display','block');
         // }
         // else
         // {
         //   $('#menu-10').css('display','none'); 
         // }
    });


  //End Template 10 




  //Start Template 11

   var max_rows11   = 10;
   var wrapper11    = $("#block11");
   var x11 = 1; 
   $("#addRow11").click(function () {
      if(x11 < max_rows11){
       

      var html = '';
      html += '<div class="b1 p-3"><div class="row">';
      html += '<div class="col-md-12">';
      html += '<label class="control-label"><span class="text-danger"></span>Title</label>';
      html += '<div class="form-group"><input type="text" name="title2[]" class="form-control" required></div></div>';

      html += '<div class="col-md-12"><span class="btn btn-danger mt-2 removeRow9">Remove</span></div>';
      html += '</div></div>';
       
       $(wrapper11).append(html);
  

        var len11= $(wrapper11).children('div').length;
        // if(len9 >=1)
        // {
        //     $('#menu-9').css('display','block');
        // }
        // else
        // {
        //    $('#menu-9').css('display','none'); 
        // }

        x11++;  
      }
      else
      {
            alert('Allowed limit is Over');
      } 
        
    });



    // remove row
    $(document).on('click', '.removeRow11', function () {
        $(this).closest('.b1').remove();

         var wrapper11 = $("#block11");
         var len11 = $(wrapper11).children('div').length;
         // if(len9 >=1)
         // {
         //    $('#menu-9').css('display','block');
         // }
         // else
         // {
         //   $('#menu-9').css('display','none'); 
         // }
    });


  //End Template 11

// Template 12

   var wrapper12    = $("#block12");

   $("#addRow12").click(function () {
 
      var html = '';
      html += '<div class="b1 p-3"><div class="row">';
      html += '<div class="col-md-6">';
      html += '<label class="control-label"><span class="text-danger"></span>Description</label>';
      html += '<div class="form-group"><textarea name="description5[]" class="form-control textarea" required></textarea></div></div>';

      html += '<div class="col-md-2">';
      html += '<label class="control-label"><span class="text-danger"></span>Text</label>';
      html += '<div class="form-group"><input type="text" class="form-control" name="title5[]"></div></div>';

      html +='<div class="col-md-4">';
      html += '<label for="image4" class="control-label"><span class="text-danger"></span>Image</label>';
      html += '<div class="form-group"><input type="file" name="image4[]"  class="form-control" required/></div></div>';
    
      html += '<span class="btn btn-danger mt-2 removeRow3">Remove</span>';
      html += '</div></div>';
       
       $(wrapper12).append(html);
        addtemplate();
 
        
    });

    // remove row
    $(document).on('click', '.removeRow12', function () {
        $(this).closest('.b1').remove();

         var wrapper12    = $("#block12");
         var len12= $(wrapper12).children('div').length;
      

    });

//End Template 12




<?php } ?>

////////////


});

</script>

<script>
$(function () {
    $('.ckeditor').summernote();
    $('.textarea-big').summernote({
        height: 200,
    });
    $('.textarea').summernote({
    height: 200,
    });
})
function addtemplate()
{
   $('.textarea').summernote({
    height: 200,
    }); 
}

function addTinyMCE()
{
    // tinyMCE.init({
    // selector: '.tinyMCE-content-full',
    // // forced_root_block : "",
    // force_br_newlines : false,
    // force_p_newlines : true,
    // forced_root_block : '',
    // convert_urls: false,
    // height: 300,
    // // theme: 'modern',
    //  formats: {
    //     bold : {inline : 'b' },  
    //     //italic : {inline : 'i' },
    //     //underline : {inline : 'u'}
    // },
    // plugins: [
    // 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    // 'searchreplace wordcount visualblocks visualchars code fullscreen',
    // 'insertdatetime media nonbreaking save table contextmenu directionality',
    // 'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help image code',
    // 'media'
    // ],
    // toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontsizeselect',
    // toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',

    // fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
    // image_advtab: true,

    // file_picker_types: 'file image media',

    // images_upload_handler: function (blobInfo, success, failure) {
    //     var xhr, formData;
    //     xhr = new XMLHttpRequest();
    //     xhr.withCredentials = false;
    //     xhr.open('POST', '<?=base_url()?>tinymceFileUpload');
    //     var token = $('[name="csrf-token"]').prop('content');
    //     xhr.setRequestHeader("X-CSRF-Token", token);
    //     xhr.onload = function() {
    //         var json;
    //         if (xhr.status != 200) {
    //             failure('HTTP Error: ' + xhr.status);
    //             return;
    //         }
    //         json = JSON.parse(xhr.responseText);

    //         if (!json || typeof json.location != 'string') {
    //             failure('Invalid JSON: ' + xhr.responseText);
    //             return;
    //         }
    //         success(json.location);
    //     };
    //     formData = new FormData();
    //     formData.append('file', blobInfo.blob(), blobInfo.filename());
    //     xhr.send(formData);
    // },


    // file_picker_callback: function (cb, value, meta) {
    // var input = document.createElement('input');
    // input.setAttribute('type', 'file');
    // input.onchange = function () {
    //     var file = this.files[0];
    //     var reader = new FileReader();
                        
    //     // FormData
    //     var fd = new FormData();
    //     var files = file;
    //     fd.append('filetype',meta.filetype);
    //     fd.append("file",files);

    //     var filename = "";

    //     // AJAX
    //     var xhr, formData;
    //     xhr = new XMLHttpRequest();
    //     xhr.withCredentials = false;
    //     xhr.open('POST', '<?=base_url()?>media/tinymceFileUpload');
    //     xhr.onload = function() {
    //         var json;
    //         if (xhr.status != 200) {
    //             alert('HTTP Error: ' + xhr.status);
    //             return;
    //         }
    //         json = JSON.parse(xhr.responseText);
    //         if (!json || typeof json.location != 'string') {
    //             alert('Invalid JSON: ' + xhr.responseText);
    //             return;
    //         }
    //         filename = json.location;
    //         reader.onload = function(e) {
    //             cb(filename);
    //         };
    //         reader.readAsDataURL(file);
    //     };
    //     xhr.send(fd);
    //     return
    // };

    // input.click();
    // }                

    // });


}
</script>
<script type="text/javascript">
$('.tinyMCE-content-full-readonly').summernote();
//$('.tinyMCE-content-full-readonly').summernote('disable');
$('.tinyMCE-content-full-readonly').next().find(".note-editable").attr("contenteditable",false);


</script>

</body>
</html>