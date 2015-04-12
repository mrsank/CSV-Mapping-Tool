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
<div align="right"><a href="<?php echo $url; ?>">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $url; ?>main/upload_csv">CSV Upload</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $url; ?>main/order_details">View Data</a></div>
<div id="page-heading">
  <h1 align="center">View Item</h1>
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
        <div id="table-content" align="center"> 
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
            <tr>
                <th valign="top">First Name:</th>
                <td><input type="text" name="first_name" value=" <?php echo $result[0]->ship_first_name;?>" readonly="readonly"/>
               
                </td>
                <td width="10px;"></td>
                <th valign="top">Last Name:</th>
                <td><input type="text" name="last_name" value=" <?php echo $result[0]->ship_last_name;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Email:</th>
                <td><input type="text" name="email"  value="<?php echo $result[0]->email;?>" readonly="readonly"/>
                </td>
                <td width="10px;"></td>
                <th valign="top">Phone:</th>
                <td><input type="text" name="phone" value="<?php echo $result[0]->phone;?>" readonly="readonly" />
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Shipping First Name:</th>
                <td><input type="text" name="ship_first_name"  value="<?php echo $result[0]->ship_first_name;?>" readonly="readonly"/>
                </td>
                <td width="10px;"></td>
                <th valign="top">Shipping Last Name:</th>
                <td><input type="text" name="ship_last_name"  value="<?php echo $result[0]->ship_last_name;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Shipping City:</th>
                <td><input type="text" name="ship_city"  value="<?php echo $result[0]->ship_city;?>" readonly="readonly"/>
                </td>
                <td width="10px;"></td>
                <th valign="top">Shipping Street 1:</th>
                <td><input type="text" name="ship_street1" value="<?php echo $result[0]->ship_street1;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Shipping Street 2:</th>
                <td><input type="text" name="ship_street2" value="<?php echo $result[0]->ship_street2;?>" readonly="readonly"/>
                </td>
                <td></td>
                <th valign="top">Shipping Postal Code:</th>
                <td><input type="text" name="ship_zip" value="<?php echo $result[0]->ship_zip;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Shipping State :</th>
                <td><input type="text" name="ship_state" value="<?php echo $result[0]->ship_state;?>" readonly="readonly"/>
                </td>
                <td></td>
                <th valign="top">Shipping Country:</th>
                <td><input type="text" name="ship_country" value="<?php echo $result[0]->ship_country;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Billing City:</th>
                <td><input type="text" name="inv_city" value="<?php echo $result[0]->inv_city;?>" readonly="readonly"/>
                </td>
                <td width="10px;"></td>
                <th valign="top">Billing Street 1:</th>
                <td><input type="text" name="inv_street1" value="<?php echo $result[0]->inv_street1;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Billing Street 2:</th>
                <td><input type="text" name="inv_street2" value="<?php echo $result[0]->inv_street2;?>" readonly="readonly"/>
                </td>
                <td></td>
                <th valign="top">Billing Postal Code:</th>
                <td><input type="text" name="inv_zip" value="<?php echo $result[0]->inv_zip;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Quantity</th>
                <td><input type="text" name="quantity" value="<?php echo $result[0]->quantity;?>" readonly="readonly"/>
                </td>
                <td></td>
                <th valign="top">Price</th>
                <td><input type="text" name="price" value="<?php echo $result[0]->price;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Product SKU</th>
                <td><input type="text" name="sku" value="<?php echo $result[0]->sku;?>" readonly="readonly"/>
                </td>
                <td></td>
                <th valign="top">Product Name</th>
                <td><input type="text" name="name" value="<?php echo $result[0]->name;?>" readonly="readonly"/>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Company Name</th>
                <td><input type="text" name="ship_company" value="<?php echo $result[0]->ship_company;?>" readonly="readonly" />
                </td>
                <td></td>
                <th valign="top">Grand Total</th>
                <td><input type="text" name="grand_total" value="<?php echo $result[0]->grand_total;?>" readonly="readonly" />
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Customer Order ID</th>
                <td><input type="text" name="cust_ord_id" value="<?php echo $result[0]->cust_ord_id;?>" readonly="readonly"/>
                </td>
                <td></td>
                <th valign="top"></th>
                <td>
                </td>
                <td></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
               <!-- <td valign="top"><br />
                  <input type="button" value="" class="form-submit" style="margin-left:-76px;" />
                </td>-->
                <td></td>
              </tr>
            </table>
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
