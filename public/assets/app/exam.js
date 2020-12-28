$(document).ready(function() {
    showTab()
})

$('.btn-start').click(function(evt) {
    $('#start-exam').hide();
    evt.preventDefault()

})
currentTab = 0
$('.btn-next').click(function(evt) {
        var answer = $('#form_' + currentTab).serialize();
        console.log(answer)
        nextForm()
        evt.preventDefault()

    })
    /* $('#form_' + currentTab).submit(function(evt) {
        alert('form_' + currentTab)
        nextForm()
        evt.preventDefault()
    }) */

function nextForm() {
    var frame = document.getElementsByClassName("form-layout")
    frame[currentTab].style.display = "none";
    stepLight(currentTab)
    currentTab += 1
    showTab()

}

function showTab() {
    var frame = document.getElementsByClassName("form-layout")
    frame[currentTab].style.display = "block"


}

function stepLight(index) {
    var x = document.getElementsByClassName("bar");
    x[index].classList.remove("bar-active")
    x[index].className += " bar-finish"
    index += 1;
    x[index].className += " bar-active"
}