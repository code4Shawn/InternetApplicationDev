document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
});

let openMyModal = ($id, $f, $l, $c) => {
    $("#modal1").modal('open')
    document.getElementById("first_name").value = $f
    document.getElementById("last_name").value = $l
    document.getElementById("city").value = $c
    document.getElementById("id").value = $id
}