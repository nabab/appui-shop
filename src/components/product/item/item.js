// Javascript Document

(() => {
  return {
    props: {
      variant: {
        type: Number
      }
    },
    data(){
      return {
        salesPeriods: {
          d: bbn._("Today"),
          w: bbn._("This week"),
          m: bbn._("This month"),
          y: bbn._("This year")
        }
      };
    },
    computed: {
      isPublished() {
        let start = dayjs(this.source.start);
        if (start.isBefore(new Date())) {
          if (!this.source.end) {
            return true;
          }
          let end = dayjs(this.source.end);
          return end.isAfter(newDate());
        }
        
        return false;
      },
      realSales() {
        let res = [];
        bbn.fn.iterate(this.source.sales, (a, n) => {
          if (a.num) {
            res.push(bbn.fn.extend({name: n}, a));
          }
        });

        return res;
      }
    },
    methods: {
      fdate: bbn.fn.fdate,
      money: bbn.fn.money,
      openEditor() {
        if (this.variant) {
          bbn.fn.link(bbn.fn.dirName(bbn.env.path) + '/' + 'variant' + this.variant);
        }
        else {
          bbn.fn.link(bbn.fn.dirName(bbn.env.path) + '/' + 'editor');
        }
      },
      addTranslation(){
        
      }
    }
  };

})();