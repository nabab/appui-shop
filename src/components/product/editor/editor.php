<!-- HTML Document -->
<div :class="componentClass">
  <appui-note-cms-editor :source="source"
                         class="appui-shop-product-editor"
                         prefix="product/"
                         :action="root + 'actions/product/update'"
                         component="appui-shop-product-fields"
                         :component-options="{source: source}"/>
</div>
