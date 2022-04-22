<div :class="[componentClass, 'bbn-overlay']">
  <bbn-table :sortable="true"
             :scrollable="false"
             :editable="true"
             currency="&euro;"
             :toolbar="[{
                       text: _('New territory'),
                       action: 'insert'
                       }]"
             :source="source">
    <bbns-column title="<?= _("Territory") ?>"
                 ftitle="<?= _("Continent or country") ?>"
                 field="territory"
                 :source="destinations">
    </bbns-column>
    <bbns-column title="<?= _("< 500g") ?>"
                 ftitle="<?= _("Under 500g") ?>"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g500">
    </bbns-column>
    <bbns-column title="<?= _("< 1kg") ?>"
                 ftitle="<?= _("Between 500g and 1kg") ?>"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g1000">
    </bbns-column>
    <bbns-column title="<?= _("< 1.5kg") ?>"
                 ftitle="<?= _("Between 1kg and 1.5kg") ?>"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g1500">
    </bbns-column>
    <bbns-column title="<?= _("< 2kg") ?>"
                 ftitle="<?= _("Between 1.5kg and 2kg") ?>"
                 type="money"
                 :nullable="true"
                 currency="€"
                 width="5em"
                 field="g2000">
    </bbns-column>
    <bbns-column title="<?= _("< 2.5kg") ?>"
                 ftitle="<?= _("Between 2kg and 2.5kg") ?>"
                 :nullable="true"
                 type="money"
                 currency="€"
                 width="5em"
                 field="g2500">
    </bbns-column>
    <bbns-column title="<?= _("< 3kg") ?>"
                 ftitle="<?= _("Between 2.5kg and 3kg") ?>"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="g3000">
    </bbns-column>
    <bbns-column title="<?= _("+ 1kg") ?>"
                 ftitle="<?= _("Every kg added") ?>"
                 type="money"
                 currency="€"
                 :nullable="true"
                 width="5em"
                 field="gm1000">
    </bbns-column>
    <bbns-column title="<?= _(" ") ?>"
                 width="7em"
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
                           }]"
                 field="gm1000">
    </bbns-column>
  </bbn-table>
</div>
