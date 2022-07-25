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
      }
    }
  }
})();