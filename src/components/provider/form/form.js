// Javascript Document

(() => {
  return {
    mixins: [bbn.cp.mixins.basic],
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
