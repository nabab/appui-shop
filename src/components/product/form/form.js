// Javascript Document

(() => {
  return {
    props: ['source'],
    data() {
      return {
        cp: appui.getRegistered('products'),
        file: [],
        date: bbn.fn.timestamp(),
        types: appui.options.product_types,
        editions: appui.options.editions
      };
    },
    computed:{
      providers(){
        return this.cp.source.providers;
      },
      tags(){
        return this.cp.source.tags;
      },
    },
    methods: {
      success(d){
        if (d.success) {
          let fl = this.closest('bbn-floater');
          if (fl && fl.opener) {
            fl.opener.updateData();
          }
          else {
            let ct = this.closest('bbn-container');
            let cp = ct ? ct.getComponent() : null;
            let table = cp ? cp.getRef('table') : null;
            if (table) {
              table.updateData();
            }
          }

          bbn.fn.link('admin/products/editor/' + d.data.id);
        }
        else if (d.error) {
          appui.error(d.error);
        }
      },
    }
  }
})();