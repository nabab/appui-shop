<!-- HTML Document -->
<appui-note-cms-editor :source="source"
                       class="poc-product-editor"
                       prefix="product/"
                       :action="root + 'actions/product/update'">
  <bbn-scroll>
    <poc-product-fields :source="source"/>
  </bbn-scroll>
</appui-note-cms-editor>
