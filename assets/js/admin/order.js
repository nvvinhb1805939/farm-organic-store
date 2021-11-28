/*==============================IMPORT==============================*/
import * as main from "./main.js";
/*==============================VARIABLES==============================*/
/*-------------Table-------------*/
const orderIds = document.querySelectorAll(".main-table__id"),
  orderStatuses = document.querySelectorAll(".main-table__status");
/*-------------Btn-------------*/
const searchBtns = document.querySelectorAll(".main__btn--search");
/*==============================EVENTS & FUNTIONS==============================*/
/*-------------Update order-------------*/
main.editBtns.forEach((editBtn, index) => {
  editBtn.onclick = () => {
    const orderId = main.getTableDatas(orderIds)[index],
      orderStatus = main.getTableDatas(orderStatuses)[index];
    updateOrder(orderId, orderStatus);
  };
});
function updateOrder(orderId, orderStatus) {
  $.post(
    "addUpdate.php",
    {
      orderId: orderId,
      orderStatus: orderStatus,
    },
    function () {
      location.reload();
    }
  );
}
/*-------------Delete order-------------*/
main.deleteBtns.forEach((deleteBtn, index) => {
  deleteBtn.onclick = () => {
    const orderId = main.getTableDatas(orderIds)[index];
    cancelOrder(orderId);
  };
});
function cancelOrder(orderId) {
  const isDelete = confirm(`Bạn có muốn hủy đơn hàng này không?`);
  if (isDelete) {
    $.post(
      "remove.php",
      {
        orderId: orderId,
      },
      function () {
        location.reload();
      }
    );
  }
}
/*-------------View Details Order-------------*/
searchBtns.forEach(searchBtn => {
  searchBtn.onclick = () => {};
});
