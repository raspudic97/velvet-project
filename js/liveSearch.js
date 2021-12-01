function ajsearch(logged_user) {
  // (A) GET SEARCH TERM
  var data = new FormData();
  data.append("search", document.getElementById("search").value);
  data.append("ajax", 1);

  // (B) AJAX SEARCH REQUEST
  fetch("scripts/liveSearch.php", { method: "POST", body: data })
    .then((res) => res.json())
    .then((results) => {
      var wrapper = document.getElementById("results");
      wrapper.style.display = "flex";

      if (results.length > 0) {
        wrapper.innerHTML = "";

        for (let res of results) {
          //Napravi div za rezultat pretrage
          let result_container = document.createElement("div");
          result_container.classList.add("user-result-container");

          // Prikazi samo korisnike koji nisu ulogovani korisnik
          if (res["id"] != logged_user) {
            wrapper.appendChild(result_container);
          }

          //Dodaj podatke u rezultat
          let user_info = document.createElement("a");
          user_info.href =
            "http://localhost/velvetproject/user_profile.php?id=" + res["id"];
          user_info.innerHTML = `${res["fullname"]} - ${res["username"]}`;
          user_info.classList.add("user-search-result");
          result_container.appendChild(user_info);

          //Dodaj korisnikovu profilnu sliku rezultat
          let user_profile_picture = document.createElement("img");
          user_profile_picture.classList.add("user-search-profile-picture");
          user_profile_picture.src = "views/assets/images/jinx.jpg";
          user_info.insertBefore(user_profile_picture, user_info.firstChild);

          //Buttons container
          let buttons_container = document.createElement("div");
          buttons_container.classList.add("buttons_container");
          result_container.appendChild(buttons_container);

          //Dodaj Add Friend button u buttons container
          let add_friend_btn = document.createElement("button");
          add_friend_btn.classList.add("add-friend-btn");

          //Provjeri da li su korisnici prijatelji
          var is_friend = new FormData();
          is_friend.append("user_id", res["id"]);
          is_friend.append("ajax", 1);

          fetch("scripts/is_friend.php", { method: "POST", body: is_friend })
            .then((res) => res.json())
            .then((result) => {
              if (result == false) {
                add_friend_btn.textContent = "Add friend";
                add_friend_btn.value = "false";
                add_friend_btn.setAttribute(
                  "id",
                  `${res["id"]}-add-friend-btn`
                );
                add_friend_btn.addEventListener("click", function (e) {
                  addFriend(res["id"]);
                });
              } else {
                add_friend_btn.textContent = "Friend";
                add_friend_btn.value = "true";
                add_friend_btn.setAttribute(
                  "id",
                  `${res["id"]}-add-friend-btn`
                );
                add_friend_btn.addEventListener("click", function (e) {
                  addFriend(res["id"]);
                });
              }
            });

          buttons_container.appendChild(add_friend_btn);
        }
      } else {
        wrapper.innerHTML = "No results found";
        wrapper.style.color = "#fff";
      }
    });

  return false;
}

function is_friend(this_user_id) {
  var data = new FormData();
  data.append("user_id", this_user_id);
  data.append("ajax", 1);

  fetch("scripts/is_friend.php", { method: "POST", body: data })
    .then((res) => res.json())
    .then((result) => {
      console.log(result["is_friend"]);
    });

  return false;
}

function addFriend(user_id) {
  var is_friend_btn = document.getElementById(`${user_id}-add-friend-btn`);

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
