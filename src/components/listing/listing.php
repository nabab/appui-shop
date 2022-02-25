<!-- HTML Document -->

<div class="bbn-overlay appui-shop-listing">
  <appui-note-cms-list :types="types"
                       :columns="columns"
                       :url="root + 'products/list'"
                       note-name="<?= _("Product") ?>"
                       :preview-url="noteRoot + 'note/cms/preview/'"
                       :insert-url="root + 'actions/product/insert'"
                       :delete-url="root + 'actions/product/delete'"
                       :editor-url="root + 'products/product/'"
                       :insert-component="$options.components.insert">
  </appui-note-cms-list>
</div>
