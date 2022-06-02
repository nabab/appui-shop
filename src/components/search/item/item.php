<!-- HTML Document -->
<div class="apst-shop-search-item bbn-w-100">
  <appui-search-result-item :source="source">
    <span slot="title">
      <span class="bbn-s">Product!</span><br>
      <span v-text="_('V') + ' ' + source.version"
            :title="_('Version number') + ' (' + (source.latest ? _('This is the latest version') : _('This is not the latest version')) + ')'"
            :class="[
                    'bbn-right-margin',
                    {'bbn-b': source.latest}
                    ]"/>
      <span slot="content"
            v-text="source.title"
            class="bbn-light"/>
    </span>
  </appui-search-result-item>
</div>
