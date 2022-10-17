// Javascript Document

(() => {
  return {
    props: {
      source: {
        type: Object,
        required: true
      }
    },
    methods: {
      renderProduct(a){
        let src= bbn.fn.getField(a.product.medias, 'path', 'id', a.product.front_img);
       return `<img class="transaction-product-img" src="${src || ''}">`;
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
      },
      sum: bbn.fn.sum
    },
    computed:{
      renderPyamentType(){
        return bbn.fn.getField(this.$root.options.paymentTypes, 'text', 'value', this.source.payment_type);
      },
      renderAddress(){
        return  bbn.fn.nl2br(this.source.shipping_address.fulladdress) +
          '<br>' + bbn.fn.getField(bbn.opt.countries, 'text', 'value',this.source.shipping_address.country) +
          (!!this.source.shipping_address.phone && this.source.shipping_address.phone.length ? '<br>' + this.source.shipping_address.phone : '')
      },
      renderBillingAddress(){
        return  bbn.fn.nl2br(this.source.billing_address.fulladdress) +
          '<br>' + bbn.fn.getField(bbn.opt.countries, 'text', 'value',this.source.billing_address.country) +
          (!!this.source.billing_address.phone ? '<br>' + this.source.billing_address.phone : '')
      },
      renderClient(){
        return this.source.client.first_name + ' ' + this.source.client.last_name
      },
      detailsTitle(){
        return bbn._('Order received on %s', bbn.fn.fdatetime(this.source.moment));
      },
      renderStatus(){
        return bbn.fn.getField(appui.getRegistered('appui-shop-transactions').status, 'text', 'value', this.source.status);
      }
    }
  }
})();
