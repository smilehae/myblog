const writeSpace = document.querySelector("textarea");
const dateArea = document.querySelector("input[type='hidden']");
const inputContainer = Array.from(
  document.querySelectorAll("input, select, textarea")
);
const submitBtn = document.querySelector("input[type='submit']");
let postData = {};
postData = JSON.parse(localStorage.getItem("postData", postData)) || {};

// 데이터 저장
function setPostData() {
  inputContainer.forEach((input) => {
    if (input.id != "submit" && input.name != "hidden")
      postData[input.id] = input.value;
  });
  const date = new Date();
  const dateString = `${date.getFullYear()}.${date.getMonth()}.${date.getDate()}.`;
  dateArea.value = dateString;
  postData.date = dateString;
  localStorage.setItem("postData", JSON.stringify(postData));
}

// 새로고침했을때도 값 유지 ( 로컬데이터에 저장한 데이터 불러오기)
function getPostData() {
  inputContainer.forEach((input) => {
    if (input.id != "submit") {
      input.value = postData[input.id];
    }
  });
}

getPostData();

writeSpace.addEventListener("keydown", (e) => {
  if (e.keyCode == 13) {
    e.preventDefault();
    writeSpace.value += "\n";
    return false;
  }
});
inputContainer.forEach((input) => {
  input.addEventListener("input", (e) => {
    setPostData();
  });
});
writeSpace.addEventListener("input", (e) => {
  console.log(writeSpace.value);
});

submitBtn.addEventListener("click", (e) => {
  console.log(dateArea);
  // e.preventDefault();
  setPostData();
});

// document.querySelector("body").addEventListener("keydown", (e) => {
//   if (e.keyCode == "116") {
//     getPostData();
//     e.preventDefault();
//   }
// });

// window.addEventListener("load", (e) => {
//   getPostData();
// });
