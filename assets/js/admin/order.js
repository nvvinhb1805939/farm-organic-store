/*==============================IMPORT==============================*/
import * as main from "./main.js";
/*==============================VARIABLES==============================*/
const orderIds = document.querySelectorAll(".main-table__id"),
  orderStatuses = document.querySelectorAll(".main-table__status"),
  successDates = document.querySelectorAll(".main-table__delivery-date");
/*==============================EVENTS & FUNTIONS==============================*/
/*-------------Update order-------------*/
main.editBtns.forEach((editBtn, index) => {
  editBtn.onclick = () => {
    const orderId = main.getTableDatas(orderIds)[index],
      orderStatus = main.getTableDatas(orderStatuses)[index],
      successDate = main.getTableDatas(successDates)[index];
    updateOrder(orderId, orderStatus, successDate);
  };
});
function updateOrder(orderId, orderStatus, successDate) {
  $.post(
    "addUpdate.php",
    {
      orderId: orderId,
      orderStatus: orderStatus,
      successDate: successDate,
    },
    function () {
      location.reload();
    }
  );
}

// main.deleteBtns.forEach((deleteBtn, index) => {
//     deleteBtn.onclick = () => {
//       const productId = main.getTableDatas(productIds)[index],
//         productName = main.getTableDatas(productNames)[index];
//       deleteProduct(productId, productName);
//     };
//   });
//   function deleteProduct(productId, productName) {
//     const isDelete = confirm(`Bạn có muốn xoá sản phẩm ${productName} không?`);
//     if (isDelete) {
//       $.post(
//         "remove.php",
//         {
//           productId: productId,
//         },
//         function () {
//           location.reload();
//         }
//       );
//     }
//   }
