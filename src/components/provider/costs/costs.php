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
    <bbns-column title="<?= _("Territory") ?>"
                 ftitle="<?= _("Continent or country") ?>"
                 field="territory"
                 :source="destinations"/>
    <bbns-column title="<?= _("< 500g") ?>"
                 ftitle="<?= _("Under 500g") ?>"
                 type="money"
                 currency="€"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 :nullable="true"
                 width="5em"
                 field="g500"
                 :novalue="colNoValue"/>
    <bbns-column title="<?= _("< 1kg") ?>"
                 ftitle="<?= _("Between 500g and 1kg") ?>"
                 type="money"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 :precision="2"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g1000"
                 :novalue="colNoValue"/>
    <bbns-column title="<?= _("< 1.5kg") ?>"
                 ftitle="<?= _("Between 1kg and 1.5kg") ?>"
                 type="money"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 :precision="2"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g1500"
                 :novalue="colNoValue"/>
    <bbns-column title="<?= _("< 2kg") ?>"
                 ftitle="<?= _("Between 1.5kg and 2kg") ?>"
                 type="money"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
								 :nullable="true"
                 currency="€"
                 width="5em"
                 field="g2000"
                 :novalue="colNoValue"/>
    <bbns-column title="<?= _("< 2.5kg") ?>"
                 ftitle="<?= _("Between 2kg and 2.5kg") ?>"
                 :nullable="true"
                 type="money"
                 :precision="2"
 								 :options="{step:0.1, decimals: 2, min: 0}"
                 currency="€"
                 width="5em"
                 field="g2500"
                 :novalue="colNoValue"/>
    <bbns-column title="<?= _("< 3kg") ?>"
                 ftitle="<?= _("Between 2.5kg and 3kg") ?>"
                 :precision="2"
								 :options="{step:0.1, decimals: 2, min: 0}"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g3000"
                 :novalue="colNoValue"/>
    <bbns-column title="<?= _("+ 500g") ?>"
                 ftitle="<?= _("Every 500g added") ?>"
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
