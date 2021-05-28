window.onbeforeunload = function(event) {
  event.returnValue = "Write something clever here..";
};

function IgnoreBeforeUnload(){
  window.onbeforeunload = null;
}
