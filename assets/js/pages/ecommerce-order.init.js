var str_dt = function (e) {
    var t = new Date(e),
      a = (t.getHours() + ":" + t.getMinutes()).split(":"),
      e = 12 <= (n = a[0]) ? "PM" : "AM",
      n = (n %= 12) || 12,
      a = (a = a[1]) < 10 ? "0" + a : a;
    return (
      (month =
        "" +
        [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ][t.getMonth()]),
      (day = "" + t.getDate()),
      (year = t.getFullYear()),
      month.length < 2 && (month = "0" + month),
      day.length < 2 && (day = "0" + day),
      [
        day +
          " " +
          month +
          "," +
          year +
          " <small class='text-muted'>" +
          n +
          ":" +
          a +
          " " +
          e +
          "</small>",
      ]
    );
  },
  isChoiceEl = document.getElementById("idStatus"),
  choices = new Choices(isChoiceEl, { searchEnabled: !1 }),
  isPaymentEl = document.getElementById("idPayment"),
  choices = new Choices(isPaymentEl, { searchEnabled: !1 }),
  checkAll = document.getElementById("checkAll");
checkAll &&
  (checkAll.onclick = function () {
    for (
      var e = document.querySelectorAll(
          '.form-check-all input[type="checkbox"]'
        ),
        t = 0;
      t < e.length;
      t++
    )
      (e[t].checked = this.checked),
        e[t].checked
          ? e[t].closest("tr").classList.add("table-active")
          : e[t].closest("tr").classList.remove("table-active");
  });
var perPage = 8,
  options = {
    valueNames: [
      "id",
      "customer_name",
      "product_name",
      "date",
      "amount",
      "payment",
      "status",
    ],
    page: perPage,
    pagination: !0,
    plugins: [ListPagination({ left: 2, right: 2 })],
  },
  orderList = new List("orderList", options).on("updated", function (e) {
    0 == e.matchingItems.length
      ? (document.getElementsByClassName("noresult")[0].style.display = "block")
      : (document.getElementsByClassName("noresult")[0].style.display = "none");
    var t = 1 == e.i,
      a = e.i > e.matchingItems.length - e.page;
    document.querySelector(".pagination-prev.disabled") &&
      document
        .querySelector(".pagination-prev.disabled")
        .classList.remove("disabled"),
      document.querySelector(".pagination-next.disabled") &&
        document
          .querySelector(".pagination-next.disabled")
          .classList.remove("disabled"),
      t && document.querySelector(".pagination-prev").classList.add("disabled"),
      a && document.querySelector(".pagination-next").classList.add("disabled"),
      e.matchingItems.length <= perPage
        ? (document.querySelector(".pagination-wrap").style.display = "none")
        : (document.querySelector(".pagination-wrap").style.display = "flex"),
      e.matchingItems.length == perPage &&
        document
          .querySelector(".pagination.listjs-pagination")
          .firstElementChild.children[0].click(),
      0 < e.matchingItems.length
        ? (document.getElementsByClassName("noresult")[0].style.display =
            "none")
        : (document.getElementsByClassName("noresult")[0].style.display =
            "block");
  });
const xhttp = new XMLHttpRequest();
(xhttp.onload = function () {
  JSON.parse(this.responseText).forEach(function (e) {
    orderList.add({
      id:
        '<a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ' +
        e.id +
        "</a>",
      customer_name: e.customer_name,
      product_name: e.product_name,
      date: str_dt(e.date),
      amount: e.amount,
      payment: e.payment,
      status: isStatus(e.status),
    }),
      orderList.sort("id", { order: "desc" }),
      refreshCallbacks();
  }),
    orderList.remove(
      "id",
      '<a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2101</a>'
    );
}),
  xhttp.open("GET", "assets/json/orders-list.init.json"),
  xhttp.send(),
  (isCount = new DOMParser().parseFromString(
    orderList.items.slice(-1)[0]._values.id,
    "text/html"
  ));
var isValue = isCount.body.firstElementChild.innerHTML,
  idField = document.getElementById("orderId"),
  customerNameField = document.getElementById("customername-field"),
  productNameField = document.getElementById("productname-field"),
  dateField = document.getElementById("date-field"),
  amountField = document.getElementById("amount-field"),
  paymentField = document.getElementById("payment-field"),
  statusField = document.getElementById("delivered-status"),
  addBtn = document.getElementById("add-btn"),
  editBtn = document.getElementById("edit-btn"),
  removeBtns = document.getElementsByClassName("remove-item-btn"),
  editBtns = document.getElementsByClassName("edit-item-btn");
refreshCallbacks();
var tabEl = document.querySelectorAll('a[data-bs-toggle="tab"]');
function filterOrder(e) {
  var t = e;
  orderList.filter(function (e) {
    matchData = new DOMParser().parseFromString(e.values().status, "text/html");
    e = matchData.body.firstElementChild.innerHTML;
    return "All" == e || "All" == t || e == t;
  }),
    orderList.update();
}
function updateList() {
  var t = document.querySelector("input[name=status]:checked").value;
  (data = userList.filter(function (e) {
    return "All" == t || e.values().sts == t;
  })),
    userList.update();
}
tabEl.forEach(function (e) {
  e.addEventListener("shown.bs.tab", function (e) {
    filterOrder(e.target.id);
  });
}),
  document
    .getElementById("showModal")
    .addEventListener("show.bs.modal", function (e) {
      e.relatedTarget.classList.contains("edit-item-btn")
        ? ((document.getElementById("exampleModalLabel").innerHTML =
            "Edit Order"),
          (document
            .getElementById("showModal")
            .querySelector(".modal-footer").style.display = "block"),
          (document.getElementById("add-btn").style.display = "none"),
          (document.getElementById("edit-btn").style.display = "block"))
        : e.relatedTarget.classList.contains("add-btn")
        ? ((document.getElementById("modal-id").style.display = "none"),
          (document.getElementById("exampleModalLabel").innerHTML =
            "Add Order"),
          (document
            .getElementById("showModal")
            .querySelector(".modal-footer").style.display = "block"),
          (document.getElementById("edit-btn").style.display = "none"),
          (document.getElementById("add-btn").style.display = "block"))
        : ((document.getElementById("exampleModalLabel").innerHTML =
            "List Order"),
          (document
            .getElementById("showModal")
            .querySelector(".modal-footer").style.display = "none"));
    }),
  ischeckboxcheck(),
  document
    .getElementById("showModal")
    .addEventListener("hidden.bs.modal", function () {
      clearFields();
    }),
  document.querySelector("#orderList").addEventListener("click", function () {
    refreshCallbacks(), ischeckboxcheck();
  });
var table = document.getElementById("orderTable"),
  tr = table.getElementsByTagName("tr"),
  trlist = table.querySelectorAll(".list tr");
function SearchData() {
  var s = document.getElementById("idStatus").value,
    d = document.getElementById("idPayment").value,
    i = document.getElementById("demo-datepicker").value,
    r = i.split(" to ")[0],
    o = i.split(" to ")[1];
  orderList.filter(function (e) {
    matchData = new DOMParser().parseFromString(e.values().status, "text/html");
    var t = matchData.body.firstElementChild.innerHTML,
      a = !1,
      n = !1,
      l = !1,
      a = "all" == t || "all" == s || t == s,
      n = "all" == e.values().payment || "all" == d || e.values().payment == d,
      l =
        new Date(e.values().date.slice(0, 12)) >= new Date(r) &&
        new Date(e.values().date.slice(0, 12)) <= new Date(o);
    return (
      (a && n && l) ||
      (a && n && "" == i ? a && n : n && l && "" == i ? n && l : void 0)
    );
  }),
    orderList.update();
}
var count = 13;
addBtn.addEventListener("click", function (e) {
  "" !== customerNameField.value &&
    "" !== productNameField.value &&
    "" !== dateField.value &&
    "" !== amountField.value &&
    "" !== paymentField.value &&
    (orderList.add({
      id:
        '<a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ' +
        count +
        "</a>",
      customer_name: customerNameField.value,
      product_name: productNameField.value,
      date: dateField.value,
      amount: "$" + amountField.value,
      payment: paymentField.value,
      status: isStatus(statusField.value),
    }),
    orderList.sort("id", { order: "desc" }),
    document.getElementById("close-modal").click(),
    clearFields(),
    refreshCallbacks(),
    filterOrder("All"),
    count++,
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Order inserted successfully!",
      showConfirmButton: !1,
      timer: 2e3,
      showCloseButton: !0,
    }));
}),
  editBtn.addEventListener("click", function (e) {
    (document.getElementById("exampleModalLabel").innerHTML = "Edit Order"),
      orderList.get({ id: idField.value }).forEach(function (e) {
        (isid = new DOMParser().parseFromString(e._values.id, "text/html")),
          isid.body.firstElementChild.innerHTML == itemId &&
            e.values({
              id:
                '<a href="javascript:void(0);" class="fw-medium link-primary">' +
                idField.value +
                "</a>",
              customer_name: customerNameField.value,
              product_name: productNameField.value,
              date:
                dateField.value.slice(0, 14) +
                '<small class="text-muted">' +
                dateField.value.slice(14, 22),
              amount: amountField.value,
              payment: paymentField.value,
              status: isStatus(statusField.value),
            });
      }),
      document.getElementById("close-modal").click(),
      clearFields(),
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Order updated Successfully!",
        showConfirmButton: !1,
        timer: 2e3,
        showCloseButton: !0,
      });
  });
var example = new Choices(paymentField),
  statusVal = new Choices(statusField),
  productnameVal = new Choices(productNameField);
function isStatus(e) {
  switch (e) {
    case "Delivered":
      return (
        '<span class="badge badge-soft-success text-uppercase">' + e + "</span>"
      );
    case "Cancelled":
      return (
        '<span class="badge badge-soft-danger text-uppercase">' + e + "</span>"
      );
    case "Inprogress":
      return (
        '<span class="badge badge-soft-secondary text-uppercase">' +
        e +
        "</span>"
      );
    case "Pickups":
      return (
        '<span class="badge badge-soft-info text-uppercase">' + e + "</span>"
      );
    case "Returns":
      return (
        '<span class="badge badge-soft-primary text-uppercase">' + e + "</span>"
      );
    case "Pending":
      return (
        '<span class="badge badge-soft-warning text-uppercase">' + e + "</span>"
      );
  }
}
function ischeckboxcheck() {
  document.getElementsByName("checkAll").forEach(function (e) {
    e.addEventListener("click", function (e) {
      e.target.checked
        ? e.target.closest("tr").classList.add("table-active")
        : e.target.closest("tr").classList.remove("table-active");
    });
  });
}
function refreshCallbacks() {
  removeBtns.forEach(function (e) {
    e.addEventListener("click", function (e) {
      e.target.closest("tr").children[1].innerText,
        (itemId = e.target.closest("tr").children[1].innerText),
        orderList.get({ id: itemId }).forEach(function (e) {
          deleteid = new DOMParser().parseFromString(e._values.id, "text/html");
          var t = deleteid.body.firstElementChild;
          deleteid.body.firstElementChild.innerHTML == itemId &&
            document
              .getElementById("delete-record")
              .addEventListener("click", function () {
                orderList.remove("id", t.outerHTML),
                  document.getElementById("deleteOrder").click();
              });
        });
    });
  }),
    editBtns.forEach(function (e) {
      e.addEventListener("click", function (e) {
        e.target.closest("tr").children[1].innerText,
          (itemId = e.target.closest("tr").children[1].innerText),
          orderList.get({ id: itemId }).forEach(function (e) {
            isid = new DOMParser().parseFromString(e._values.id, "text/html");
            var t = isid.body.firstElementChild.innerHTML;
            t == itemId &&
              ((idField.value = t),
              (customerNameField.value = e._values.customer_name),
              (productNameField.value = e._values.product_name),
              (dateField.value = e._values.date),
              (amountField.value = e._values.amount),
              example && example.destroy(),
              (example = new Choices(paymentField, { searchEnabled: !1 })),
              (t = e._values.payment),
              example.setChoiceByValue(t),
              productnameVal && productnameVal.destroy(),
              (productnameVal = new Choices(productNameField, {
                searchEnabled: !1,
              })),
              (t = e._values.product_name),
              productnameVal.setChoiceByValue(t),
              statusVal && statusVal.destroy(),
              (statusVal = new Choices(statusField, { searchEnabled: !1 })),
              (val = new DOMParser().parseFromString(
                e._values.status,
                "text/html"
              )),
              (t = val.body.firstElementChild.innerHTML),
              statusVal.setChoiceByValue(t),
              flatpickr("#date-field", {
                enableTime: !0,
                dateFormat: "d M, Y, h:i K",
                defaultDate: e._values.date,
              }));
          });
      });
    });
}
function clearFields() {
  (customerNameField.value = ""),
    (productNameField.value = ""),
    (dateField.value = ""),
    (amountField.value = ""),
    (paymentField.value = ""),
    example && example.destroy(),
    (example = new Choices(paymentField)),
    productnameVal && productnameVal.destroy(),
    (productnameVal = new Choices(productNameField)),
    statusVal && statusVal.destroy(),
    (statusVal = new Choices(statusField));
}
function deleteMultiple() {
  ids_array = [];
  var e,
    t = document.querySelectorAll(".form-check [value=option1]");
  for (i = 0; i < t.length; i++)
    1 == t[i].checked &&
      ((e =
        t[i].parentNode.parentNode.parentNode.querySelector("td a").innerHTML),
      ids_array.push(e));
  "undefined" != typeof ids_array && 0 < ids_array.length
    ? Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-danger w-xs mt-2",
        confirmButtonText: "Yes, delete it!",
        buttonsStyling: !1,
        showCloseButton: !0,
      }).then(function (e) {
        if (e.value) {
          for (i = 0; i < ids_array.length; i++)
            orderList.remove(
              "id",
              '<a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">' +
                ids_array[i] +
                "</a>"
            );
          (document.getElementById("checkAll").checked = !1),
            Swal.fire({
              title: "Deleted!",
              text: "Your data has been deleted.",
              icon: "success",
              confirmButtonClass: "btn btn-info w-xs mt-2",
              buttonsStyling: !1,
            });
        }
      })
    : Swal.fire({
        title: "Please select at least one checkbox",
        confirmButtonClass: "btn btn-info",
        buttonsStyling: !1,
        showCloseButton: !0,
      });
}
document
  .querySelector(".pagination-next")
  .addEventListener("click", function () {
    !document.querySelector(".pagination.listjs-pagination") ||
      (document
        .querySelector(".pagination.listjs-pagination")
        .querySelector(".active") &&
        document
          .querySelector(".pagination.listjs-pagination")
          .querySelector(".active")
          .nextElementSibling.children[0].click());
  }),
  document
    .querySelector(".pagination-prev")
    .addEventListener("click", function () {
      !document.querySelector(".pagination.listjs-pagination") ||
        (document
          .querySelector(".pagination.listjs-pagination")
          .querySelector(".active") &&
          document
            .querySelector(".pagination.listjs-pagination")
            .querySelector(".active")
            .previousSibling.children[0].click());
    });
