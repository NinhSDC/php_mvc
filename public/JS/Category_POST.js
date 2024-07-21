document.addEventListener("DOMContentLoaded", function () {
  var sortedByTMP = document.querySelectorAll(".KeySorted_By");

  var categoryId = document.getElementById("categoryId").value;

  var currentPage = document.getElementById("currentPage").value;

  console.log(currentPage);

  sortedByTMP.forEach(function (element) {
    element.addEventListener("click", function () {
      // Lấy id của phần tử được click
      var sortedBy = element.id;

      console.log(sortedBy);

      // window.location.href = newHref;
    });
  });
});

// $(document).ready(function () {
//     $('.menu__category_POST').on('click', function (event) {
//         // event.preventDefault();

//         var Live_Search = $(this).attr('id');

//         var data = {
//                 Live_Search: Live_Search
//              };
//          $.ajax({
//              type: 'POST',
//               url: '/php_mvc/Search/Search_live/',
//              data: data,
//                 success: function (response) {
//               },
//               error: function (error) {
//              }
//          });
//     });
// });
