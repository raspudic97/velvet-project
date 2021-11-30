function addFriend(user_id) {
  let is_friend_btn = document.getElementById(`${user_id}-add-friend-btn`);

  $.ajax({
    type: "POST",
    url: "scripts/addFriend.php",
    data: {
      user_id: user_id,
      is_friend: is_friend_btn.value,
    },
    success: function () {
      if (is_friend_btn.value == "true") {
        is_friend_btn.value = "false";
        is_friend_btn.innerHTML = "Add friend";
      } else {
        is_friend_btn.value = "true";
        is_friend_btn.innerHTML = "Friend";
      }
    },
  });

  return false;
}