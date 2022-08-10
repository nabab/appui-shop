
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
                 :hidden="true"/>
    <bbns-column field="moment"
                 type="datetime"
                 :width="150"
                 title="<?=_("Date")?>"/>
    <bbns-column field="number"
                 :width="140"
                 title="<?=_("Number")?>"/>
    <bbns-column field="client.name"
                 :render="renderClientName"
                 title="<?=_("Client name")?>"
                 :filterable="false"/>
    <bbns-column field="total"
                 :width="100"
                 :render="renderMoney"
                 title="<?=_("Total")?>"
                 cls="bbn-r"/>
    <bbns-column field="payment_type"
                 :width="100"
                 title="<?=_("Payment type")?>"
                 :source="$root.options.paymentTypes"/>
    <bbns-column field="shipping_address"
                 :render="renderAddress"
                 title="<?=_("Shipping address")?>"
                 :filterable="false"/>
    <bbns-column field="billing_address"
                 :render="renderBillingAddress"
                 title="<?=_("Billing address")?>"
                 :filterable="false"/>
    <bbns-column field="status"
                 :width="100"
                 :component="$options.components.status"
                 title="<?=_("Status")?>"
                 :source="status"/>
    <bbns-column ftitle="<?=_("Details")?>"
                 :width="40"
                 :buttons="[{
                   icon: 'nf nf-fa-eye',
                   action: cartDetails,
                   notext: true
                 }]"
                 cls="bbn-c"/>
  </bbn-table>
</div>
