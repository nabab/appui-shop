(() => {
  return {
    props: {
      source: {
        type: Object,
        required: true
      },
      users: {
        type: Array,
        default(){
          return appui.users;
        }
      },
      types: {
        type: Array,
        default(){
          return appui.options.product_types;
        }
      },
      editions: {
        type: Array,
        default(){
          return appui.options.editions;
        }
      },
      root: {
        type: String,
        default: appui.plugins['appui-shop'] + '/'
      },
      noteRoot: {
        type: String,
        default: appui.plugins['appui-note'] + '/'
      }
    },
    data(){
      let cp = appui.getRegistered('products');
      return {
        providers: this.source.providers,
        tags: this.source.tags,
        notesTypes: this.source.noteTypes,
        columns: [{
          field: "id_type",
          label: bbn._("Type of note"),
          hidden: true,
          filterable: false,
          showable: false
        }, {
          field: 'id_provider',
          render: this.renderProvider,
          label: bbn._("Provider"),
          width: 100
        }, {
          field: 'product_type',
          source: appui.options.product_types,
          label: bbn._("Typology"),
          width: 100
        }, {
          field: 'id_edition',
          source: appui.options.editions,
          label: bbn._("Edition type"),
          width: 130
        }, {
          field: 'price_purchase',
          label: bbn._("Purchase price"),
          render: this.renderPurchase,
          type: 'money',
          nullable: true,
          width: 80
        }, {
          field: 'price',
          label: bbn._("Selling price"),
          render: this.renderSell,
          type: 'money',
          nullable: true,
          width: 80
        }, {
          field: 'dimensions',
          label: bbn._("Dimensions"),
          flabel: bbn._("Dimensions") + ' ' + bbn._("Width x Height in millimeters"),
          width: 120
        }, {
          field: 'weight',
          render: this.renderWeight,
          label: bbn._("Weight"),
          flabel: bbn._("Weight in grams"),
          type: 'number',
          nullable: true,
          width: 80
        }, {
          field: 'stock',
          label: bbn._("Stock"),
          type: 'number',
          width: 80
        }]
      };
    },
    methods: {
      // methods each row of the table
      editNote(row){
        bbn.fn.link(this.root + 'products/product/' + row.id);
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
        this.getPopup({
          width: 800,
          height: '80%',
          label: bbn._('Publish Note'),
          source: src,
          component: this.$options.components.form,
        });
      },
      unpublishNote(row) {
        appui.confirm(bbn._('Are you sure to remove the publication from this note?'), () => {
          bbn.fn.post(this.noteRoot + 'cms/actions/unpublish',{id: row.id_note }, d =>{
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
          bbn.fn.post(this.root + 'actions/product/delete',{id: row.id}, d =>{
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
          return '<a href="' + this.noteRoot + 'cms/preview/' + row.url +'" target="_blank">' + row.url + '</a>';
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
          icon: 'nf nf-md-attachment',
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
          label: bbn._('Media'),
          source : a,
          component: 'appui-shop-product-media-browser',
        });
      },
      renderFrontImg(a){
        if(a.front_img){
          return `
          <div class="bbn-middle">
            <a class="bbn-block"
               href="image/` + a.front_img.id + `" target="_blank">
              <img src="image/big_thumbs/` + a.front_img.id + `"
                   style="width: 100px; height: auto">
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
        return bbn.fn.getField(this.notesTypes, 'text', 'value', a.id_type);
      },
      renderProvider(a){
        return bbn.fn.getField(this.providers, 'text', 'value', a.id_provider);
      },
      renderSell(a){
        return bbn.fn.money(a.price, false, '€', false, '.' ,false, 2); 
      },
      renderPurchase(a){
        return bbn.fn.money(a.price_purchase, false, '€', false, '.' ,false, 2); 
      },
      renderWeight(a){
        return a.weight ? a.weight + ' Gr.' : '-';
      },
      deleteproduct(row, b, c){
        this.confirm(bbn._('Are you sure you want to delete '+ row.title +'?'), () => {
          this.post(this.root + 'actions/product/delete', {id: row.id}, d => {
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
          this.$refs.list.updateData();
        }
        else{
          appui.error(bbn._('Something went wrong :('));
        }
      },
      insert(){
        bbn.fn.log("insert");
        this.getPopup({
          label: bbn._('New product'),
          source : {
            row: {
            }
          },
          width: '600px',
          heigth: '600px',
          component: this.$options.components.insert,
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
      insert: {
        template: `
<bbn-form :source="source.row"
          :action="root + 'actions/product/insert'">
  <appui-shop-product-fields :source="data"/>
</bbn-form>
`,
        props: {
          id_type: {
            type: String
          }
        },
        data(){
          let formData = {
            title: '',
            type: this.id_type || '',
            url: '',
            lang: bbn.env.lang
          };
          return {
            data: {
              row: formData
            },
            root: appui.plugins['appui-shop'] + '/'
          }
        },
      },
      toolbar: {
        template: `
  <bbn-toolbar class="bbn-header bbn-hspadding bbn-h-100 bg-colored">
    <div class="bbn-flex-width">
      <bbn-button icon="nf nf-fa-plus"
                  :label="_('Create new product')"
                  :action="insert"/>
      <div class="bbn-xl bbn-b bbn-flex-fill bbn-r bbn-white">
        <?= _("The Content Management System") ?>
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