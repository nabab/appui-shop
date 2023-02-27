// Javascript Document

(() => {
  return {
    props: {
      variant: {
        type: Number
      }
    },
    data(){
      return {
        root: appui.plugins['appui-shop'] + '/',
        salesPeriods: {
          d: bbn._("Today"),
          w: bbn._("This week"),
          m: bbn._("This month"),
          y: bbn._("This year")
        }
      };
    },
    computed: {
      isPublished() {
        let start = dayjs(this.source.start);
        if (start.isBefore(new Date())) {
          if (!this.source.end) {
            return true;
          }
          let end = dayjs(this.source.end);
          return end.isAfter(newDate());
        }
        return false;
      },
      realSales() {
        let res = [];
        bbn.fn.iterate(this.source.sales, (a, n) => {
          if (a.num) {
            res.push(bbn.fn.extend({name: n}, a));
          }
        });

        return res;
      }
    },
    methods: {
      activateVariant(row){
        appui.confirm(bbn._('Are you sure to activate this variant?'), () => {
          bbn.fn.post(this.root + 'actions/product/activate',{id: this.source.id}, d =>{
            if (d.success) { 
              this.$set(this.source, 'active', 1);
            }
            else{
              appui.error(bbn._('Error while activating'));
            }
          });
        });
      },
      deactivateVariant(row){
        appui.confirm(bbn._('Are you sure to deactivate this variant? (This variant cannot be deleted because it is currently added to a cart)'), () => {
          bbn.fn.post(this.root + 'actions/product/deactivate',{id: this.source.id}, d =>{
            if (d.success) { 
              this.$set(this.source, 'active', 0);
            }
            else{
              appui.error(bbn._('Error while deactivating'));
            }
          });
        });
      },
      deleteVariant(row) {
        appui.confirm(bbn._('Are you sure to delete this variant?'), () => {
          bbn.fn.post(this.root + 'actions/product/delete',{id: this.source.id}, d =>{
            if (d.success) { 
              let idx = bbn.fn.search(this.closest('appui-shop-product-homepage').source.variants, 'url', this.source.url)
              if(idx > -1){
                this.closest('appui-shop-product-homepage').source.variants.splice(idx, 1);
                appui.success(bbn._('Successfully deleted'));
              }
              
            }
            else{
              appui.error(bbn._('Error while deleting'));
            }
          });
        });
      },
      fdate: bbn.fn.fdate,
      money: bbn.fn.money,
      openEditor() {
        if (this.variant) {
          bbn.fn.link(bbn.fn.dirName(bbn.env.path) + '/' + 'variant' + this.variant);
        }
        else {
          bbn.fn.link(bbn.fn.dirName(bbn.env.path) + '/' + 'editor');
        }
      },
      addTranslation(){
        
      }
    }
  };

})();