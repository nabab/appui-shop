// Javascript Document

(() => {
  return {
    props: ['source'],
    methods: {
      renderProduct(a){
        let idx = bbn.fn.search(a.product.medias, 'id', a.product.front_img),
          src= '';
        if(idx > -1){
          src = a.product.medias[idx].path
        }
       return '<img class="transaction-product-img" src="'+src+'">'
      },
      
      renderProvider(a){
        return a.product.provider
      },
      renderPrice(a){
        return bbn.fn.money(a.product.price, false, '€', false, '.' ,false, 2); 
      },
      renderTitle(a){
        return a.product.title
      },
      money(m){
        return bbn.fn.money(m, false, " €", false, ',', " ", 2);
      }
    },
    computed:{

      renderAddress(){
        return  bbn.fn.nl2br(this.source.shipping_address.fulladdress) + '<br>' + bbn.fn.getField(bbn.opt.countries, 'text', 'value',this.source.shipping_address.country)
      },
      renderBillingAddress(){
        return  bbn.fn.nl2br(this.source.billing_address.fulladdress) + '<br>' + bbn.fn.getField(bbn.opt.countries, 'text', 'value',this.source.billing_address.country)
      },
      renderClient(){
        return this.source.client.first_name + ' ' + this.source.client.last_name
      },
      detailsTitle(){
        return bbn._('Order received on') + ' ' + bbn.fn.fdatetime(this.source.moment)
      }
    }
  }
})();
