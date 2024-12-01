<div :class="[componentClass, 'bbn-w-100']"
     style="min-height: 50vh">
  <bbn-form ref="form"
            :action="root + (source.row.id ? 'actions/provider/edit' : 'actions/provider/insert')"
            :source="source.row"
            @success="success"
            :prefilled="true"
            :scrollable="false">
    <div class="bbn-w-100">
      <div class="bbn-grid-fields bbn-lpadding">
        <label class="bbn-b">
          <?= _ ('Name')  ?>
        </label>
        <bbn-input v-model="source.row.name"
                   required="required"
                   :required="true"/>
      </div>
    </div>
    <div class="bbn-w-100">
      <appui-shop-provider-costs :source="source.row.cfg"/>
    </div>
  </bbn-form>
</div>
