// Javascript Document

(() => {
  return {
    props: ['source'],
    data(){
      return {
        root: appui.plugins['appui-note'] + '/',
      };
    },
    computed:{
      media(){
        return this.source.media;
      }
    },
    methods: {
      browserDownload(a){
        let st = '';
        bbn.fn.each(a, (v, i) => {
          st += v.id + '/';
        });
        var a  = document.createElement('a');
        a.href = 'actions/file/' + st;
        a.style.display = 'none';

        a.id = 'zip';
        document.body.appendChild(a);
        a.click();
      },
      browserAdd(){
        let cp = this.closest('bbn-container').getComponent();
        cp.$refs['table'].updateData();
        this.find('bbn-gallery').updateData();
        //this.closest('bbn-popup').close();

      },
      browserDelete(a){
        this.post('admin/actions/media/delete', a, (d) =>{
          if(d.success){
            bbn.fn.each(a.media, (v, i)=>{
              let idx = bbn.fn.search(this.source.media, 'id', v.id);
              if(idx > -1){
                this.source.media.splice(idx,1);
              }
              this.closest('bbn-container').getComponent().$refs['table'].updateData();
              this.find('bbn-gallery').currentData.splice(idx, 1);
            });

            console.log(a);
          }
        });
      }
    }
  }
})();