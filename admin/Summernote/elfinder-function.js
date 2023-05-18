function elfinderDialog(context) {
  // <------------------ +context
  var fm = $("<div/>")
    .dialogelfinder({
      url: "/admin/Summernote/elFinder/php/connector.minimal.php",
      lang: "en",
      width: 840,
      height: 450,
      destroyOnClose: true,
      getFileCallback: function (file, fm) {
        console.log(file);
        // $('.editor').summernote('editor.insertImage', fm.convAbsUrl(file.url)); ...before
        context.invoke("editor.insertImage", fm.convAbsUrl(file.url)); // <------------ after
      },
      commandsOptions: {
        getfile: {
          oncomplete: "close",
          folders: false,
        },
      },
    })
    .dialogelfinder("instance");
}
