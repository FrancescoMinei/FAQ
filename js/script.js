function EditUrlTag() {
    let input = document.getElementById("STag");
    let url = window.location.href.split('?');
    let tag = input.value;
    url[0] += "?Tag=" + tag;
    window.location.href = url[0];
}

function EditUrlTitle() {
    let input = document.getElementById("Search");
    let url = window.location.href.split('?');
    let Title = input.value;
    url[0] += "?Title=" + Title;
    window.location.href = url[0];
}

function PressEnter() {
    let input = document.getElementById("Search");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("btn-search").click();
        }
    });
}
PressEnter();