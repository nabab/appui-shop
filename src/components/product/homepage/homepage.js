(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-shop'] + '/'
      }
    },
    
    methods: {
      addVariant(){
        let v = bbn.fn.clone(this.source);
        delete v.variants;
        v.url = v.url + '-' + (this.source.variants.length + 1);
        v.id_main = v.id;
        v.id_parent = v.id_note;
        v.id_note = null;
        v.items = [];
        v.fromt_img = null;
        v.start = null;
        v.id = null;
        let cp = this;
        this.getPopup({
          width: '50em',
          title: bbn._("New variant"),
          component: {
            template: `
<bbn-form :action="root + 'actions/product/insert'"
          :source="source"
          @success="success">
  <div class="bbn-grid-fields bbn-padding">
    <label v-text="_('Title')"/>
    <bbn-input v-model="source.title"
               :required="true"
               :focused="true"/>

    <label v-text="_('Public URL')"/>
    <appui-note-field-url :source="source"
                        prefix="product/"
                        />
  </div>
</bbn-form>`,
            props: ['source'],
            data(){
              return {
                root: cp.root
              }
            },
            methods: {
              success(d) {
                if (d.success && d.data) {
                  this.$set(this.source, "id", d.id);
                  cp.source.variants.push(d.data);
                }
              }
            }
          },
          source: v
        });
      }
    }
  };
})()