// Javascript Document

(() => {
  return {
    data(){
      let cp = appui.getRegistered('products');
      return {
        root: appui.plugins['appui-shop'] + '/',
        variants: this.source.variants || [],
        users: appui.users,
        providers: cp.source.providers,
        tags: cp.source.tags,
        types: appui.options.product_types,
        editions: appui.options.editions
      };
    },
    methods: {
      addVariant() {
        let tmp = bbn.fn.clone(this.source);
        tmp.title = bbn._("Variant") + ' ' + (this.variants.length + 1);
        tmp.url += '-' + this.variants.length + 1;
        this.variants.push(tmp);
      },
      openGallery(){
        this.getPopup({
          component: this.$options.components.gallery,
          componentOptions: {
            onSelection: this.onSelection
          },
          label: bbn._('Select an image'),
          width: '90%',
          height: '90%'
        });
      },
      onSelection(img) {
        bbn.fn.log(img);
        this.$set(this.source, 'source',  img.data.path);
        this.$set(this.source, 'front_img', img.data);
        this.getPopup().close();
      },
    },
    components: {
      gallery: {
        template: `
<div>
  <appui-note-media-browser2 source="admin/note/media/data/browser"
                             @selection="onSelection"
                             @clickItem="onSelection"
                             :zoomable="false"
                             :selection="false"
                             :limit="50"
                             path-name="path"
                             :upload="root + 'media/actions/upload'"
                             :removed="root + 'media/actions/remove'"/>
</div>
        `,
        props: {
          onSelection: {
            type: Function
          }
        },
        data(){
          return {
            root: appui.plugins['appui-note'] + '/'
          }
        }
      }
    }
  }
})();