<div class="appui-shop-product bbn-overlay">
  <bbn-router :nav="true">
    <bbn-container component="appui-shop-product-homepage"
                   url="home"
                   :pinned="true"
                   icon="nf nf-fa-home"
                   title="<?= _("Main page") ?>"
                   :source="source"/>
    <bbn-container component="appui-shop-product-editor"
                   url="editor"
                   :pinned="true"
                   icon="nf nf-fa-edit"
                   title="<?= _("Editor") ?>"
                   :source="source"/>
    <bbn-container v-for="(variant, i) in source.variants"
                   component="appui-shop-product-editor"
                   :source="variant"
                   :pinned="true"
                   :url="'variant' + (i+1)"
                   :title="_('Variant') + ' ' + (i+1)"
                   :key="variant.url"/>
  </bbn-router>
</div>
