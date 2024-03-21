<!-- HTML Document -->

<bbn-form ref="form"
          :action="root + 'actions/product/insert'"
          :source="formData"
          @success="success"
          :prefilled="true"
          :data="{
                 id: formData.id ? formData.id : null,
                 id_note: formData.id_note ? formData.id_note : null
                 }">
  <div class="bbn-grid-fields bbn-lpadded">
    <label class="bbn-b">
      <?= _('Title') ?>
    </label>
    <bbn-input v-model="formData.title"
               :required="true"/>

    <label class="bbn-b">
      <?= _('Web URL') ?>
    </label>
    <appui-note-field-url :source="formData"
                          class="bbn-wider"
                          :prefix="prefix"
                          v-model="formData.url"/>

    <label class="bbn-b">
      <?= _('Provider') ?>
    </label>
    <bbn-dropdown v-model="formData.id_provider"
                  :required="true"
                  :source="providers"/>

    <label class="bbn-b">
      <?= _('Type') ?>
    </label>
    <bbn-dropdown v-model="formData.product_type"
                  :required="true"
                  :source="types"/>

    <label class="bbn-b">
      <?= _("Edition type") ?>
    </label>
    <bbn-dropdown v-model="formData.id_edition"
                  :required="true"
                  :source="editions"/>

    <label class="bbn-b">
      <?= _('Purchase price') ?>
    </label>
    <bbn-numeric v-model="formData.price_purchase"
                 :nullable="true"
                 type="number"
                 :min="1"
                 :decimals="2"/>

    <label class="bbn-b">
      <?= _('Selling price') ?>
    </label>
    <bbn-numeric v-model="formData.price"
                 :nullable="true"
                 type="number"
                 :min="1"
                 :decimals="2"/>

    <label class="bbn-b">
      <?= _('Dimensions (H*w in mm)') ?>
    </label>
    <bbn-input v-model="formData.dimensions"/>

    <label class="bbn-b">
      <?= _('Weight in grams') ?>
    </label>
    <bbn-numeric v-model="formData.weight"
                 :nullable="true"
                 :step="100"
                 :min="0"/>

    <label class="bbn-b">
      <?= _('Stock') ?>
    </label>
    <bbn-numeric v-model="formData.stock"
                 :required="true"/>

  </div>
</bbn-form>
