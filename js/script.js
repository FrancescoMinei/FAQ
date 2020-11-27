function EditUrl() {
    let input = document.getElementById("Search");
    let url = window.location.href.split('?');
    let tag = input.value;
    url[0] += "?Tag=" + '"' + tag + '"';
    window.location.href = url[0];
}