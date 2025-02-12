<!-- HTML Document -->

<appui-note-media-browser2 :source="media"
                           :data="{id_note: source.id_note, front_img: source.front_img ? source.front_img : ''}"
                           @added="browserAdd"
                           :single="false"
                           pathName="path"
                           overlay-name="name"
                           searchName="name"
                           @delete="browserDelete"
                           @download="browserDownload"
                           :download="root + 'actions/media/file'"
                           :upload="root + 'media/actions/upload'"
                           :removed="root + 'media/actions/remove'">
</appui-note-media-browser2>
