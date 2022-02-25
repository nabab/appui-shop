// Javascript Document

(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-shop']
      }
    },
    created() {
      appui.register('products', this);
    },
    beforeDestroy() {
      appui.unregister('products');
    }
  };
})();