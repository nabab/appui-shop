(() => {
  return {
    methods: {
      deleteProvider(a, b, c){
        this.confirm(bbn._('Are you sure you want to delete '+ a.name +'?'), () => {
          this.post('admin/actions/provider/delete', a, (d) => {
            if (d.success){
              this.getRef('table').currentData.splice(c, 1)
              appui.success(a.name + ' ' + bbn._('successfully deleted!'));
            }
            else{
              appui.error(bbn._('Something went wrong while deleting this provider :('));
            }
          })
        })
      },
      editProvider(a){
        this.getPopup().open({
          title: bbn._('Edit provider'),
          scrollable:true,
          source: a,
          component: this.$options.components['providers-form'],
          height: '80%',
          width: '80%'
        })
      },
      success(d){
        if ( d.success ){
          if ( d.action === 'insert'){
            this.$refs.table.updateData();
            //this.$refs.table.insert(d.data.provider)
            appui.success(d.data.provider.name + ' ' +bbn._('successfully inserted!'))
          }
          else if (d.action === 'edit'){
            this.$refs.table.updateData();
            appui.success(d.provider.name + ' ' +bbn._('successfully updated!'))
          }
        }
        else{
          appui.error(bbn._('Something went wrong :('));
        }
      },
    }
  }
})();
