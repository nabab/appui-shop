<!-- HTML Document -->
<div class="appui-shop-transaction-details bbn-overlay">
  <bbn-table :source="source.cart">
    <bbns-column field="product"
                 :width="100"
                 title="<?=_("Title")?>"
                 :render="renderTitle">
    </bbns-column>
    <bbns-column field="product"
                 :render="renderProduct"
                 title="<?=_("Product")?>"
                 :width="150">
    </bbns-column>
    <bbns-column field="quantity"
                 :width="50"
                 title="<?=_("Qty")?>">
    </bbns-column>
    <bbns-column field="product.price"
                 :width="50"
                 title="<?=_("Price")?>"
                 :render="renderPrice">
    </bbns-column>
    <bbns-column field="product"
                 :width="100"
                 :render="renderProvider"
                 title="<?=_("Provider")?>">
    </bbns-column>
  </bbn-table>
  
</div>