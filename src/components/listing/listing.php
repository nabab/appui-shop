<!-- HTML Document -->

<div class="bbn-overlay appui-shop-listing">
  <appui-note-cms-list :types="types"
                       :columns="columns"
                       :url="root + 'data/products/'"
                       :source="source"
                       :id_type="source.id_type"
                       ref="list"
                       note-name="<?= _("Product") ?>"
                       :preview-url="noteRoot + 'note/cms/preview/'"
                       :insert-url="root + 'actions/product/insert'"
                       :delete-url="root + 'actions/product/delete'"
                       :editor-url="root + 'products/product/'"
                       insert-component="appui-shop-product-form"
                       :toolbar-types="false"/>
</div>
