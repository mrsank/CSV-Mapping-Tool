<?php include('header.php'); ?>
<div id="page-top-outer">
  <div id="page-top">
    <div class="clear"></div>
  </div>
</div>
<div class="clear">&nbsp;</div>
<div class="clear"></div>
<div id="content-outer">
<div id="content">
<div align="right"><a href="<?php echo $url; ?>">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $url; ?>main/upload_csv">CSV Upload</a></div>
<div id="page-heading" align="center">
  <h1>Order Details</h1>
</div>
<div id="page-heading" align="right">
<form action="<?php echo $url; ?>main/search" method="post">
  <input type="text" name="search"  />
  <input type="submit" value="Search" class="pure-button pure-button-xlarge"/>
</form>
</div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
  <tr>
    <th rowspan="3" class="sized"><img src="<?php echo $url; ?>assets/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="<?php echo $url; ?>assets/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
  </tr>
  <tr>
    <td id="tbl-border-left"></td>
    <td><div id="content-table-inner">
        <div id="table-content">
        <?php if(empty($records)){ ?><h1 align="center" style="color:#CC0000;font-size:36px;">No record</h1><?php  }else{  ?>
          <form id="mainform" action="">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
              <tr>
                <th class="table-header-repeat line-left minwidth-1"><a href="<?php echo $url; ?>main/<?php echo $sort_id; ?>">Order Id</a> </th>
                <th class="table-header-repeat line-left minwidth-1"><a href="<?php echo $url; ?>main/<?php echo $sort_fname; ?>">Customer First Name</a></th>
                <th class="table-header-repeat line-left"><a href="<?php echo $url; ?>main/<?php echo $sort_lname; ?>">Customer Last Name</a></th>
                <th class="table-header-repeat line-left"><a href="<?php echo $url; ?>main/<?php echo $sort_country; ?>">Ship Country</a></th>
                <th class="table-header-repeat line-left"><a href="<?php echo $url; ?>main/<?php echo $total; ?>">Total</a></th>
                <th class="table-header-options line-left"><a href="#">Options</a></th>
              </tr>
             <?php $count = 1; ?>
              <?php foreach($records as $data){ ?>
              <tr> 	
                <td><?php echo $data->cust_ord_id; ?></td>
                <td><?php echo $data->ship_first_name; ?></td>
                <td><?php echo $data->ship_last_name; ?></td>
                <td><?php echo $data->ship_country; ?></td>
                <td><?php echo $data->grand_total; ?></td>
                <td class="options-width"><a href="<?php echo $url; ?>main/edit_order/<?php echo $data->id; ?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="<?php echo $url; ?>main/view_order/<?php echo $data->id; ?>" title="View" class="icon-5 info-tooltip"></a> </td>
              </tr>
              <?php } ?>
            </table>
          </form>
          <?php } ?>
          <?php echo $this->pagination->create_links();?>
        </div>
        <div class="clear"></div>
      </div></td>
    <td id="tbl-border-right"></td>
  </tr>
  <tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
  </tr>
</table>
<?php include('footer.php'); ?>
