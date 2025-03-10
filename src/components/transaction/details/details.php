<!-- HTML Document -->
<div class="appui-shop-transaction-details bbn-overlay">
  <bbn-splitter orientation="horizontal">
    <bbn-pane size="40%"
              :scrollable="true"
              class="appui-shop-transaction-details-left">
      <div class="bbn-c bbn-b bbn-padding bbn-background bbn-xl"
           v-text="detailsTitle"/>
      <div v-if="!!source.test"
            class="bbn-c bbn-padding bbn-top-lspace">
        <span class="bbn-b bbn-red bbn-upper bbn-lg bbn-spadding bbn-background"
              v-text="_('Test mode')"/>
      </div>
      <div class="bbn-grid-fields bbn-lpadding">
        <label class="bbn-b bbn-label"><?= _('Order number') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="source.number"/>
        <label class="bbn-b bbn-label"><?= _('Client') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="renderClient"/>
        <label class="bbn-b bbn-label"><?= _('Email') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="source.client.email"/>
        <label class="bbn-b bbn-label"><?= _('Shipping address') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-html="renderAddress"/>
        <label class="bbn-b bbn-label"><?= _('Billing address') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-html="renderBillingAddress"/>
        <label class="bbn-b bbn-label"><?= _('Order status') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="renderStatus"/>
        <label class="bbn-b bbn-label"><?= _('Transaction reference') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-html="source.reference ? source.reference : '&nbsp;'"/>
        <label class="bbn-b bbn-label"
                v-if="source.error_message"><?= _('Transaction error message') ?>:</label>
        <div v-if="source.error_message"
              class="bbn-background bbn-spadding"
              v-text="source.error_message"/>
        <label class="bbn-b bbn-label"><?= _('Payment type') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="renderPyamentType"/>
        <label class="bbn-b bbn-label"><?= _('Products quantity') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="source.products.length"/>
        <label class="bbn-b bbn-label"><?= _('Amount') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="money(sum(source.products, 'amount'))"/>
        <label class="bbn-b bbn-label"><?= _('Shipping cost') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="money(source.shipping_cost)"/>
        <label class="bbn-b bbn-label"><?= _('Total') ?>:</label>
        <div class="bbn-background bbn-spadding"
              v-text="money(source.total)"/>
      </div>
    </bbn-pane>
    <bbn-pane>
      <div class="bbn-flex-height bbn-border-left">
        <div class="bbn-c bbn-b bbn-padding bbn-background bbn-xl bbn-border-bottom"
             v-text="_('Products')"/>
        <div class="bbn-flex-fill">
          <bbn-table :source="source.products"
                     class="bbn-no-border">
            <bbns-column field="product"
                        :width="100"
                        label="<?= _("Title") ?>"
                        :render="renderTitle"/>
            <bbns-column field="product"
                        :render="renderProduct"
                        label="<?= _("Product") ?>"
                        :width="150"/>
            <bbns-column field="quantity"
                        :width="50"
                        label="<?= _("Qty") ?>"/>
            <bbns-column field="product.price"
                        :width="50"
                        label="<?= _("Price") ?>"
                        :render="renderPrice"/>
            <bbns-column field="product"
                        :width="100"
                        :render="renderProvider"
                        label="<?= _("Provider") ?>"/>
          </bbn-table>
        </div>
      </div>
    </bbn-pane>
  </bbn-splitter>
</div>