(()=>{
  return {
    data(){
      return {
        root: appui.plugins['appui-shop'],
        status:[{
          text: 'Failed',
          value: 'failed'
        },{
          text: 'Success',
          value: 'success'
        },{
          text: 'Ready',
          value: 'ready'
        },{
          text: 'Proceeding',
          value: 'proceeding'
        }]
      }
    },
    methods: {
      renderMoney(a){
        return bbn.fn.money(a.total, false, " €", false, ',', " ", 2);
      },
      renderClientName(a){
        return a.client.name
      },
      renderAddress(a){
        return bbn.fn.nl2br(a.address.fulladdress) + '<br>' + a.country
      }
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
        template:  `
        <bbn-toolbar class="bbn-padded bbn-w-100">
          <div class="bbn-r">
            <label >Filter status</label>
            <bbn-dropdown :source="parent.status" v-model="filterStatus" :nullable="true"></bbn-dropdown>
          </div>
        </bbn-toolbar>`,
        props: ['source'],
        data(){
          return {
            filterStatus: null,
            parent: this.closest('bbn-container').getComponent()
          }
        },
        methods:{
          filterTable(){
            let table = this.parent.getRef('table'),
            idx = bbn.fn.search(table.currentFilters.conditions, 'field', 'status');
            if ( idx > -1 ){
              if(this.filterStatus){
                table.$set(table.currentFilters.conditions[idx], 'value', this.filterStatus);
              }
              else{
                table.currentFilters.conditions.splice(idx,1)
              }
            }
            else {
              table.currentFilters.conditions.push({
                field: 'status',
                value: this.filterStatus
              });
            }
          }
        },
        watch:{
          filterStatus(val){
            this.filterTable()
          }
        },
        mounted(){
          let table = this.parent.getRef('table'),
            idx = bbn.fn.search(table.currentFilters.conditions, 'field', 'status');
            if ( idx > -1 ){
              this.filterStatus = table.currentFilters.conditions[idx].value
            }
        }
      }
    }
  }
})()