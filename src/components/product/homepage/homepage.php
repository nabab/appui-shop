<div class="appui-shop-product-homepage bbn-overlay">
  <bbn-scroll>
    <div class="bbn-hpadded bbn-w-100">
      <div class="bbn-xl bbn-light bbn-w-100 bbn-vlpadded">
        <?= _("Main product") ?>
      </div>

      <appui-shop-product-item :source="source"
                               class="bbn-alt-background"/>

      <div class="bbn-xl bbn-light bbn-w-100 bbn-vlpadded">
        <?= _("Variants") ?> ({{source.variants.length}})
      </div>

      <appui-shop-product-item v-for="(variant, i) in source.variants"
                               :key="variant.url"
                               :source="variant"
                               :variant="i+1"
                               class="bbn-alt-background bbn-bottom-space"/>

      <div class="bbn-bordered bbn-radius bbn-lpadded bbn-w-100 bbn-lg bbn-b bbn-p bbn-unselectable bbn-c bbn-alt-background"
           @click="addVariant">
        <i class="nf nf-fa-plus"></i> 
        <?= _("Add a new variant") ?>
      </div>
    </div>
  </bbn-scroll>
</div>
