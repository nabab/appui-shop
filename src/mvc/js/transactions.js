(()=>{
  return {
    data(){
      return {
        root: appui.plugins['appui-shop'],
        status: bbn.fn.order([{
          text: 'Failed',
          value: 'failed'
        }, {
          text: 'Success',
          value: 'success'
        }, {
          text: 'Ready',
          value: 'ready'
        }, {
          text: 'Proceeding',
          value: 'proceeding'
        }, {
          text: 'Paid',
          value: 'paid'
        }, {
          text: 'Unpaid',
          value: 'unpaid'
        }], 'text')
      }
    },
    methods: {
      cartDetails(a){
        this.getPopup().open({
          title: bbn._('Order details'),
          scrollable: false,
          source: a,
          component: 'appui-shop-transaction-details',
          height: '80%',
          width: '90%'
        })
      },
      renderMoney(a){
        return bbn.fn.money(a.total, false, " €", false, ',', " ", 2);
      },
      renderClientName(a){
        return a.client.first_name + ' ' + a.client.last_name
      },
      renderAddress(a){
        return bbn.fn.nl2br(a.shipping_address.fulladdress) + '<br>' + bbn.fn.getField(bbn.opt.countries, 'text', 'value',a.shipping_address.country)
      },
      renderBillingAddress(a){
        return bbn.fn.nl2br(a.billing_address.fulladdress) + '<br>' + bbn.fn.getField(bbn.opt.countries, 'text', 'value',a.billing_address.country)
      }
    },
    created(){
      appui.register('appui-shop-transactions', this);
    },
    components: {
      status:{
        template: '<bbn-dropdown :source="parent.status" v-model="source.status"></bbn-dropdown>',
        props: ['source'],
        data(){
          return {
            parent: this.closest('bbn-container').getComponent()
          }
        },
        watch:{
          'source.status'(val){
            var confirm = true
            if(val){
              this.confirm(bbn._('You\'re changing the status of this transaction, are you sure?'),
                () => {
                  this.post(this.parent.root + '/actions/transactions', {
                    status: val,
                    id_transaction: this.source.id
                  }, (d) => {
                    if(d.success){
                      appui.success(bbn._('Status changed'))
                    }
                  })
                })
            }
          }
        },
      },
      toolbar: {
        template: `
        <div class="bbn-spadding bbn-vmiddle bbn-header">
          <div class="bbn-flex-fill bbn-right-sspace">
            <bbn-button text="` + bbn._('Export excel') + `"
                        icon="nf nf-md-microsoft_excel"
                        @click="exportExcel"/>
          </div>
          <div>
            <label>` + bbn._('Filter status') + `</label>
            <bbn-dropdown :source="parent.status"
                          v-model="filterStatus"
                          :nullable="true"/>
          </div>
        </div>`,
        props: ['source'],
        data(){
          return {
            filterStatus: null,
            parent: {},
            table: {}
          }
        },
        methods:{
          filterTable(){
            let idx = bbn.fn.search(this.table.currentFilters.conditions, 'field', 'status');
            if (idx > -1) {
              if (this.filterStatus) {
                this.table.$set(this.table.currentFilters.conditions[idx], 'value', this.filterStatus);
              }
              else {
                this.table.currentFilters.conditions.splice(idx, 1)
              }
            }
            else {
              this.table.currentFilters.conditions.push({
                field: 'status',
                value: this.filterStatus
              });
            }
          },
          exportExcel(){
            this.table.exportExcel();
          }
        },
        watch:{
          filterStatus(){
            this.filterTable();
          }
        },
        mounted(){
          this.$set(this, 'parent', this.closest('bbn-container').getComponent());
          this.$set(this, 'table', this.closest('bbn-table'));
          let idx = bbn.fn.search(this.table.currentFilters.conditions, 'field', 'status');
            if (idx > -1) {
              this.filterStatus = this.table.currentFilters.conditions[idx].value
            }
        }
      }
    }
  }
})()
