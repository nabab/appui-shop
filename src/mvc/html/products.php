<!-- HTML Document -->
<div class="bbn-overlay appui-shop-products-container">
  <bbn-router :nav="true"
              :storage="true"
              :base-url="root + 'products/'"
              :autoload="true">
    <bbn-container url="list"
                   :pinned="true"
                   :cached="true"
                   component="appui-shop-listing"
                   :source="source"
                   title="<?= _("Products' list") ?>"></bbn-container>
  </bbn-router>
</div>
