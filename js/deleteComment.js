var comment_id = "";
var buttons = document.getElementsByClassName("remove-comment");
var buttonsCount = buttons.length;

for (var i = 0; i < buttonsCount; i += 1) {
    buttons[i].onclick = function(e) {
        comment_id = this.id.split("-")[0];
    }
}

function deleteComment() {
    var comment = document.getElementById(`${comment_id}`);

    $.ajax({
        type: 'POST',
        url: 'scripts/deleteComment.php',
        data: {
            comment_id: comment_id,
        },
        success: function() {
            comment.style.display = "none";
        }
    });

    return false;
}