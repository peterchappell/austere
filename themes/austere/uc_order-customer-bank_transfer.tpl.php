<?php
// $Id: uc_order-customer-bank_transfer.tpl.php,v 1.1 2010/07/20 15:30:29 xibun Exp $

/**
 * @file
 * This file is the default customer invoice template for Ubercart.
 */
?>

<table width="602px" border="0" cellspacing="0" cellpadding="1" align="center" bgcolor="#181818" style="font-family: verdana, arial, helvetica; font-size: small;">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" bgcolor="#FFFFFF" style="font-family: verdana, arial, helvetica; font-size: small;">
        <?php if ($business_header) { ?>
        <tr valign="top">
          <td>
            <table width="100%" style="font-family: verdana, arial, helvetica; font-size: small; color: #181818;">
              <tr>
                <td>
                    <img src="http://www.austere.com.au/shop/sites/all/themes/austere/email_header.gif" alt="Austere" width="580" height="79"/>
                </td>
              </tr>
              <tr>
                <td align="right" style="padding-right: 10px;">ABN: 61 885 501 107</td>
              </tr>
            </table>
            <div style="padding-top:1em;padding-bottom:1.5em;margin-bottom:0;border-bottom:1px solid #ccc;margin-left:25px;margin-right:5px;">
            <?php echo $store_address; ?><br /><?php echo $store_phone; ?>
            </div>
          </td>
        </tr>
        <?php } ?>

        <tr valign="top">
          <td style="padding-left:30px;padding-right:7px;">

            <?php if ($thank_you_message) { ?>
                <p><b><?php echo t('Thanks for your order, !order_first_name!', array('!order_first_name' => $order_first_name)); ?></b></p>
                <p><b><?php echo t('Want to manage your order online?'); ?></b><br />
                <?php echo t('If you need to check the status of your order, please visit our home page at !store_link and click on "My account" in the menu or login with the following link:', array('!store_link' => $store_link)); ?>
                <br /><br /><?php echo $site_login; ?></p>
                <?php if (isset($_SESSION['new_user'])) { ?>
                <p><b><?php echo t('An account has been created for you with the following details:'); ?></b></p>
                <p><b><?php echo t('Username:'); ?></b> <?php echo $new_username; ?><br />
                <b><?php echo t('Password:'); ?></b> <?php echo $new_password; ?></p>
                <?php } ?>
            <?php } ?>

            <table cellpadding="4" cellspacing="0" border="0" width="100%" style="font-family: verdana, arial, helvetica; font-size: small;">
              <tr>
                <td colspan="2" bgcolor="#666666" style="color: white;">
                  <b><?php echo t('Purchasing Information:'); ?></b>
                </td>
              </tr>
              <tr><td colspan="2" style="height:0.5em;"></td></tr>
              <tr>
                <td nowrap="nowrap">
                  <b><?php echo t('E-mail Address:'); ?></b>
                </td>
                <td width="98%">
                  <?php echo $order_email; ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <table width="100%" cellspacing="0" cellpadding="0" style="font-family: verdana, arial, helvetica; font-size: small;">
                    <tr>
                      <td valign="top" width="50%">
                        <b><?php echo t('Billing Address:'); ?></b><br />
                        <?php echo $order_billing_address; ?><br />
                        <br />
                        <b><?php echo t('Billing Phone:'); ?></b><br />
                        <?php echo $order_billing_phone; ?><br />
                      </td>
                      <?php if (uc_order_is_shippable($order)) { ?>
                      <td valign="top" width="50%">
                        <b><?php echo t('Shipping Address:'); ?></b><br />
                        <?php echo $order_shipping_address; ?><br />
                        <br />
                        <b><?php echo t('Shipping Phone:'); ?></b><br />
                        <?php echo $order_shipping_phone; ?><br />
                      </td>
                      <?php } ?>
                    </tr>
                  </table>

                </td>
              </tr>
              <tr>
                <td nowrap="nowrap">
                  <b><?php echo t('Order Grand Total:'); ?></b>
                </td>
                <td width="98%">
                  <b><?php echo $order_total; ?></b>
                </td>
              </tr>
              <tr>
                <td nowrap="nowrap">
                  <b><?php echo t('Payment Method:'); ?></b>
                </td>
                <td width="98%">
                  <?php echo $order_payment_method; ?>
                </td>
              </tr>
              <?php if($order->payment_method=='bank_transfer') { ?>
              <tr>
                <td nowrap="nowrap" vAlign="top">
                  <b><?php echo t('To:'); ?></b>
                </td>
                <td width="98%">
                  <?php echo $order_payment_bank_details; ?>
                </td>
              </tr>
              <?php } ?>
              <tr><td colspan="2">&nbsp;</td></tr>
              <tr>
                <td colspan="2" bgcolor="#666666" style="color: white;">
                  <b><?php echo t('Order Summary:'); ?></b>
                </td>
              </tr>

              <?php if (uc_order_is_shippable($order)) { ?>
              <tr>
                <td colspan="2" bgcolor="#EEEEEE">
                  <b style="color:#666666;"><?php echo t('Shipping Details:'); ?></b>
                </td>
              </tr>
              <?php } ?>

              <tr>
                <td colspan="2">

                  <table border="0" cellpadding="1" cellspacing="0" width="100%" style="font-family: verdana, arial, helvetica; font-size: small;">
                    <tr>
                      <td nowrap="nowrap">
                        <b><?php echo t('Order #:'); ?></b>
                      </td>
                      <td width="98%">
                        <?php echo $order_link; ?>
                      </td>
                    </tr>

                    <tr>
                      <td nowrap="nowrap">
                        <b><?php echo t('Order Date: '); ?></b>
                      </td>
                      <td width="98%">
                        <?php echo $order_date_created; ?>
                      </td>
                    </tr>

                    <?php if ($shipping_method && uc_order_is_shippable($order)) { ?>
                    <tr>
                      <td nowrap="nowrap">
                        <b><?php echo t('Shipping Method:'); ?></b>
                      </td>
                      <td width="98%">
                        <?php echo $order_shipping_method; ?>
                      </td>
                    </tr>
                    <?php } ?>

                    <tr>
                      <td nowrap="nowrap">
                        <?php echo t('Products Subtotal:'); ?>&nbsp;
                      </td>
                      <td width="98%">
                        <?php echo $order_subtotal; ?>
                      </td>
                    </tr>

                    <?php
                    $context = array(
                      'revision' => 'themed',
                      'type' => 'line_item',
                      'subject' => array(
                        'order' => $order,
                      ),
                    );
                    foreach ($line_items as $item) {
                    if ($item['line_item_id'] == 'subtotal' || $item['line_item_id'] == 'total') {
                      continue;
                    }?>

                    <tr>
                      <td nowrap="nowrap">
                        <?php echo $item['title']; ?>:
                      </td>
                      <td>
                        <?php
                          $context['subject']['line_item'] = $item;
                          echo uc_price($item['amount'], $context);
                        ?>
                      </td>
                    </tr>

                    <?php } ?>

                    <tr>
                      <td>&nbsp;</td>
                      <td>------</td>
                    </tr>

                    <tr>
                      <td nowrap="nowrap">
                        <b><?php echo t('Total for this Order:'); ?>&nbsp;</b>
                      </td>
                      <td>
                        <b><?php echo $order_total; ?></b>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2">
                        <br /><br /><b><?php echo t('Products on order:'); ?>&nbsp;</b>

                        <table width="100%" style="font-family: verdana, arial, helvetica; font-size: small;">

                          <?php if (is_array($order->products)) {
                            $context = array(
                              'revision' => 'formatted',
                              'type' => 'order_product',
                              'subject' => array(
                                'order' => $order,
                              ),
                            );
                            foreach ($order->products as $product) {
                              $price_info = array(
                                'price' => $product->price,
                                'qty' => $product->qty,
                              );
                              $context['subject']['order_product'] = $product;
                              $context['subject']['node'] = node_load($product->nid);
                              ?>
                          <tr>
                            <td valign="top" nowrap="nowrap">
                              <b><?php echo $product->qty; ?> x </b>
                            </td>
                            <td width="98%">
                              <b><?php echo $product->title .' - '. uc_price($price_info, $context); ?></b>
                              <?php if ($product->qty > 1) {
                                $price_info['qty'] = 1;
                                echo t('(!price each)', array('!price' => uc_price($price_info, $context)));
                              } ?>
                              <br />
                              <?php echo t('SKU: ') . $product->model; ?><br />
                              <?php if (is_array($product->data['attributes']) && count($product->data['attributes']) > 0) {?>
                              <?php foreach ($product->data['attributes'] as $attribute => $option) {
                                echo '<li>'. t('@attribute: @options', array('@attribute' => $attribute, '@options' => implode(', ', (array)$option))) .'</li>';
                              } ?>
                              <?php } ?>
                              <br />
                            </td>
                          </tr>
                          <?php }
                              }?>
                        </table>

                      </td>
                    </tr>
                  </table>

                </td>
              </tr>

              <?php if ($help_text || $email_text || $store_footer) { ?>
              <tr>
                <td colspan="2">
                  <hr noshade="noshade" size="1" /><br />

                  <?php if ($help_text) { ?>
                  <p><b><?php echo t('Where can I get help with reviewing my order?'); ?></b></p>
                  <p><?php echo t('To learn more about managing your orders on !store_link, please <a href="http://www.austere.com.au/shop/contact">contact Austere</a>.', array('!store_link' => $store_link, '!store_help_url' => $store_help_url)); ?></p>
                  <?php } ?>

                  <?php if ($email_text) { ?>
                  <p><?php echo t('Please note: This e-mail message is an automated notification. Please do not reply to this message.'); ?></p>

                  <p><?php echo t('Thanks again for shopping with us.'); ?></p>
                  <?php } ?>

                  <?php if ($store_footer) { ?>
                  <p><b><?php echo $store_link; ?></b><br /><b><?php echo $site_slogan; ?></b></p>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>

            </table>
            <p>&nbsp;</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
