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
<div align="right"><a href="<?php echo $url; ?>">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $url; ?>main/order_details">View Data</a></div>
<div id="page-heading">
  <h1 align="center">Upload CSV</h1>
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
          <?php if($page_status==1){ ?>
          <form enctype="multipart/form-data" method="post" action="<?php echo $url; ?>main/upload_csv">
            <table>
              <tr>
                <th>Upload :&nbsp;</th>
                <td><input type="file" name="userfile" class="file_1" /></td>
                <td><div class="bubble-left"></div>
                  <div class="bubble-inner"><?php echo $error; ?></div>
                  <div class="bubble-right"></div></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td valign="top"><br />
                  <input type="submit" value="" name="btnUpload" class="form-submit" style="margin-left:76px;" />
                </td>
                <td></td>
              </tr>
            </table>
          </form>
          <br />
          <?php } ?>
          <?php if($page_status==2){ ?>
          <form action="<?php echo $url; ?>main/upload_csv" method="post">
            <input type="hidden" name="hdnFile" value="<?php echo $file; ?>" />
            <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
            <tr>
                <th valign="top">First Name:</th>
                <td><select name="first_name">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td width="10px;"></td>
                <th valign="top">Last Name:</th>
                <td><select name="last_name">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Email:</th>
                <td><select name="email">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td width="10px;"></td>
                <th valign="top">Phone:</th>
                <td><select name="phone">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Shipping First Name:</th>
                <td><select name="ship_first_name">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td width="10px;"></td>
                <th valign="top">Shipping Last Name:</th>
                <td><select name="ship_last_name">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Shipping City:</th>
                <td><select name="ship_city">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td width="10px;"></td>
                <th valign="top">Shipping Street 1:</th>
                <td><select name="ship_street1">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Shipping Street 2:</th>
                <td><select name="ship_street2">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top">Shipping Postal Code:</th>
                <td><select name="ship_zip">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Shipping State :</th>
                <td><select name="ship_state">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top">Shipping Country:</th>
                <td><select name="ship_country">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Billing City:</th>
                <td><select name="inv_city">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td width="10px;"></td>
                <th valign="top">Billing Street 1:</th>
                <td><select name="inv_street1">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Billing Street 2:</th>
                <td><select name="inv_street2">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top">Billing Postal Code:</th>
                <td><select name="inv_zip">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr> </tr>
              <tr>
                <th valign="top">Quantity</th>
                <td><select name="quantity">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top">Price</th>
                <td><select name="price">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Product SKU</th>
                <td><select name="sku">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top">Product Name</th>
                <td><select name="name">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Company Name</th>
                <td><select name="ship_company">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top">Grand Total</th>
                <td><select name="grand_total">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Customer Order ID</th>
                <td><select name="cust_ord_id">
                    <?php foreach($csv_columns as $row){ ?>
                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td></td>
                <th valign="top"></th>
                <td>
                </td>
                <td></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td valign="top"><br />
                  <input type="submit" value="" name="btnUpdate" class="form-submit" style="margin-left:150px;" />
                </td>
                <td></td>
              </tr>
            </table>
          </form>
          <?php } ?>
        </div>
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
