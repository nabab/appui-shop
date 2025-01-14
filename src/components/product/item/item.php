<!-- HTML Document -->

<div class="appui-shop-product-item bbn-border bbn-radius bbn-hlpadding bbn-vpadding bbn-w-100">
  <div class="bbn-grid">
    
    <div class="bbn-100 bbn-middle">
      <img :src="source.front_img ? source.front_img.path : ''"
           style="max-height: 100%; width: auto; max-width: 10em">
    </div>
    <div>
      <div class="bbn-w-100 bbn-lg bbn-b bbn-flex-width">
        <div class="bbn-flex-width">
          <div class="bbn-flex-fill">
            <bbn-flag value="en"></bbn-flag>
            <a :href="source.url"
               target="source.id"
               v-text="source.title"/>
          </div>
          <div class="bbn-padding-left bbn-nowrap">
            <bbn-button label="<?= _("Edit product") ?>"
                        :notext="true"
                        @click="openEditor"
                        class="bbn-right-xspace"
                        icon="nf nf-fa-edit"/>
            <bbn-button label="<?= _("Add translation") ?>"
                        :notext="true"
                        @click="addTranslation"
                        class="bbn-right-xspace"
                        icon="nf nf-mdi-translate"/>
            <bbn-button label="<?= _("Sales statictics") ?>"
                        :notext="true"
                        class="bbn-right-xspace"
                        icon="nf nf-oct-graph"/>
            <bbn-button v-if="source.id_main && !source.cart_number"
                        label="<?= _("Delete variant") ?>"
                        :notext="true"
                        @click="deleteVariant"
                        class="bbn-right-space"
                        icon="nf nf-fa-trash_o"/>
            <bbn-button v-if="source.id_main && source.cart_number && source.active"
                        label="<?= _("Deactivate variant") ?>"
                        :notext="true"
                        @click="deactivateVariant"
                        class="bbn-right-space"
                        icon="nf nf-cod-stop_circle"/>
            <bbn-button v-if="source.id_main && source.cart_number && !source.active"
                        label="<?= _("Activate variant") ?>"
                        :notext="true"
                        @click="activateVariant"
                        class="bbn-right-space"
                        icon="nf nf-cod-play_circle"/>
            <bbn-context :source="[]"
                         class="bbn-left-sspace">
              <i class="nf nf-mdi-dots_horizontal bbn-lg bbn-p"/>
            </bbn-context>
          </div>
        </div>
      </div>

      <hr class="bbn-hr bbn-w-100">

      <div class="bbn-grid bbn-bottom-space price">
        <div class="bbn-middle">
          <div class="bbn-radius bbn-background bbn-block bbn-spadding bbn-green"
               v-if="isPublished">
            <i class="nf nf-fa-check"></i> 
            <span class="bbn-light bbn-s"><?= _("Published") ?></span><br>
            <span class="bbn-lg" v-text="fdate(source.start)"/>
          </div>
          <div class="bbn-radius bbn-background bbn-block bbn-spadding bbn-red"
               v-else-if="!source.start">
            <i class="nf nf-fa-check"></i> 
            <span class="bbn-light bbn-s"><?= _("Never published") ?></span>
          </div>
          <div class="bbn-radius bbn-background bbn-block bbn-spadding bbn-orange"
               v-else>
            <i class="nf nf-fa-check"></i> 
            <span class="bbn-light bbn-s"><?= _("Ended") ?></span><br>
            <span class="bbn-lg" v-text="fdate(source.end)"/>
          </div>
        </div>
        <div class="bbn-middle">
          <div class="bbn-webblue bbn-radius bbn-background bbn-block bbn-spadding">
            <span class="bbn-light bbn-s"><?= _("Public price") ?></span><br>
            <span class="bbn-xl" v-text="source.price ? source.price + ' €' : 'N/A'"/>
          </div>
        </div>
        <div class="bbn-middle">
          <div class="bbn-webblue bbn-radius bbn-background bbn-block bbn-spadding">
            <span class="bbn-light bbn-s"><?= _("Purchase price") ?></span><br>
            <span class="bbn-xl" v-text="source.price_purchase ? source.price_purchase + ' €' : 'N/A'"/>
          </div>
        </div>
      </div>

      <div class="bbn-grid"
           :style="{gridTemplateColumns: 'repeat(' + (realSales.length || 1) + ', 1fr)'}">
        <div v-for="sale in realSales"
             class="bbn-middle">
          <div class="bbn-blue bbn-radius bbn-background bbn-block bbn-spadding">
            <span class="bbn-light bbn-s"
                  v-text="salesPeriods[sale.name]"></span><br>
            <span class="bbn-xl" v-text="money(sale.total) + ' €'"/>
          </div>
        </div>
        <div class="bbn-middle"
             v-if="!realSales.length">
          <div class="bbn-radius bbn-background bbn-block bbn-spadding">
            <i class="bbn-orange nf nf-fa-warning"></i> 
            <span class="bbn-light">
              <?= _("No sales yet") ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>