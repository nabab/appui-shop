(()=>{
  return {
    data(){
      return {
        root: appui.plugins['appui-shop']
      }
    },
    methods: {
      renderMoney(a){
        return bbn.fn.money(a.total, false, " €", false, ',', " ", 2);
      },
      renderClientName(a){
        return a.client.name
      },
      renderAddress(a){
        console.log('hree', bbn.fn.nl2br(a.address.fulladdress),a.address.fulladdress )
        return bbn.fn.nl2br(a.address.fulladdress) + '<br>' + a.country
      }
    }
  }
})()