<div :class="componentClass"
     style="min-height: 50vh">
  <bbn-form ref="form"
            :action="root + (source.row.id ? 'actions/provider/edit' : 'actions/provider/insert')"
            :source="source.row"
            @success="success"
            :prefilled="true"
            :scrollable="false">
    <div class="bbn-overlay bbn-flex-height">
      <div class="bbn-grid-fields bbn-lpadded">
        <label class="bbn-b">
          <?=_ ('Name') ?>
        </label>
        <bbn-input v-model="source.row.name"
                   required="required"
                   :required="true">
        </bbn-input>
      </div>
      <div class="bbn-flex-fill">
        <appui-shop-provider-costs :source="source.row.cfg"></appui-shop-provider-costs>
      </div>
    </div>
  </bbn-form>
</div>
