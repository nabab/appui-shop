// Javascript Document

(() => {
  return {
    mixins: [bbn.vue.basicComponent],
    props: ['source'],
    data(){
      return {
	      destinations: bbn.opt.territories.concat(bbn.opt.countries)
      };
    },
    methods: {
      colNoValue(val, cfg){
        return bbn.fn.money(
          val,
          (cfg.precision === -4) || (cfg.format && (cfg.format.toLowerCase() === 'k')),
          cfg.currency || cfg.unit || "",
          bbn.fn.isNumber(val) ? '0' : '-',
          ',',
          ' ',
          cfg.precision === -4 ? 3 : (cfg.precision || cfg.decimals || 0));
      }
    }
  };
})();