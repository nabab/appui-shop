(() => {
  return {
    data(){
      return {
        root: appui.plugins['appui-shop']
      };
    },
    methods: {
      deleteProvider(a, b, c){
        this.confirm(bbn._('Are you sure you want to delete '+ a.name +'?'), () => {
          this.post(this.root + '/actions/provider/delete', a, (d) => {
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
        this.getPopup({
          label: bbn._('Edit provider'),
          scrollable:true,
          source: a,
          component: 'appui-shop-provider-form',
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
    },
    components: {
      providerEmails: {
        template: `
<div>
  <div v-for="email in emails" class="bbn-w-100 bbn-vspadding">
      <span v-text="email"></span>
      <i class="bbn-red nf nf-fa-trash bbn-p" @click="deleteEmail(email)" :title="_('Delete email address')"></i>
  </div>
  <div class="bbn-w-100 bbn-vspadding">
    <i class="bbn-green nf nf-fa-plus bbn-p bbn-xsmall" @click="addingEmail = true" :title="_('Add email address')"></i>
    <bbn-input v-model="newEmail" v-if="addingEmail" type="email" @keydown.enter="addEmail(newEmail)"/>
    <i class="bbn-green nf nf-fa-check bbn-p" @click="addEmail(newEmail)" v-if="isEmail(newEmail)" :title="_('Add email address')"></i>
  </div>
</div>
`,
        data(){
          return {
            parent: this.closest('bbn-container').getComponent(),
            emails: [],
            addingEmail: false,
            newEmail: ''
          }
        },
        props: ['source'],
        methods: {
          deleteEmail(email){
            let cp = this;
            this.confirm(bbn._('Are you sure you want to delete this email address'), () => {
              this.post(this.parent.root + '/actions/provider/deleteEmail', {
                email: email,
                id: cp.source.id
              }, (d) => {
                if(d.success){
                  appui.success(bbn._('Email address deleted'))
                  this.parent.$refs.table.updateData();

                }
              })
            })
          },
          isEmail(email){
            return bbn.fn.isEmail(email)
          },
          addEmail(email){
            let cp = this;
            if (email.length && bbn.fn.isEmail(email)) {
              this.post(this.parent.root + '/actions/provider/addEmail', {
                email: email,
                id: cp.source.id
              }, (d) => {
                if(d.success){
                  appui.success(bbn._('Email address added'))
                  this.parent.$refs.table.updateData();
  
                }
              })
            }
            else {
              this.getPopup().alert(bbn._("Please insert a valid email address"));
            }
          }
        },
        mounted(){
          if (this.source.emails) {
            this.emails = this.source.emails.split(',');
          }
        }
      
        
      }
    }
  }
})();
