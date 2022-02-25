<div class="bbn-overlay poc-products-container">
  <bbn-table source="admin/products/list"
             ref="table"
             :info="true"
             :storage="true"
             url="admin/products/actions"
             editable="popup"
             editor="poc-product-form"
             :pageable="true"
             :data="source"
             :sortable="true"
             :showable="true"
             :filterable="true"
  					 :toolbar="$options.components['toolbar']"
             :selection="true"
             button-mode="menu">
    <bbns-column title=" "
                 :buttons="rowMenu"
                 :filterable="false"
                 :showable="false"
                 :sortable="false"
                 :width="30"
                 cls="bbn-c"/>
    <bbns-column field="id"
                 :hidden="true"
                 :editable="false"
                 :min-Width="130"
                 title="<?= _("ID") ?>"/>
    <bbns-column field="title"
                 :min-Width="250"
                 title="<?= _("Title") ?>"/>
    <bbns-column field="url"
                 title="<?= _("URL") ?>"
                 editor="appui-note-cms-url"
                 :min-Width="200"
                 :render="renderUrl"/>
    <bbns-column field="id_user"
                 :editable="false"
                 title="<?= _("Creator") ?>"
                 :width="200"
                 :source="users"/>
    <bbns-column field="excerpt"
                 :editable="false"
                 :hidden="true"
                 :width="250"
                 title="<?= _("Excerpt") ?>"/>
    <!--bbns-column field="content"
                 title="<?= _("Content") ?>"
                 :filterable="false"
                 :render="renderContent"/-->
    <bbns-column field="front_img"
                 title="<?= _("Cover Image") ?>"
                 :render="frontImgRender"
                 :editable="false"
                 class="bbn-middle"
                 :width="200"/>
    <!--take the name of provider-->
    <bbns-column field="id_provider"
                 :render="renderProvider"
                 title="<?= _("Provider") ?>"
                 :width="100"/>
    <bbns-column field="id_type"
                 :source="types"
                 title="<?= _("Type") ?>"
                 :width="100"/>
    <bbns-column field="id_edition"
                 :source="editions"
                 title="<?= _("Edition type") ?>"
                 :width="130"/>
    <bbns-column field="price_purchase"
                 title="<?= _("Purchase price") ?>"
                 :render="renderPurchase"
                 type="money"
                 :nullable="true"
                 editor="bbn-numeric"
                 :width="60"/>
    <bbns-column field="price"
                 title="<?= _("Sell price") ?>"
                 :render="renderSell"
                 :nullable="true"
                 editor="bbn-numeric"
                 type="money"
                 :width="120"/>
    <bbns-column field="dimensions"
                 title="<?= _("Dimensions") ?>"
                 ftitle="<?= _("Dimensions").' ('._("Width x Height in millimeters").')' ?>"
                 :width="120"/>
    <bbns-column field="weight"
                 :render="renderWeight"
                 title="<?= _("Weight") ?>"
                 ftitle="<?= _("Weight in grams") ?>"
                 type="number"
                 :nullable="true"
                 :width="120"/>
    <!--take types in the model of table-->
    <bbns-column field="stock"
                 title="<?= _("Stock") ?>"
                 editor="bbn-numeric"
                 type="number"
                 :width="70"/>
    <bbns-column field="creation"
                 :editable="false"
                 type="date"
                 :width="120"
                 title="<?= _("Creation") ?>"/>
    <bbns-column field="start"
                 type="date"
                 :editable="false"
                 :width="120"
                 title="<?= _("Publication") ?>"/>
    <bbns-column field="end"
                 type="datetime"
                 :editable="false"
                 :width="120"
                 title="<?= _("End") ?>"/>
    <bbns-column :width="80"
                 field="version"
                 :editable="false"
                 title="<?= _("Version") ?>"
                 cls="bbn-c"/>
    <bbns-column field="num_medias"
                 :width="50"
                 :editable="false"
                 title="<i class='nf nf-fa-file_photo_o'> </i>"
                 ftitle="<?= _("Number of medias associated with this entry") ?>"
                 type="number"
                 cls="bbn-c"/>
    <bbns-column field="num_tags"
                 title="#<?= _("Tags") ?>"
                 type="number"
                 :editable="false"
                 class="bbn-middle"
                 :width="70"/>
    <bbns-column field="active"
                 title="Public"
                 :editable="false"
                 :width="70"
                 ftitle="<?= _("Public") ?>"
                 :render="renderPublic"/>

    <bbns-column field="num_media"
                 title="<?= _("Num. Media") ?>"
                 ftitle="Num. Media"
                 :editable="false"
                 :render="renderNumMedia"
                 :width="80"/>
  </bbn-table>
</div>
