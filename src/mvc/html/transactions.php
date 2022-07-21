
<div class="appui-shop-transactions">
  <bbn-table :source="root + '/transactions'"
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
             >
    <bbns-column field="id"
               :hidden="true">
    </bbns-column>
    <bbns-column field="client.name"
                 :render="renderClientName"
                 title="<?=_("Client name")?>">
    </bbns-column>
    <bbns-column field="cart"
                 :component="$options.components.cart"
                 title="<?=_("Cart")?>"
                 :width="30">
    </bbns-column>

    <bbns-column field="total"
                 :width="100"
                 :render="renderMoney"
                 title="<?=_("Total")?>">
    </bbns-column>
    <bbns-column field="payment_type"
                 :width="100"
                 title="<?=_("Payment type")?>">
    </bbns-column>
    <bbns-column field="address"
                 :render="renderAddress"
                 title="<?=_("Shipping address")?>">
    </bbns-column>
    <bbns-column field="status"
                 :width="100"
                 :component="$options.components.status"
                title="<?=_("Status")?>">
    </bbns-column>
    <bbns-column field="moment"
                 type="datetime"
                 :width="150"
                 title="<?=_("Date")?>">
    </bbns-column>
    <!---column :width="220"
                  title="<?=_("Actions")?>"
                  cls="bbn-c"
                  :buttons="[{
                    icon: 'nf nf-fa-edit',
                    title: '<?=_('Edit Provider')?>',
                    action: 'edit'
                  }, {
                    icon: 'nf nf-mdi-delete',
                    title: '<?=_('Delete Provider')?>',
                    action: deleteProvider
                  }]">
    </bbns-column-->
  </bbn-table>
</div>
