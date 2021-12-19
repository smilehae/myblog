const editbtn = document.querySelector(".edit_btn");
const delbtn = document.querySelector(".del_btn");
const comments = Array.from(document.querySelectorAll(".comment"));
const com_edit = comments.map((comment) => comment.querySelector(".edit_btn"));
const com_del = comments.map((comment) => comment.querySelector(".del_btn"));

const id = document.querySelector(".hidden_id").textContent;
const pw = document.querySelector(".hidden_pw").textContent;

const pid = document.querySelector(`input[name='id']`).value;
function authorizePw() {
  let ans = prompt("이 게시글의 비밀번호를 입력하세요.");
  if (ans.toLowerCase() === pw) {
    return true;
  } else {
    alert("비밀번호가 틀렸습니다.");
    return false;
  }
}

function authorizeComment(obj) {
  const index = obj.dataset.index;
  const commentPw = document.querySelector(
    `.pw[data-index='${index}']`
  ).textContent;
  let ans = prompt("이 댓글에 대한 비밀번호를 입력하세요.");
  if (ans.toLowerCase() === commentPw) {
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

com_edit.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (authorizeComment(btn)) {
      const index = btn.dataset.index;
      // location.href = `./editcomment.php?id=${index}`;
    }
  });
});

com_del.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (authorizeComment(btn)) {
      const index = btn.dataset.index;
      location.href = `./deletecomment.php?id=${index}&pid=${pid}`;
    }
  });
});
