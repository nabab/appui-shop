<!-- HTML Document -->
<div class="bbn-overlay appui-shop-products-container">
  <bbn-router :nav="true"
              :storage="true"
              :base-url="root + 'products/'">
    <bbn-container url="list"
                   :pinned="true"
                   :cached="true"
                   component="appui-shop-listing"
                   :options="source"
                   title="<?= _("Products' list") ?>"/>
  </bbn-router>
</div>
