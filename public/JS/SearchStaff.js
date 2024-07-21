// Lấy phần tử input theo ID
// var searchInput = document.getElementById("Live_Search");

// // Thêm một sự kiện "input" để theo dõi thay đổi trong ô tìm kiếm
// searchInput.addEventListener("input", function () {
//     // Lấy giá trị của ô tìm kiếm
//     var searchValue = searchInput.value;
//     // console.log("Giá trị tìm kiếm: " + searchValue);
//     var data = {
//         searchValue: searchValue,
//     };

//     $.ajax({
//         type: "POST",
//         url: "/php_mvc/Staff/SearchStaff/",
//         data: data ,
//         success: function (response) {

//             console.log("Kết quả từ máy chủ: " + response);
//         },
//         error: function (xhr, status, error) {
//             console.error("Lỗi: " + error);
//         }
//     });
// });
