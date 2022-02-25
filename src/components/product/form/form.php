<!-- HTML Document -->

<bbn-form ref="form"
          :action="source.row.id ? 'admin/actions/product/edit' : 'admin/actions/product/insert'"
          :source="source.row"
          @success="success"
          :prefilled="true"
          :data="{
                 id: source.row.id ? source.row.id : null,
                 id_note: source.row.id_note ? source.row.id_note : null
                 }">
  <div class="bbn-grid-fields bbn-lpadded">
    <label class="bbn-b">
      <?=_('Title')?>
    </label>
    <bbn-input v-model="source.row.title"
               :required="true"/>

    <label class="bbn-b">
      <?=_('Web URL')?>
    </label>
    <appui-note-cms-url :source="source.row"
                        class="bbn-wider"
                        :readonly="true"/>

    <label v-if="source.row.id"
           class="bbn-b"
           style="margin-top:10px">
      <?=_('Front Image')?>
    </label>
    <bbn-button v-if="source.row.id"
                text="Select Front Image"
                type="button"
                :action="openPicker"/>

    <label class="bbn-b">
      <?=_('Provider')?>
    </label>
    <bbn-dropdown v-model="source.row.id_provider"
                  :required="true"
                  :source="providers"/>

    <label class="bbn-b">
      <?=_('Type')?>
    </label>
    <bbn-dropdown v-model="source.row.id_type"
                  :required="true"
                  :source="types"/>

    <label class="bbn-b">
      <?= _("Edition type") ?>
    </label>
    <bbn-dropdown v-model="source.row.id_edition"
                  :required="true"
                  :source="editions"/>

    <label class="bbn-b">
      <?=_('Purchase price')?>
    </label>
    <bbn-numeric v-model="source.row.price_purchase"
                 :nullable="true"
                 type="number"
                 :min="1"
                 :decimals="2"/>

    <label class="bbn-b">
      <?=_('Selling price')?>
    </label>
    <bbn-numeric v-model="source.row.price"
                 :nullable="true"
                 type="number"
                 :min="1"
                 :decimals="2"/>

    <label class="bbn-b">
      <?=_('Dimensions (H*w in mm)')?>
    </label>
    <bbn-input v-model="source.row.dimensions"/>

    <label class="bbn-b">
      <?=_('Weight in grams')?>
    </label>
    <bbn-numeric v-model="source.row.weight"
                 :nullable="true"
                 :step="100"
                 :min="0"/>

    <label class="bbn-b">
      <?=_('Stock')?>
    </label>
    <bbn-numeric v-model="source.row.stock"/>

    <label class="bbn-b">
      <?=_('Tags')?>
    </label>
    <bbn-values :source="tags"
                v-model="source.row.tags"/>

    <label class="bbn-b">
      <?=_('Active')?>
    </label>
    <bbn-switch v-model="source.row.active"
                :novalue="false"/>
  </div>
</bbn-form>
