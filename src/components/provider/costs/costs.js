// Javascript Document

(() => {
  return {
    mixins: [bbn.vue.basicComponent],
    props: ['source'],
    data(){
      return {
	      destinations: bbn.opt.territories.concat(bbn.opt.countries)
      };
    }
  };
})();