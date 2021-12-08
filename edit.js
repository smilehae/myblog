const writeSpace = document.querySelector("input[type='textarea']");
const inputContainer = Array.from(document.querySelectorAll("input, select"));
const submitBtn = document.querySelector("input[type='submit']");
let postData = {};
postData = JSON.parse(localStorage.getItem("postData", postData)) || {};

function getPostData() {
  const postData = {};
  inputContainer.forEach((input) => {
    if (input.id != "submit") postData[input.id] = input.value;
  });
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
    console.log(writeSpace.value);
  }
});
submitBtn.addEventListener("click", (e) => {
  postData = getPostData();
  //   document.location.href = "edit.php";
});
