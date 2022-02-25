(() => {
  return {
    data(){
      let cp = appui.getRegistered('products');
      return {
        users: appui.app.users,
        providers: cp.source.providers,
        types: appui.options.product_types,
        editions: appui.options.editions,
        tags: cp.source.tags
      };
    },
    methods: {
      insertNote(){
        this.getPopup({
          width: 800,
          title: bbn._('New') + ' ' + this.noteName,
          component: this.getComponentName('../new'),
          componentOptions: {
            source: {
              url: 'admin/actions/products/insert',
            },
            types: this.types
          }
        });
      },
      // methods each row of the table
      editNote(row){
        bbn.fn.link('admin/products/editor/' + row.id);
      },
      isPublished(row) {
        if (row.start) {
          let now = bbn.fn.dateSQL();
          if (!row.end || (row.end > now)) {
            return true;
          }
        }

        return false;
      },
      publishNote(row) {
        let src =  bbn.fn.extend(row,{
          action: 'publish'
        });
        this.getPopup().open({
          width: 800,
          height: '80%',
          title: bbn._('Publish Note'),
          source: src,
          component: this.$options.components.form,
        });
      },
      unpublishNote(row) {
        appui.confirm(bbn._('Are you sure to remove the publication from this note?'), () => {
          bbn.fn.post(this.root + 'cms/actions/unpublish',{id: row.id_note }, d =>{
            if ( d.success ){
              this.getRef('table').reload();
              appui.success(bbn._('Successfully deleted'));
            }
            else{
              appui.error(bbn._('Error in deleting'));
            }
          });
        });
      },
      deleteNote(row) {
        appui.confirm(bbn._('Are you sure to delete this note?'), () => {
          bbn.fn.post("admin/actions/product/delete",{id: row.id}, d =>{
            if (d.success) {
              this.getRef('table').reload();
              appui.success(bbn._('Successfully deleted'));
            }
            else{
              appui.error(bbn._('Error while deleting'));
            }
          });
        });
      },
      //SHOW
      filterTable(type) {
        let table = this.getRef('table'),
            idx = bbn.fn.search(table.currentFilters.conditions, 'field', 'type');
        if ( idx > -1 ){
          table.$set(table.currentFilters.conditions[idx], 'value', type);
        }
        else {
          table.currentFilters.conditions.push({
            field: 'type',
            value: type
          });
        }
      },
      // function of render
      renderUrl(row) {
        if ( row.url !== null ){
          return '<a href="' + this.root + 'cms/preview/' + row.url +'" target="_blank">' + row.url + '</a>';
        }
        return '-';
      },
      rowMenu(row, col, idx) {
        return [{
          action: () => {
            this.editNote(row);
          },
          icon: 'nf nf-fa-edit',
          text: bbn._("Edit"),
          key: 'a'
        }, {
          action: () => {
            this.publishNote(row);
          },
          icon: 'nf nf-fa-chain',
          text: bbn._("Publish"),
          disabled: this.isPublished(row),
          key: 'b'
        }, {
          action: () => {
            this.unpublishNote(row);
          },
          icon: 'nf nf-fa-chain_broken',
          text: bbn._("Unpublish"),
          disabled: !this.isPublished(row),
          key: 'c'
        },{
          action: () => {
            this.addMedia(row);
          },
          text: bbn._("Add media"),
          icon: 'nf nf-mdi-attachment',
          key: 'd'
        }, {
          action: () => {
            this.deleteNote(row);
          },
          text: bbn._("Delete"),
          icon: 'nf nf-fa-trash_o',
          key: 'e'
        }];
      },
      getNumTags(row){
        if (!row.tags) {
          return 0;
        }
        else {
          return row.tags.length;
        }
      },
      openBrowser(a){
        this.getPopup({
          scrollable: true,
          width: 800,
          height: 700,
          title: bbn._('Media'),
          source : a,
          component: 'poc-product-media-browser',
        });
      },
      frontImgRender(a){
        //let front_img = JSON.parse(a.front_img);
        console.log('image'+ a);
        if(a.front_img){
          return `
          <div class="main-img-container bbn-middle">
            <a href="image/` +  a.front_img.id +`" target="_blank">
              <img src="image/big_thumbs/`+ a.front_img.id+`">
            </a>
          </div> `;
        }
      },
      renderPublic(a){
        let style = "height: 30px;width: 30px; margin: 0 auto;";
        if(a.active){
          return '<div style="'+ style +'" class="bbn-bg-green" title="Public"></div>';
        }
        else{
          return '<div style="'+ style +'" class="bbn-bg-red" title="Not public"></div>';
        }
      },
      renderNumMedia(a){
        return a.num_media;
      },
      renderType(a){
        return bbn.fn.getField(this.types, 'text', 'value', a.id_type);
      },
      renderProvider(a){
        return bbn.fn.getField(this.providers, 'text', 'value', a.id_provider);
      },
      renderSell(a){
        return bbn.fn.money(a.price);
      },
      renderPurchase(a){
        return bbn.fn.money(a.price_purchase);
      },
      renderWeight(a){
        return a.weight + ' Gr.';
      },
      deleteproduct(row, b, c){
        this.confirm(bbn._('Are you sure you want to delete '+ row.title +'?'), () => {
          this.post('admin/actions/product/delete', {id: row.id}, d => {
            if (d.success){
              this.getRef('table').updateData();
              appui.success(row.title + ' ' + bbn._('successfully deleted!'));
            }
            else{
              appui.error(bbn._('Something went wrong while deleting this product :('));
            }
          });
        });
      },
      success(d){
        if ( d.success ){
          this.$refs.table.updateData();
        }
        else{
          appui.error(bbn._('Something went wrong :('));
        }
      },
      insert(){
        this.getPopup().open({
          title: bbn._('New product'),
          source : {},
          width: '600px',
          heigth: '600px',
          component: this.$options.components['product-form'],
        });
      },
    },
    created(){
      appui.register('productList', this);
    },
    beforeDestroy(){
      appui.unregister('productList');
    },
    components: {
      toolbar: {
        template: `
  <bbn-toolbar class="bbn-header bbn-hspadded bbn-h-100 bg-colored">
    <div class="bbn-flex-width">
      <bbn-button icon="nf nf-fa-plus"
                  :text="_('Create new product')"
                  :action="insert"/>
      <div class="bbn-xl bbn-b bbn-flex-fill bbn-r bbn-white">
        <?=_("The Content Management System")?>
      </div>
    </div>
  </bbn-toolbar>`,
        props: ['source'],
        data(){
          return {
            cp: appui.getRegistered('productList')
          };
        },
        methods:{
          insert(){
            return this.cp.getRef('table').insert();
          }
        }
      }
    }
  };
})();