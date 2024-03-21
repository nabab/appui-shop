<!-- HTML Document -->

<div class="appui-shop-product-fields bbn-grid-fields bbn-c bbn-padded bbn-m">
  <label><?= _("Title") ?></label>
  <bbn-input v-model="source.title"
             :required="true"/>

  <label><?= _("Public URL") ?></label>
  <appui-note-field-url :source="source"
                        prefix="product/"
                        v-model="source.url"
                        :readonly="true"/>

  <label><?= _("Description") ?></label>
  <bbn-textarea v-model="source.excerpt"
                style="height: 10em; max-height: 20vh"/>

  <label style="margin-top:10px">
    <?= _('Front Image') ?>
  </label>
  <div>
    <appui-note-media-field v-model="source.id_media"
                            :source="source.medias"/>
  </div>

  <label>
    <?= _('Stock') ?>
  </label>
  <bbn-numeric v-model="source.stock"/>

  <label>
    <?= _('Active') ?>
  </label>
  <bbn-switch v-model="source.active"
              :novalue="false"/>

  <label>
    <?= _('Provider') ?>
  </label>
  <bbn-dropdown v-model="source.id_provider"
                :required="true"
                :source="providers"/>

  <label>
    <?= _('Type') ?>
  </label>
  <bbn-dropdown v-model="source.product_type"
                :required="true"
                :source="types"/>

  <label>
    <?= _("Edition type") ?>
  </label>
  <bbn-dropdown v-model="source.id_edition"
                :required="true"
                :source="editions"/>

  <label>
    <?= _('Purchase price') ?>
  </label>
  <bbn-numeric v-model="source.price_purchase"
               :decimals="2"/>

  <label>
    <?= _('Selling price') ?>
  </label>
  <bbn-numeric v-model="source.price"
               :decimals="2"/>

  <label>
    <?= _('Dimensions (H*w in mm)') ?>
  </label>
  <bbn-input v-model="source.dimensions"/>

  <label>
    <?= _('Weight in grams') ?>
  </label>
  <bbn-numeric v-model="source.weight"
               :step="100"
               :min="0"/>

  <label><?= _("Start of publication") ?></label>
  <div>
    <bbn-datetimepicker class="bbn-regular"
                        v-model="source.start"/>
  </div>

  <label><?= _("End of publication") ?></label>
  <div>
    <bbn-datetimepicker class="bbn-regular"
                        v-model="source.end"/>
  </div>

  <label><?= _("Tags") ?></label>
  <div>
    <bbn-values v-model="source.tags"/>
  </div>
</div>
