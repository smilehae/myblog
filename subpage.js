const editbtn = document.querySelector(".edit_btn");
const delbtn = document.querySelector(".del_btn");
const id = document.querySelector(".hidden_id").textContent;
const pw = document.querySelector(".hidden_pw").textContent;

function authorizePw() {
  let ans = prompt("이 게시글의 비밀번호를 입력하세요.");
  if (ans.toLowerCase() === pw) {
    return true;
  } else {
    alert("비밀번호가 틀렸습니다.");
    return false;
  }
}

editbtn.addEventListener("click", () => {
  if (authorizePw()) {
    location.href = `./edit.php?id=${id}`;
  }
});

delbtn.addEventListener("click", () => {
  if (authorizePw()) {
    const ans = window.confirm("정말 해당 게시물을 삭제하시겠습니까?");
    if (ans) {
      location.href = `./delete.php?id=${id}`;
    }
  }
});
