<div :class="[componentClass, 'bbn-overlay']">
  <bbn-table :sortable="true"
             :scrollable="false"
             :editable="true"
             :auto-save="true"
             currency="&euro;"
             :toolbar="[{
                       text: _('New territory'),
                       action: 'insert'
                       }]"
             :source="source">
    <bbns-column label="<?= _("Territory") ?>"
                 flabel="<?= _("Continent or country") ?>"
                 field="territory"
                 :source="destinations"/>
    <bbns-column label="<?= _('Disabled') ?>"
                 flabel="<?= _('Disable shipments to this territory') ?>"
                 field="disabled"
                 type="boolean"
                 :default="0"
                 :render="renderDisabled"
                 cls="bbn-c"
                 width="6em"/>
    <bbns-column label="<?= _("< 500g") ?>"
                 flabel="<?= _("Under 500g") ?>"
                 type="money"
                 currency="€"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 :nullable="true"
                 width="5em"
                 field="g500"
                 :novalue="colNoValue"/>
    <bbns-column label="<?= _("< 1kg") ?>"
                 flabel="<?= _("Between 500g and 1kg") ?>"
                 type="money"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 :precision="2"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g1000"
                 :novalue="colNoValue"/>
    <bbns-column label="<?= _("< 1.5kg") ?>"
                 flabel="<?= _("Between 1kg and 1.5kg") ?>"
                 type="money"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 :precision="2"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g1500"
                 :novalue="colNoValue"/>
    <bbns-column label="<?= _("< 2kg") ?>"
                 flabel="<?= _("Between 1.5kg and 2kg") ?>"
                 type="money"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
								 :nullable="true"
                 currency="€"
                 width="5em"
                 field="g2000"
                 :novalue="colNoValue"/>
    <bbns-column label="<?= _("< 2.5kg") ?>"
                 flabel="<?= _("Between 2kg and 2.5kg") ?>"
                 :nullable="true"
                 type="money"
                 :precision="2"
 								 :options="{step:0.1, decimals: 2, min: 0}"
                 currency="€"
                 width="5em"
                 field="g2500"
                 :novalue="colNoValue"/>
    <bbns-column label="<?= _("< 3kg") ?>"
                 flabel="<?= _("Between 2.5kg and 3kg") ?>"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g3000"
                 :novalue="colNoValue"/>
    <bbns-column label="<?= _("+ 500g") ?>"
                 flabel="<?= _("Every 500g added") ?>"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="gm500"
                 :novalue="colNoValue"/>
    <bbns-column width="7em"
                 :buttons="[{
                   text: _('Modify'),
                   notext: true,
                   icon: 'nf nf-fa-edit',
                   action: 'edit'
                 }, {
                   text: _('Remove'),
                   notext: true,
                   icon: 'nf nf-fa-times',
                   action: 'delete'
                 }]"/>
  </bbn-table>
</div>
