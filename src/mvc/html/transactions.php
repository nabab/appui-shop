
<div class="appui-shop-transactions">
  <bbn-table :source="root + '/data/transactions'"
             ref="table"
             :limit="10"
             :info="true"
             :pageable="true"
             :sortable="true"
             :filterable="true"
             editable="popup"
             :storage="true"
             storage-full-name="appui-shop-admin-transactions"
             :toolbar="$options.components.toolbar"
             :order="[{
               field: 'moment',
               dir: 'desc'
             }]">
    <bbns-column field="id"
                 :invisible="true"/>
    <bbns-column field="moment"
                 type="datetime"
                 :width="150"
                 label="<?= _("Date") ?>"/>
    <bbns-column field="number"
                 :width="140"
                 label="<?= _("Number") ?>"/>
    <bbns-column field="client.name"
                 :render="renderClientName"
                 label="<?= _("Client name") ?>"
                 :filterable="false"/>
    <bbns-column field="total"
                 :width="100"
                 :render="renderMoney"
                 label="<?= _("Total") ?>"
                 cls="bbn-r"/>
    <bbns-column field="payment_type"
                 :width="100"
                 label="<?= _("Payment type") ?>"
                 :source="$root.options.paymentTypes"/>
    <bbns-column field="shipping_address"
                 :render="renderAddress"
                 label="<?= _("Shipping address") ?>"
                 :filterable="false"/>
    <bbns-column field="billing_address"
                 :render="renderBillingAddress"
                 label="<?= _("Billing address") ?>"
                 :filterable="false"/>
    <bbns-column field="status"
                 :width="100"
                 :component="$options.components.status"
                 label="<?= _("Status") ?>"
                 :source="status"/>
    <bbns-column flabel="<?= _("Details") ?>"
                 :width="40"
                 :buttons="[{
                   icon: 'nf nf-fa-eye',
                   action: cartDetails,
                   notext: true
                 }]"
                 cls="bbn-c"/>
  </bbn-table>
</div>
