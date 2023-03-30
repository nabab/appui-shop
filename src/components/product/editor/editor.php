<!-- HTML Document -->
<appui-note-cms-editor :source="source"
                       class="appui-shop-product-editor"
                       prefix="product/"
                       :action="root + 'actions/product/update'">
  <bbn-scroll>
    <appui-shop-product-fields :source="source"/>
  </bbn-scroll>
</appui-note-cms-editor>
