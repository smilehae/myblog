const writeSpace = document.querySelector("input[type='textarea']");
const inputContainer = Array.from(document.querySelectorAll("input, select"));
const submitBtn = document.querySelector("input[type='submit']");

let postData = {};

function getPostData() {
  const postData = {};
  inputContainer.forEach((input) => {
    if (input.id != "submit") postData[input.id] = input.value;
  });
  return postData;
}

writeSpace.addEventListener("keydown", (e) => {
  if (e.keyCode == 13) {
    console.log(writeSpace.value);
  }
});
submitBtn.addEventListener("click", () => {
  postData = getPostData();
});
