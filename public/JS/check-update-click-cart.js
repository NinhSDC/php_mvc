function validateForm() {
    // Lấy danh sách các trường input trong form
    var inputs = document.forms["listProduct"].getElementsByTagName("input");

    for (var i = 0; i < inputs.length; i++) {
        // Kiểm tra nếu trường input là trống
        if (inputs[i].value.trim() === '') {
            alert("Vui lòng điền đầy đủ thông tin.");
            return false; // Chặn hoạt động submit
        }
    }

    return true; // Cho phép hoạt động submit nếu không có trường input nào trống
}