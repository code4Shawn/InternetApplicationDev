let validateForm = () => {
    let f_name = document.getElementById("first_name").value
    let l_name = document.getElementById("last_name").value
    let city = document.getElementById("city").value

    if (f_name && l_name && city)
        return true
    alert('Add all the fields required')
    return false
}