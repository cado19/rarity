function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: 'Copied Link',
        showConfirmButton: false,
        timer: 3000
    });
}