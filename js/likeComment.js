var comment_id = "";
var comment_buttons = document.getElementsByClassName("comment-like-btn");
var comment_buttons_count = comment_buttons.length;

for (var i = 0; i < comment_buttons_count; i += 1) {
  comment_buttons[i].onclick = function (e) {
    comment_id = this.id.split("-")[0];
    console.log(comment_id);
  };
}
function likeComment() {
  var isLikedCommentBtn = document.getElementById(`${comment_id}-comment`);
  var isLikedCommentBool = isLikedCommentBtn.value === "true";

  $.ajax({
    type: "POST",
    url: "scripts/likeComment.php",
    data: {
      comment_id: comment_id,
      is_liked: isLikedCommentBtn.value,
    },
    success: function () {
      if (isLikedCommentBool) {
        isLikedCommentBtn.value = "false";
        isLikedCommentBtn.innerHTML = '<i class="far fa-heart"></i>';
      } else {
        isLikedCommentBtn.value = "true";
        isLikedCommentBtn.innerHTML = '<i class="fas fa-heart"></i>';
      }
    },
  });

  return false;
}
