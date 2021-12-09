const writeSpace = document.querySelector("textarea");
const dateArea = document.querySelector("input[type='hidden']");
const inputContainer = Array.from(
  document.querySelectorAll("input, select, textarea")
);
const submitBtn = document.querySelector("input[type='submit']");
let postData = {};
postData = JSON.parse(localStorage.getItem("postData", postData)) || {};

function getPostData() {
  const postData = {};
  inputContainer.forEach((input) => {
    if (input.id != "submit" && input.name != "hidden")
      postData[input.id] = input.value;
  });
  const date = new Date();
  const dateString = `${date.getFullYear()}.${date.getMonth()}.${date.getDate()}.`;
  dateArea.value = dateString;
  postData.date = dateString;
  localStorage.setItem("postData", JSON.stringify(postData));
  return postData;
}

// 새로고침했을때도 값이 있었음 좋겠다
function setPostData() {
  inputContainer.forEach((input) => {
    if (input.id != "submit") {
      input.value = postData[input.id];
    }
  });
}

setPostData();

writeSpace.addEventListener("keydown", (e) => {
  if (e.keyCode == 13) {
    e.preventDefault();
    writeSpace.value += "\n";
    return false;
  }
});
submitBtn.addEventListener("click", (e) => {
  console.log(dateArea);
  // e.preventDefault();
  postData = getPostData();
});
