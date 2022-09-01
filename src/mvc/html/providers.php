<div class="appui-shop-photographers-container">
  <bbn-table :source="root + '/providers'"
             ref="table"
             :limit="10"
             :info="true"
             :pageable="true"
             :sortable="true"
             :filterable="true"
             editable="popup"
             :storage="true"
             storage-full-name="appui-shop-admin-providers"
             editor="appui-shop-provider-form"
             :toolbar="[{
               text: '<?=_('New provider')?>',
               icon: 'nf nf-fa-plus',
               action: 'insert'
             }]">
    <bbns-column field="id"
               :hidden="true">
    </bbns-column>
    <bbns-column field="name"
                 title="<?=_("Name")?>">
    </bbns-column>
    <bbns-column field="cfg"
                 :default="[]"
                 :hidden="true">
    </bbns-column>
    <bbns-column :width="220"
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
    </bbns-column>
  </bbn-table>
</div>
