    var post_id = "";
    var buttons = document.getElementsByClassName("remove-post");
    var buttonsCount = buttons.length;

    for (var i = 0; i < buttonsCount; i += 1) {
        buttons[i].onclick = function(e) {
            post_id = this.id.split("-")[0];
        }
    }

    function deletePost() {
        var post = document.getElementById(`${post_id}`);

        $.ajax({
            type: 'POST',
            url: 'scripts/deletePost.php',
            data: {
                post_id: post_id,
            },
            success: function() {
                post.style.display = "none";
            }
        });

        return false;
    }