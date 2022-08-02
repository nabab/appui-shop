<!-- HTML Document -->
<div class="appui-shop-transaction-details bbn-overlay">
  <bbn-splitter orientation="horizontal">
    <bbn-pane size="50%" :scrollable="true">
      <div class="bbn-c"><h2 v-text="detailsTitle"></h2></div>
      <div class="bbn-grid-fields bbn-hlpadded">
      
        <label class="bbn-b"><?=_('Client')?>:</label>
        <label class="bbn-l" v-text="renderClient"></label>

        <label class="bbn-b"><?=_('Email')?>:</label>
        <label class="bbn-l" v-text="source.client.email"></label>
        
        <label class="bbn-b"><?=_('Newsletter')?>:</label>
        <i :class="['bbn-l', {'nf nf-fa-check bbn-greeen':source.client.newsletter,'nf nf-fa-close bbn-red': !source.client.newsletter}]"/>
        
        <label class="bbn-b"><?=_('Shipping address')?>:</label>
        <label class="bbn-l" v-html="renderAddress"></label>

        <label class="bbn-b"><?=_('Billing address')?>:</label>
        <label class="bbn-l" v-html="renderBillingAddress"></label>

        <label class="bbn-b"><?=_('Order status')?>:</label>
        <label class="bbn-l" v-text="source.status"></label>

        <label class="bbn-b"><?=_('Payment type')?>:</label>
        <label class="bbn-l" v-text="source.payment_type"></label>

        <label class="bbn-b"><?=_('Product quantity')?>:</label>
        <label class="bbn-l" v-text="source.cart[0].quantity"></label>

        <label class="bbn-b"><?=_('Amount')?>:</label>
        <label class="bbn-l" v-text="money(source.cart[0].amount)"></label>

        <label class="bbn-b"><?=_('Shipping cost')?>:</label>
        <label class="bbn-l" v-text="money(source.cart[0].shipping_cost)"></label>

        <label class="bbn-b"><?=_('Total')?>:</label>
        <label class="bbn-l" v-text="money(source.total)"></label>

      </div>
    </bbn-pane>
    <bbn-pane>
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
    </bbn-pane>
  </bbn-splitter>
</div>