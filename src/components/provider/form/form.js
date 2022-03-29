// Javascript Document

(() => {
  return {
    mixins: [bbn.vue.basicComponent],
    props: ['source'],
    data(){
      return {
        file: [],
        root: appui.plugins['appui-shop'] + '/'
      };
    },
    computed:{
      parent(){
        return this.closest('bbn-container').getComponent();
      },
      date(){
        return bbn.fn.timestamp();
      },

    },
    methods: {
      success(d){
        this.parent.success(d);
      }
    }
  };
})();
