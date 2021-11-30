var post_id = "";
var buttons = document.getElementsByTagName("button");
var buttonsCount = buttons.length;

for (var i = 0; i < buttonsCount; i += 1) {
  buttons[i].onclick = function (e) {
    post_id = this.id.split("-")[0];
  };
}
function likePost() {
  var isLikedBtn = document.getElementById(`${post_id}-post`);
  var isLikedBool = isLikedBtn.value === "true";

  $.ajax({
    type: "POST",
    url: "scripts/likePost.php",
    data: {
      post_id: post_id,
      is_liked: isLikedBtn.value,
    },
    success: function () {
      if (isLikedBool) {
        isLikedBtn.value = "false";
        isLikedBtn.innerHTML = '<i class="far fa-heart"></i>';
      } else {
        isLikedBtn.value = "true";
        isLikedBtn.innerHTML = '<i class="fas fa-heart"></i>';
      }
    },
  });

  return false;
}
