<appui-note-media-picker :source="media"
                         :data="{id_note: source.id_note, front_img: source.front_img ? source.front_img : ''}"
                         @added="browserAdd"
                         :single="false"
                         pathName="path"
                         overlay-name="name"
                         searchName="name"
                         @delete="browserDelete"
                         @download="browserDownload"
                         @clickItem="selectMain"
                         :download="root + 'actions/media/file'"
                         :upload="root + 'media/actions/upload'"
                         :remove="root + 'media/actions/remove'">
</appui-note-media-picker>
