const hamburger = document.querySelector(".hamburger")
const sidebar = document.querySelector(".sidebar");
// const menu = document.querySelector("#menu");


// const main = document.querySelector(".main");


// sidebar.style.left = "-78px";


// hamburger.addEventListener("click", (e) => {
//   hamburger.classList.toggle("clicked");
//   if (sidebar.style.left == "-78px") {
//     sidebar.style.left = "0";
//   }
//   else {
//     sidebar.style.left = "-78px";
//   }

// });


// let menu_icon_box = document.querySelector(".menu_icon_box");
// let box = document.querySelector(".box");


hamburger.onclick = function () {
  hamburger.classList.toggle("active");
  sidebar.classList.toggle("sidebar_active");
}


document.onclick = function (e) {
  if (!hamburger.contains(e.target) && !sidebar.contains(e.target)) {
    hamburger.classList.remove("active");
    sidebar.classList.remove("active_box");
  }
}
