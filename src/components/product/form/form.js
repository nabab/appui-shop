// Javascript Document

(() => {
  return {
    props: ['source'],
    data() {
      return {
        cp: appui.getRegistered('products'),
        file: [],
        date: bbn.fn.timestamp(),
        root: appui.plugins['appui-shop'] + '/',
        types: appui.options.product_types,
        editions: appui.options.editions,
        prefix: 'product/',
        formData: {
          title: '',
          type: this.id_type || '',
          url: '',
          lang: bbn.env.lang
        }
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

          bbn.fn.link(this.root + 'products/product/' + d.data.id);
        }
        else if (d.error) {
          appui.error(d.error);
        }
      },
    }
  }
})();