// Javascript Document

(() => {
  return {
    props: {
      source: {
        type: Object
      }
    },
    data(){
      let cp = appui.getRegistered('products');
      return {
        variants: this.source.variants || [],
        users: appui.users,
        providers: cp.source.providers,
        tags: cp.source.tags,
        types_notes: this.closest('bbn-container').closest('bbn-container').getComponent().source.types,
        types: appui.options.product_types,
        editions: appui.options.editions
      };
    },
    methods: {
      addVariant() {
        this.variants.push(bbn.fn.clone(this.source));
      },
      openGallery(){
        this.getPopup().open({
          component: this.$options.components.gallery,
          componentOptions: {
            onSelection: this.onSelection
          },
          title: bbn._('Select an image'),
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
                             :remove="root + 'media/actions/remove'"/>
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